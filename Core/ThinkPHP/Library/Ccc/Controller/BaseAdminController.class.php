<?php

/**
 * BaseAdminController
 * 
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Ccc\Controller;

use Ccc\Controller\BaseController;

/**
 * Admin控制器基类.
 * 
 * @author taozywu
 * @date 2014/09/16
 */
abstract class BaseAdminController extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        // 针对flash控件的session
        if (isset($_POST["PHPSESSID"])) {
            session_id($_POST['PHPSESSID']);
            session("[start]");
        } else {
            session("[start]");
        }
    }

}
