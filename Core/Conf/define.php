<?php

/**
 * 定义常量
 *
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
define('THINK_PATH', ROOT_PATH . '/Core/ThinkPHP/');
define('RUNTIME_PATH', ROOT_PATH . '/Data/Temp/');
define('APP_PATH', ROOT_PATH . '/Core/Apps/');
define('COMMON_PATH', ROOT_PATH . '/Core/');

// Ybase
define('YBASE_PATH', ROOT_PATH . "/YBase/");

// 开启HTML_CACHE_ON，html文件会放在如下这个目录下.
define('HTML_PATH', ROOT_PATH . '/Data/Temp/Html/' . BIND_MODULE . '/');

/**
 * 其他常量
 */



// 加载各自define
if (file_exists(APP_PATH . BIND_MODULE . "/Conf/define.php")) {
    require(APP_PATH . BIND_MODULE . "/Conf/define.php");
}
