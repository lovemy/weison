<?php
/**
 * params.php
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */

$paramsLocalFile = $consoleConfigDir . DIRECTORY_SEPARATOR . 'params-local.php';
$paramsLocalFileArray = file_exists($paramsLocalFile) ? require($paramsLocalFile) : array();

$paramsEnvFile = $consoleConfigDir . DIRECTORY_SEPARATOR . 'params-env.php';
$paramsEnvFileArray = file_exists($paramsEnvFile) ? require($paramsEnvFile) : array();

$paramsCommonFile = $consoleConfigDir . DIRECTORY_SEPARATOR  . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
	'common' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'params.php';

$paramsCommonArray = file_exists($paramsCommonFile) ? require($paramsCommonFile) : array();

return CMap::mergeArray(
	$paramsCommonArray,
	// merge console specific with resulting env-local merge *override by local
	CMap::mergeArray(
		array(
			// add here all console-specific parameters
		),
		// merge environment parameters with local *override by local
		CMap::mergeArray($paramsEnvFileArray, $paramsLocalFileArray)
	)
);