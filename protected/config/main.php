<?php
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('booster', dirname(__FILE__).'/../extensions/booster');

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
        //'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'ERP APP',
        'language'=>'es',
        'theme'=>'fardisur', 

	// preloading 'log' component
	'preload'=>array('log','booster'),

	// autoloading model and component classes....
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii',
                        
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                            'booster.gii.model',
                            'booster.gii'
                            ),
		),
            'admin',
            //Reportico
            'reportico'=>array(),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
            
		// uncomment the following to use a MySQL database
	
		'db'=>array(
			//'connectionString' => 'mysql:host=localhost;dbname=erp_plastiplas',
                        'connectionString' => 'mysql:host=localhost;dbname=erp_started2',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'adonde',
			'charset' => 'utf8',
		),
		'coreMessage'=>array(
                    'basePath'=>'protected/messages',
                ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
                    'itemTable'=>'tbl_auth_item',
                    'itemChildTable'=>'tbl_auth_item_child',
                    'assignmentTable'=>'tbl_auth_assignment',
                ),
                'booster'=>array(
                    'class'=>'ext.booster.components.Booster',
                    //'class'=>'path.alias.to.booster.components.Booster',
                    'responsiveCss'=>true
                ),
            
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'info@kiwisoluciones.com',
                'impuesto'=>'18',
                'language'=>'es_pe'
	),
);
