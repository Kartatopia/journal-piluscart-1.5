<?php 
define('DS', DIRECTORY_SEPARATOR);
// Site configuration
define('APP_URL', "http://YOUR WEBROOT/YOUR_APP" . DS);  // define site path
define('APP_FRONT_STORE',  APP_DIR . 'content' . DS); 
define('APP_SITEEMAIL', '');
define('APP_SITEKEY', '');
define('APP_LIB', 'lib');
define('APP_CLASS', APP_LIB . DS .'classes'. DS);
define('APP_BACK_STORE', APP_URL . 'cabin');
define('APP_MODULE', APP_LIB  . DS . 'modules' . DS);
define('APP_UTILITY', APP_LIB . DS . 'utilities' . DS);
define('APP_VENDOR', APP_LIB . DS . 'vendor' .  DS);

require 'functions.php';
require 'rules.php';
require 'init.php';

$errors = array();
