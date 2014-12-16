<?php
namespace Application\controllers;

use Core\Application\application;


class Timeline
{
    public $layout = 'timeline.phtml';
    
    public function index()
    {
//         $config =  \Core\Application\Application::getConfig();
        
//         $mapper =  new mapper\Users();
//         //         $adapter = $mapper ->getAdapter();
//         $usuarios = $mapper ->getAdapter()->fetchAll();
        
//         echo "<pre>usuarios: ";
//         print_r($usuarios);
//         echo "</pre>";
        
        
//         echo "<hr>";
//         $data = fetchAllUser($config);
        include ('/../views/timeline/index.phtml');
       

    }
   
    
}





