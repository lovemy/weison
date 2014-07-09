<?php
/**
 * main.php
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 *
 * This file holds the configuration settings of your frontend application.
 **/
$frontendConfigDir = dirname(__FILE__);

$root = $frontendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($frontendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');
/* uncomment if you need to use show folders */
/* Yii::setPathOfAlias('show', $root . DIRECTORY_SEPARATOR . 'show'); */


$mainLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile)? require($mainLocalFile): array();

$mainEnvFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
	array(
		'name' => 'weison',
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'frontend',

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
			/* uncomment if required */
			/* 'common.extensions.behaviors.*', */
			/* 'common.extensions.validators.*', */
			'common.models.*',            
            //'common.extensions.yii-debug-toolbar.*', //our extension            
			'common.messages.*',			
			
			// uncomment if behaviors are required
			// you can also import a specific one
			/* 'common.extensions.behaviors.*', */
			// uncomment if validators on common folder are required
			/* 'common.extensions.validators.*', */
			'application.components.*',
			'application.controllers.*',
			'application.models.*',			
		),
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		'modules' => array(      
			'user' => array(
				'class' => 'common.modules.user.UserModule',
				'autoLogin' => true,
			),			
		), 
		'components' => array(
			'user'=>array(
		        'class'=>'WebUser',//你可以自定义你的Cwebuserookie'=>array('domain' => '.domain.cc','path' => '/'),//配置用户cookie作用域
				// enable cookie-based authentication
				'allowAutoLogin'=>true,//允许同步登录
				'stateKeyPrefix'=>'yourprefix',//你的前缀，必须指定为一样的
				'loginUrl'=>array('/user/login'),
			),
		
			'session' => array(
				'cookieParams' => array('domain' => 'niulanqian.com', 'lifetime' => 0),//配置会话ID作用域 生命期和超时
				'timeout' => 3600,
				//这里千万不要指定cookieMode => none，否则无法对应sessionid导致无法登录，更别说同步了。（有些不负责的博客竟然说同步登录需要设定这个属性为none！！！！太坑爹了。。。）
			),
		
			'statePersister'=>array( //指定cookie加密的状态文件
				'class'=>'CStatePersister',//指定类		
				'stateFile'=>'../../common/runtime/state.bin',//配置通用状态文件路径，注意，如果你的站点是分布式的，你必须把该文件复制一份到不同服务器上，否则无法跨域。因为里面有个通用密钥，密钥不同则无法验证身份。
			),
		
			
			'errorHandler' => array(
				// @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
				'errorAction'=>'site/error'
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
		),

		/* make sure you have your cache set correctly before uncommenting */
		/* 'cache' => $params['cache.core'], */
		/* 'contentCache' => $params['cache.content'] */
	),
	CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);