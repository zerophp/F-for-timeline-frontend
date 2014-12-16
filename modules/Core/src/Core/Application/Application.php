<?php
namespace Core\Application;


use \Core\Module;
use \Core\Router\parseUrl as getRequest;

class Application
{        
    static $view;
    static $config;
    static $controller;
    static $action;
    static $params;
    
    public static function setConfig($config)
    {
        self::$config = Module\ModuleManager::getConfig($config);
        $request = getRequest::parseURL();
        self::$controller = $request['controller'];
        self::$action = $request['action'];
        self::$params = $request['params'];
    }

    public static function getConfig()
    {
        return self::$config;
    }

    public static function dispatch()
    {
        $controllerNameClass= '\Application\Controllers\\'.self::$controller;
        
        $controller = new $controllerNameClass();
        $actionName = self::$action;
        ob_start();
            $controller->$actionName();
        self::$view=ob_get_contents();
        ob_end_clean();

        self::twoStep(self::$view, $controller->layout);
    }

    public static function twoStep($view, $layout)
    {
        //echo self::$view;
//         echo $layout;
        include __DIR__ .'/../../../../'.'Application/src/Application/layouts'.DIRECTORY_SEPARATOR.$layout ;
               
    }    
  
}
