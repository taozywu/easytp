<?php


/**
 * BaseModel
 * 
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Ccc\Model;

use Think\Model;

/**
 * 简单封装基类数据模型.
 * 
 * @author taozywu
 * @date 2014/9/4
 */
abstract class BaseModel extends Model implements BaseInterface {

    /**
     * 返回所有结果集
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function fetchAll($sql, $parse = false) {

        return parent::query($sql, $parse);
    }

    /**
     * 返回一条数据
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function fetchRow($sql, $parse = false) {
        $data = $this->fetchAll($sql, $parse);

        return !$data ? NULL : @$data[0];
    }

    /**
     * 返回一个数值
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function fetchOne($sql, $parse = false) {
        $rowData = $this->fetchRow($sql, $parse);

        return !$rowData ? NULL : @current($rowData);
    }

    /**
     * 返回所有结果集
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function getAll($sql, $parse = false) {
        return $this->fetchAll($sql, $parse);
    }

    /**
     * 返回一条数据
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function getRow($sql, $parse = false) {
        return $this->fetchRow($sql, $parse);
    }

    /**
     * 返回一个数值
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function getOne($sql, $parse = false) {
        return $this->fetchOne($sql, $parse);
    }

     /**
     * 返回所有结果集
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function queryAll($sql, $parse = false) {
        return $this->fetchAll($sql, $parse);
    }

    /**
     * 返回一条数据
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function queryRow($sql, $parse = false) {
        return $this->fetchRow($sql, $parse);
    }

    /**
     * 返回一个数值
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function querySimple($sql, $parse = false) {
        return $this->fetchOne($sql, $parse);
    }

    /**
     * 解析sql | 更新/删除/添加
     * @param type $sql
     * @param type $parse
     * @return type
     */
    public function query($sql, $parse = false) {
        $result = parent::execute($sql, $parse);
        return $result === false ? 0 : 1;
    }

    /**
     * 返回最后一次成功添加的ID
     * @return type
     */
    public function lastInsertId() {
        return parent::getLastInsID();
    }

    /**
     * 添加数据并返回添加成功后的ID
     * @param type $params
     * @param type $tableName
     * @param type $params
     * @param type $options
     * @param type $replace
     * @return int | mixed
     */
    public function insert($tableName, $params, $options = array(), $replace = false) {
        
        $add = M($tableName)->add($params, $options, $replace);
        
        return $add;
    }

    /**
     * 根据条件sql更新
     * @param array $params
     * @param array $whereParams
     * @return int
     */
    public function update($tableName, $params, $whereParams = array()) {

        $whereResult = "";
        if (is_array($whereParams) && $whereParams) {
            $and = "";
            foreach ($whereParams as $k => $v) {
                $whereResult .= " {$and} {$k}={$v} ";
                $and = "AND";
            }
        } else {
            $whereResult = $whereParams;
        }
        unset($and);
        $result = M($tableName)->where($whereResult)->save($params);
        // 切记一定用恒等来处理
        return $result === false ? 0 : 1;
    }

    /**
     * 删除数据
     * @param string $tableName = 表后缀或表名
     * @param array $whereParams
     * @return int
     */
    public function delete($tableName, $whereParams = array()) {

        $whereResult = "";
        if (is_array($whereParams) && $whereParams) {
            $and = "";
            foreach ($whereParams as $k => $v) {
                $whereResult .= " {$and} {$k}={$v} ";
                $and = "AND";
            }
        } else {
            $whereResult = $whereParams;
        }
        unset($and);
        $result = M($tableName)->where($whereResult)->delete();

        return !$result ? 0 : 1;
    }

}
