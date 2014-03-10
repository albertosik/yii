<?php

// This is the main Web application configuration. Any writable
// application properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Goods',
        'theme'=>'default',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'db'=>array(
                    'connectionString' => 'mysql:host=127.0.0.1;port=3306;dbname=yiidb', 
                    'emulatePrepare' => true, 
                    'username' => 'root', 
                    'password' => '', 
                    'charset' => 'utf8', 
                    'tablePrefix' => '', 
		),
                'urlManager'=>array(
                            'urlFormat'=>'path',
                ),
                'user'=>array(
                    'allowAutoLogin'=>true,
                    'class' => 'WebUser',
                ),
                'widgetFactory'=>array('enableSkin'=>true),
	),
        'modules'=>array(
            'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'pass',             
                'ipFilters'=>array('127.0.0.1','::1'),
            ),
	),
);