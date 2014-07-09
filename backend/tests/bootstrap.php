<?php

$root=dirname(__FILE__).'/..';
$common=$root.'/../common';

chdir(dirname(__FILE__).'/../..');

// change the following paths if necessary
$yiit=$common.'/lib/Yii/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
