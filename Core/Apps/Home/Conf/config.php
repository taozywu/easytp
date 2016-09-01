<?php

/**
 * 配置
 *
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

return array(
    //'配置项'=>'配置值'
    "URL_MODEL" => 1,
    "MEMCACHE_ON" => false,
    "REDIS_ON" => false,
    "SESSION_AUTO_START" => false,
    "VAR_SESSION_ID" => "PHPSESSID",
    "DEFAULT_CONTROLLER" => 'Home',
    "ERROR_PAGE" => DOMAIN,
    "ERROR_JUMP_MSG" => '不知所措，正在返回首页~',
    "ERROR_JUMP_PAGE" => DOMAIN,
    "LOAD_EXT_CONFIG" => "db",
    
    // "TMPL_ACTION_ERROR" => "Public:error",
    
    // 开启xhprof
    "XHPROF_OPEN" => FALSE,

    'HTML_CACHE_ON'  => false,
    'HTML_CACHE_TIME'  => 60,
    'HTML_FILE_SUFFIX' => '.html',
    'HTML_CACHE_RULES' => array(
        '*'=>array('{$_SERVER.REQUEST_URI|md5}'),
    ),

);
