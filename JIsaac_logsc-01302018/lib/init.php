<?php

if (!isset($_SESSION)) {
    
    session_start();
    
}

ob_start();

spl_autoload_register(null, false);

// spesifikasi file php yang akan diload
spl_autoload_extensions(".php");

if (!function_exists('autoloader')) {
    
    function autoloader($class)
    {
        try {
            
            $className = APP_SYSPATH . APP_CLASS . DS . $class . '.php';
            $libraryName = APP_SYSPATH. APP_LIBRARY . DS . $class . '.php';
            
            if (is_file($libraryName) && !class_exists($libraryName)) {
                
                require $libraryName;
                
            } elseif (is_readable($className) && !class_exists($className)) {
                
                require $className;
            }
            
        } catch (Exception $e) {
            
            echo 'Exception caught :', $e -> getMessage(), "\n";
            
        }
        
    }
}


if (version_compare(PHP_VERSION, '5.4', '>=')) {
    
    if (version_compare(PHP_VERSION, '5.6', '>=')) {
        
        spl_autoload_register('autoloader');
        
    }
    
} else {
    
    function __autoload($class)
    {
        if (is_readable(APP_SYSPATH . APP_LIBRARY . DS . $class.'.php')) {
            
            require(APP_SYSPATH . APP_LIBRARY . DS . $class . '.php');
            
        } elseif (is_readable(APP_SYSPATH . APP_CLASS . DS . $class . '.php')) {
            
            require(APP_SYSPATH . APP_CLASS . DS . $class . '.php');
            
        }
        
    }
    
}

$dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
$dbc -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$dbc -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

Registry::setAll(array('dbc' => $dbc, 'route' => $rules));
