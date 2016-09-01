<?php

/**
 * 入口文件.
 * 
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

//是否开启调试模式
define('APP_DEBUG', true);

define("ROOT_PATH", realpath(dirname(__FILE__) . "/"));

//加载模块
define('BIND_MODULE', 'Home');

//定义常量
require("./Core/Conf/define.php");

//加载框架入口文件
require(THINK_PATH."/ThinkPHP.php");
