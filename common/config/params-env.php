<?php
/**
 * params-private.php
 *
 * Common parameters for the application on private -your local environment
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */
/**
 * Replace following tokens for correspondent configuration data
 *
 * {DATABASE-NAME} ->   database name
 * {DATABASE-HOST} -> database server host name or ip address
 * {DATABASE-USERNAME} -> user name access
 * {DATABASE-PASSWORD} -> user password
 *
 * {DATABASE-TEST-NAME} ->   Test database name
 * {DATABASE-TEST-HOST} -> Test database server host name or ip address
 * {DATABASE-USERNAME} -> Test user name access
 * {DATABASE-PASSWORD} -> Test user password
 */
return array(
	'env.code' => 'private',
	'baseUrl' => 'http://www.weison.com',	
	
	// DB connection configurations
	'db.name' => 'weison',
	'db.connectionString' => 'mysql:host=localhost;dbname=weison',
	'db.username' => 'root',
	'db.password' => 'root',
	'db.tablePrefix' => 'ws_',
	
	
	// test database {
	'testdb.name' => 'weison_test',
	'testdb.connectionString' => 'mysql:host=localhost;dbname=weison_test',
	'testdb.username' => 'root',
	'testdb.password' => 'root',
	'testdb.tablePrefix' => 'ws_',
	
	'frontendUrl' => 'http://www.weison.com',	
	'imgUrl' => 'http://img.weison.com',
	'adminUrl' => 'http://admin.weison.com',
	'backendImgJsonFile' => '/home/wwwroot/weison/backend/www/images.json',
	'frontendImgJsonFile' => '/home/wwwroot/weison/frontend/www/images.json',
);