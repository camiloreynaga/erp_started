<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// application components
	'components'=>array(
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
		'db'=>array(
                    
                        'connectionString' => 'mysql:host=localhost;dbname=erp_rizo',
			//'connectionString' => 'mysql:host=localhost;dbname=erp_plastiplas',
                        //'connectionString' => 'mysql:host=192.168.1.34;dbname=erp_started2',
			'emulatePrepare' => true,
			//'username' => 'cr',
                        'username'=>'root',
			'password' => 'adonde',
			'charset' => 'utf8',
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
                'authManager'=>array(
                    'class'=>'CDbAuthManager',
                    'connectionID'=>'db',
                    'itemTable'=>'tbl_auth_item',
                    'itemChildTable'=>'tbl_auth_item_child',
                    'assignmentTable'=>'tbl_auth_assignment',
                ),
	),
);