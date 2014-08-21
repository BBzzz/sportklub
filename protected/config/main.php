<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('ecalendarview', dirname(__FILE__) . '/../extensions/ecalendarview');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'HSC Csíkszereda',
	'language' => 'hu',
	'theme'=>'sportklub',
//	'homeUrl'=>'site/index',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.modules.admin.models.*',
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'admin',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'BBzzz1984',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
/*			'generatorPaths'=>array(
                'bootstrap.gii',
            ),*/
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'file'=>array(
        'class'=>'application.extensions.file.CFile',
    ),
		'session' => array(
      'class' => 'CDbHttpSession',
			'connectionID'=>'db',
      'timeout' => 6000,
			'autoCreateSessionTable'=>false,
   	),
		'clientScript'=>array(
    	'packages'=>array(
        	'accordion'=>array(
            	'baseUrl'=>'assets/js',
            	'js'=>array('accordion.js'),
            	'depends'=>array('jquery'),
    			),
					'timerjs'=>array(
            	'baseUrl'=>'assets/js',
            	'js'=>array('jquery.countdown.js'),
            	'depends'=>array('jquery'),
    			),
					'lightbox'=>array(
            	'baseUrl'=>'assets/js',
            	'js'=>array('lightbox.min.js'),
            	'depends'=>array('jquery'),
    			),
			),
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'page/<slug:\w+>'=>'page/view',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=sportklub',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'BBzzz1984',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
/*				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),*/
/*					array(
					'class'=>'CFileLogRoute',
					'levels'=>'info, trace',
					'logFile'=>'infoMessages.log',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
		),
		'format' => array(
        'dateFormat' => 'Y.m.d',
				'timeFormat'=>'H:i',
    ),
		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
     ),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'y.botond@gmail.com',
		'languages'=>array('hu','ro','en'),
	),
);
