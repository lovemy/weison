<?php
/**
 * test.php
 *
 * configuration file for testing
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */
return CMap::mergeArray(
	require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main.php'),
	array(
		'components' => array(
			'fixture' => array(
				'class' => 'system.test.CDbFixtureManager'
			),
			/* uncomment if we require to run commands against test database */
			/*
			 'db' => array(
				'connectionString' => $params['testdb.connectionString'],
				'username' => $params['testdb.username'],
				'password' => $params['testdb.password'],
				'charset' => 'utf8'
			),
			*/
			'assetManager'=>array(
            	// 改变磁盘上的路径
        	    'basePath'=>$frontendConfigDir.'/../www/assets/',
            // 改变url
            // 'baseUrl'=>'/web/assets/'

   		     ),
			

		)
	)
);