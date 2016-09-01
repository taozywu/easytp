<?php

/**
 * HomeController
 *
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Home\Controller;

use Ccc\Controller\BaseWebController;
/**
 * 主页
 */
class HomeController extends BaseWebController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 首页
     */
    public function indexAction()
    {
        $logData = "test";
        $this->assign("logData", $logData);
        $this->display();
    }

    

}
