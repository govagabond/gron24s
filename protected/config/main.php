<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	//'theme'=>'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Govagabond WebSite',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'ext.yii-mail.YiiMailMessage',
	),
	// 'aliases' => array(
		
	//     'xupload' => 'ext.xupload'
	// ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'rohan',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
	),
    

	// application components
	'components'=>array(

		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

		'image'=>array(
		          'class'=>'application.extensions.image.CImageComponent',
		            // GD or ImageMagick
		            'driver'=>'GD',
		            // ImageMagick setup path
		            'params'=>array('directory'=>'/opt/local/bin'),
		        ),

		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			    'urlFormat' => 'path',
			    'showScriptName' => false,
			    'rules' => array(
			        '<controller:\w+>/<id:\d+>' => '<controller>/view',
			        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
			        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			        'user/profile/general'=>'user/profile1',
			        'find-experiences'=>'experience/index',
			),
		),
		
		'mail' => array(
		  'class' => 'ext.yii-mail.YiiMail',
		  'transportType' => 'smtp', // change to 'php' when running in real domain.
		  'viewPath' => 'application.views.mail',
		  'logging' => true,
		  'dryRun' => false,
		  'transportOptions' => array(
		   'host' => 'smtp.gmail.com',  //if not work, try smtp.googlemail.com
		   'username' => 'ron1703@gmail.com',
		   'password' => 'Rohan17031703',
		   'port' => '465',
		   'encryption' => 'tls',
		  ),
		 ),

		'db'=>array(
		'connectionString' => 'mysql:host=127.0.0.1;dbname=govagabond',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		// prior to yum0.8rc7 tablePrefix is not necessary anymore, but it can not hurt
		'tablePrefix' => '', 	   
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
		        'class'=>'CLogRouter',
		        'routes'=>array(
		            array(
                      'class'=>'CFileLogRoute',
                      'levels'=>'error,warning,info',
                    ),
                    // array(
                    //   'class'=>'CWebLogRoute',
                    //   'levels'=>'error,warning,trace,info',
                    // ),
                    // array(
                    //    'class'=>'CWebLogRoute',
                    //    'levels'=>'trace',
                    //    'enabled'=>YII_DEBUG,
                    // ),

		            array(
		                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
		                'ipFilters'=>array('127.0.0.1','192.168.1.215'),
		            ),
		        ),
		    ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ron1703@gmail.com',
	),
);