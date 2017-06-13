# TP
this is tp's framework based on ThinkPHP!

# 目录结构

```
Your Work
  ++++Core             
          ++++Apps                    应用目录【支持多应用】
          ++++Common                  全局函数
          ++++Conf                    全局配置
          ++++Ext                     全局扩展库
          ++++ThinkPHP                TP核心框架
                     ----Library
                            ----Ccc   框架封装 
  ++++Data
      ++++Temp
               ----Cache
               ----Data
               ----Html               HTML_CACHE_ON，静态文件会存放在此.
               ----Logs
               ----Temp
  ++++Public
           ----Home                   Home应用资源
           ----Statics                纯静态资源【方便CDN】
  ----home.php                        入口文件

```

# Apps 目录结构

```
Home
   ++++Conf                           Home应用配置
   ++++Controller                     Home应用控制器
   ++++Logic                          Home应用逻辑模型
   ++++Model                          Home应用数据模型 
   ++++View                           Home应用视图
```

# 路由URL


* 针对前端网站（客户浏览）来讲 我们要讲究url访问方式对搜索引擎友好方式采用（pathinfo、rewrite等）
=>Localhost.com/index.php/index/index/index

* 针对后端网站（接口等）来说 就没必要在url上处理。采用默认方式（default）
=>localhost.com/index.php?m=index&c=index&a=index


* 获取参数 你阔以继续使用I()函数来获取；也阔以$this->_getParam()来获取【此是zendframework方式】


# 入口文件

```
<?php

/**
 * 入口文件.
 * 
 * @author taozywu
 * @date 2016/08/17
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
```

注意事项   
1. 常量定义请在Core/Conf/define.php去添加即可。
2. BIND_MODULE必须指定。


# 控制器/模型

```
<?php

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
}
```

注意事项   
1. 所有方法尽量统一：方法名+Action
2. 选用基类控制器根据是WEB，ADMIN等。


# AJAX处理

```
<?php

$data = array();
$this->assign("data", $data);
$content = $this->fetch("Home:ajax-get-data");

$this->ajaxReturn(array("error_code" => 0, "msg" => "", "data" => array("html" => $content)));
```

注意事项   
1. 统一返回格式
2. 提前统一code码



# 模型


1. 业务模型

> 尽量使用单例模式以减少频繁实例化类

```
<?php

namespace Home\Logic;

/**
* 处理逻辑模型
*/
class DemoLogic {

    private static $_singletonObject = null;
    private $_demoObj = null;

    // 私有构造
    private function __construct() {
        $this->_demoObj = new \Home\Model\DemoModel();
    }

    // 防止克隆
    private function __clone() {
       
    }
    
    /**
     * 实例化
     * @return DemoLogic
     */
    public static function instance() {
        $className = __CLASS__;
         
        if (!isset(self::$_singletonObject [$className]) || !self::$_singletonObject [$className]) {
            self::$_singletonObject [$className] = new self ();
        }
         
        return self::$_singletonObject [$className];
    }
}
```

* 在控制器端调用如下：   

$data = DemoLogic::instance()->getPageData($page, $pageSize, $where); 


2. 数据模型

```
<?php

namespace Home\Model;

use Base\Model\BaseModel;

/**
* 处理数据模型
*/
class DemoModel extends BaseModel {

    public function __construct() {
        parent::__construct();
    }
}

```

* 在业务模型中调用如下：   
$this->_demoObj = new \Home\Model\DemoModel();
return $this->_demoObj->addData($params); 



# DB操作


* 你阔以继续使用手册推荐的不论是CURD，拼接，原生都是可行的。因个人爱好原生方式，故对此作了一些封装，同时兼容zendframework操作DB大部分写法等。

```
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
```

# 模板


* 模板文件中引入模板文件如下几种方法：假定项目视图目录是在Core/Apps/Admin/View
1. 模板文件a：Demo1/a.html
2. 模板文件c：Demo1/c.html
3. 模板文件b：Demo2/b.html

#模板文件a中引入模板文件b#   

```
1. <?php include T("Demo2/b")?> （如果引入模板文件c：<?php include T("Demo3/c")?> ）
2. <include file="Demo2/b" />（如果引入模板文件c：<include file="c" />）
3. <include file="Demo2:b" />
4. <include file="/Core/Apps/Admin/View/Demo2/b.html" />
```

TIPS：   
1. 模板文件含变量均会做处理。
2. include标签使用<include file="" />不要使用<include file=""></include> 

3. <block>,<extend>, <include> 等标签要熟知下。

base.html   

```
<block name=" title "></block>
```

Index.html   

```
<extend name="Public:base" />

<block name="title">首页 - </block>

<include file="Public:footer" />
```

# 其他

其他请参考TP官方手册
