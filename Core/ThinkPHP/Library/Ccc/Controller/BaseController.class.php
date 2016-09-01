<?php

/**
 * BaseController
 * 
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Ccc\Controller;

use Think\Controller;

/**
 * 控制器基类.
 * 
 * @author taozywu
 * @date 2014/09/16
 */
class BaseController extends Controller
{

    public $_conf = null;

    /**
     * 构造
     */
    public function __construct()
    {
        parent::__construct();

        $this->_conf = C();

        $this->initRpcserver();
    }

    /**
     * [_getParam description]
     * @return [type] [description]
     */
    public function _getParam($key)
    {
        return I($key);
    }

    /**
     * [_forward description]
     * @param  [type] $action [description]
     * @param  [type] $module [description]
     * @param  array  $params [description]
     * @return [type]         [description]
     */
    public function _forward($action, $controller, $module, array $params = array())
    {
        if ($action == null) {
            return false;
        }

        $action = $action . $this->_conf["ACTION_SUFFIX"];

        if(empty($module)) {
            $module = defined('C_MODULE_NAME') ? C_MODULE_NAME : MODULE_NAME;
        }

        $module = ucfirst($module);

        if(!empty($controller)) {
            $class = A("{$module}/{$controller}");
            call_user_func_array(array(&$class, $action), $params);
        }else {
            $this->{$action}($params);
        }
    }

    /**
     * [initRpcserver description]
     * @return [type] [description]
     */
    private function initRpcserver()
    {
       
    }

}
