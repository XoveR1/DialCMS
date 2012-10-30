<?php

$iniArray = parse_ini_file(SYSTEM_CONFIG_LOCATION, true);

$configArray = array(
    'basePath' => SITE_LOCATION . DS . 'protected',
    'defaultController' => 'site',
    'language'          =>'en-GB',
    // preloading 'log' component
    'preload' => array(
        'bootstrap', // preload the bootstrap component
        'log'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'no-access',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii',
            ),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('login')
        ),
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'defaultRoles' => array('guest'),
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'login' => 'site/login'
            ),
        ),
        'db' => $iniArray['db'],
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'params' => array(
        'scripts' => array(
            'coreScriptsPath' => '/js/core/',
            'uploadScriptsPath' => '/js/',
            'coreScripts' => array(
                'label' => 'label.js',
                'modeler' => 'modeler.js',
                'router' => 'router.js',
                'loader' => 'loader.js',
                'config' => 'config.js',
                'document' => 'document.js',
                'core' => 'core.js'
            ),
            'uploadScripts' => array(
                'hashchange' => 'jquery-hashchange-1.3.0.min.js',
                'knockout' => 'knockout-2.1.0.min.js',
                'bootstrap' => 'bootstrap-2.1.1.min.js',
            ),
        ),
        'client' => array(
            'sSiteUrl' => '',
            'sInitUrl' => '/client/init/',
            'bIsDebugMode' => true,
            'oDocumentConfig' => array(
                'sContentSelector' => '.container-fluid .span12',
                'sModelPlaceSelector' => 'script:last',
                'sEmptyTitle' => 'EMPTY_TITLE'
            )
        )
    ),
    'theme' => 'basic'
);
unset($iniArray['db']);
return CMap::mergeArray($iniArray, $configArray);