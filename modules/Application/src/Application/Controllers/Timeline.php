<?php
namespace Application\controllers;

use Core\Application\application;


class Timeline
{
    public $layout = 'timeline.phtml';
    
    public function index()
    {

        $url = 'http://timeline.local/timelines/index';
        
        $get = NULL; 
        $options = array();
        
        $defaults = array( 
//             CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : '').
//                          http_build_query($get), 
            CURLOPT_URL => $url,
            CURLOPT_HEADER => 0, 
            CURLOPT_RETURNTRANSFER => TRUE, 
            CURLOPT_TIMEOUT => 4 
        ); 
        
        $ch = curl_init(); 
        curl_setopt_array($ch, ($options + $defaults)); 
        if( ! $result = curl_exec($ch)) 
        { 
            trigger_error(curl_error($ch)); 
        } 
        curl_close($ch); 
//         return $result; 
        
//         echo "<pre>";
//         print_r(json_decode($result));
//         echo "</pre>";
        
        $result = '{
    "timeline":
    {
        "headline":"ACLJohnny B Goode",
        "type":"default",
		"startDate":"2009,1",
		"text":"<i><span class=\'c1\'>Designer</span> & <span class=\'c2\'>Developer</span></i>",
		"asset":
        {
            "media":"assets/img/notes.png",
            "credit":"<a href=\'http://dribbble.com/shots/221641-iOS-Icon\'>iOS Icon by Asher</a>",
            "caption":""
        },
        "date": [
            {
                "startDate":"2009,2",
                "headline":"My first experiment in time-lapse photography",
                "text":"Nature at its finest in this video.",
                "asset":
                {
                    "media":"http://vimeo.com/22439234",
                    "credit":"",
                    "caption":""
                }
            }
            
        ]
    }
}
';
//         die;
        include ('/../views/timeline/index.phtml');
       

    }
   
    
}





