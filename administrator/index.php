<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// define short directory separator
define('DS', DIRECTORY_SEPARATOR);

// this constant need for use one config for frontend and backend
define('SITE_LOCATION', $_SERVER['DOCUMENT_ROOT'] . DS . 'administrator');

// sustem ini config path
define('SYSTEM_CONFIG_LOCATION', $_SERVER['DOCUMENT_ROOT'] . DS . 'protected' . DS . 'config' . DS . 'system.ini');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);

// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
