<?php
/**
 * main.php
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 *
 * This file holds the configuration settings of your backend application.
 **/
$backendConfigDir = dirname(__FILE__);

$root = $backendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($backendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'backend');
Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'www');
/* uncomment if you need to use show folders */
/* Yii::setPathOfAlias('show', $root . DIRECTORY_SEPARATOR . 'show'); */


$mainLocalFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile)? require($mainLocalFile): array();

$mainEnvFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
	array(
		'name' => 'Weison台管理系统',
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'backend',

		// set parameters
		'params' => $params,
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array('log'),
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail

	    'language'=>'zh_cn',
	    'sourceLanguage'=>'en_us',
		// using bootstrap theme ? not needed with extension
		// 'theme' => 'bootstrap',
		// 'theme' => 'cnwin',
		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(			
			'common.components.*',
			'common.extensions.*',
			'common.models.*',
			'common.messages.*',
			'application.components.*',
			'application.controllers.*',
			'application.models.*',			
		),
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		'modules' => array( 
			'gii' => array(
				'class' => 'system.gii.GiiModule',
				'password' => 'cnwin2013',
				'generatorPaths' => array(
					'common.extensions.giiplus', 
					'ext.ajaxgii',
					'bootstrap.gii'
				)
			),			
		), 
		'components' => array(
			'user' => array(
				'class' => 'WebUser',
                'allowAutoLogin'=>true,
                
                'loginUrl' => array('/user/login'),
			),		

			'errorHandler' => array(
				// @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
				'errorAction'=>'site/error'
			),
			'urlManager' => array(
				'urlFormat' => 'path',
				'showScriptName' => false,
				'urlSuffix' => '/',
				'rules' => $params['url.rules'],
				
			),
			'db'=> array(
				'connectionString' => $params['db.connectionString'],
				'username' => $params['db.username'],
				'password' => $params['db.password'],
				'tablePrefix' => $params['db.tablePrefix'],
				'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
				'enableParamLogging' => YII_DEBUG,
				'enableProfiling'=>YII_DEBUG,        		
				'charset' => 'utf8'
			),	

			'log'=>array(
        		'class'=>'CLogRouter',
        		'routes'=>array(
            		array(
                		'class'=>'common.extensions.yii-debug-toolbar.YiiDebugToolbarRoute',
                	// Access is restricted by default to the localhost
                	//'ipFilters'=>array('127.0.0.1','192.168.1.*', 88.23.23.0/24),
            		),
        		),
    		),
			
		),

		/* make sure you have your cache set correctly before uncommenting */
		/* 'cache' => $params['cache.core'], */
		/* 'contentCache' => $params['cache.content'] */
	),
	CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);