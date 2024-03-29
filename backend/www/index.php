<?php
/**
 * index.php
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */
defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// On dev display all errors
if(YII_DEBUG) {
	error_reporting(-1);
	ini_set('display_errors', true);
}

date_default_timezone_set('asia/chongqing');

chdir(dirname(__FILE__).'/../..');

$root=dirname(__FILE__).'/..';
$common=$root.'/../common';

require_once($common.'/lib/Yii/yii.php');
$config=require('backend/config/main.php');
require_once($common.'/components/WebApplication.php');
require_once('common/lib/global.php');


$app = Yii::createApplication('WebApplication', $config);

/* please, uncomment the following if you are using ZF library */
/*
Yii::import('common.extensions.EZendAutoloader', true);

EZendAutoloader::$prefixes = array('Zend');
EZendAutoloader::$basePath = Yii::getPathOfAlias('common.lib') . DIRECTORY_SEPARATOR;

Yii::registerAutoloader(array("EZendAutoloader", "loadClass"), true);
*/

$app->run();

/* uncomment if you wish to debug your resulting config */
/* echo '<pre>' . dump($config) . '</pre>'; */