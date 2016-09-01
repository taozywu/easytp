<?php

/**
 * HomeLogic
 *
 * @author taozy.wu<taozy.wu@qq.com>
 * @copyright taozy.wu<taozy.wu@qq.com>
 * @link http://www.github.com/taozywu
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Home\Logic;

/**
 * 处理逻辑模型
 */
class HomeLogic
{

    /**
     * 单例
     * @var type
     */
    private static $_singletonObject = null ;

    private $_homeModel;

    private function __construct()
    {
       $this->_homeModel = new \Home\Model\HomeModel();
    }

    /**
     * 实例化
     * @return AdminModel
     */
    public static function instance()
    {
        $className = __CLASS__ ;

        if( !isset( self::$_singletonObject [ $className ] ) || !self::$_singletonObject [ $className ] )
        {
            self::$_singletonObject [ $className ] = new self () ;
        }

        return self::$_singletonObject [ $className ] ;
    }

    
}
