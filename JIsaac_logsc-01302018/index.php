<?php 

require 'inc/config.php';

$findParam = $dispatching-> findRequestParam(); // finding request URI

$matched = (is_array($findParam) && array_key_exists(0, $findParam)) ? $findParam[0] : '';
$param1 = (is_array($findParam) && array_key_exists(1, $findParam)) ? $findParam[1] : '';
$param2 = (is_array($findParam) && array_key_exists(2, $findParam)) ? $findParam[2] : '';

$action = $dispatching -> URLElement(0); // call 1st element action path

// initializing and checking parameters
$parameters = (isset($matched) || is_array($action)
    || is_array($dispatching->URLElement(1))
    || is_array($dispatching->URLElement(2))) ? $param1 : $param2;
    

include 'public/content.php';

if (!$action) {
    
   grabHome();

} else {
    
   switch ($action) {
    
       case 'post':
       
           if ($parameters) {
               
              checkDetailRequest($action, $param1);
              
           } else {
               
              ErrorNotFound();
           }
           
           break;
       
       case 'posts':
           
           grabPost();
           
           break;
           
       case 'contact':
           
           submitMessage();
           
           break;
           
       default:
           
           ErrorNotFound();
          
           break;
           
   }
   
}

ob_end_flush();
