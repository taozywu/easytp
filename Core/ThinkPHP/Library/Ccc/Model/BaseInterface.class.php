<?php

/**
 * BaseInterface
 * 
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Ccc\Model;

/**
 * 数据库处理基类接口.
 * 
 * @author taozywu
 * @date 2014/9/16
 */
interface BaseInterface {

    public function fetchAll($sql);

    public function getAll($sql);

    public function fetchRow($sql);

    public function getRow($sql);
    
    public function fetchOne($sql);
    
    public function getOne($sql);

    public function queryAll($sql);

    public function queryRow($sql);

    public function querySimple($sql);
    
    public function query($sql);
    
    public function insert($tableName,$params);
    
    public function update($table, $params , $whereParams = array());
    
    public function delete($tableName,$whereParams = array());
}
