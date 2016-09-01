<?php


/**
 * BaseWebController
 * 
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace Ccc\Controller;

use Ccc\Controller\BaseController;

/**
 * Web控制器基类.
 * 
 * @author taozywu
 * @date 2014/09/16
 */
abstract class BaseWebController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        session("[start]");
    }

}
