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
		'preload' => array('booster','log'),
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

			//for user module
			'common.modules.user.models.*',
        	'common.modules.user.components.*',		
		),
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		'modules' => array( 
			'gii' => array(
				'class' => 'system.gii.GiiModule',
				'password' => 'weison',
				'generatorPaths' => array(
					'common.extensions.booster.src.gii', 					
				)
			),

			'user'=>array(
				'class' => 'common.modules.user.UserModule',
	            # encrypting method (php hash function)
	            'hash' => 'md5',
	            # send activation email
	            'sendActivationMail' => true,
	            # allow access for non-activated users
	            'loginNotActiv' => false,
	            # activate user on registration (only sendActivationMail = false)
	            'activeAfterRegister' => false,
	            # automatically login from registration
	            'autoLogin' => true,
	            # registration path
	            'registrationUrl' => array('/user/registration'),
	            # recovery password path
	            'recoveryUrl' => array('/user/recovery'),
	            # login form path
	            'loginUrl' => array('/user/login'),
	            # page after login
	            'returnUrl' => array('/user/profile'),
	            # page after logout
	            'returnLogoutUrl' => array('/user/login'),
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

    		'booster' => array(
				'class' => 'common.extensions.booster.src.components.Booster',
				'responsiveCss' => true,
			),
			
		),

		/* make sure you have your cache set correctly before uncommenting */
		/* 'cache' => $params['cache.core'], */
		/* 'contentCache' => $params['cache.content'] */
	),
	CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);