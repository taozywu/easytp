<?php
/**
 * 普通模式下的配置
 *
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

return array(
    //'配置项'=>'配置值'
    "URL_MODEL" => 1, // URL 访问模式
    "CHECK_APP_DIR" => true, // 禁止自动创建目录
    "DEFAULT_MODULE" => '', // 默认应用
    "MODULE_DENY_LIST" => array(),
    'ACTION_SUFFIX' =>  'Action', // 操作方法后缀
    
    /**
     * 过滤 先addslashes后htmlspecialchars
     */
    "DEFAULT_FILTER" => "trim,addslashes,htmlspecialchars",
    "DEFAULT_DECODE_FILTER" => "htmlspecialchars_decode,stripslashes",
    
    /**
     * 自动加载
     */
    "autoload_namespace" => array(
        // 允许
        "allow" => array(),
        // 不允许 | 或许系统本身已有自动加载 and so on.
        "disallow" => array('Think'),
    ),
    
    /**
     * rpcserver
     */
    "rpcserver" => include_once COMMON_PATH . "/Conf/rpcserver.php",
);
