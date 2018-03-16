<?php
define('TEST_ZDK', true);
require_once './global.php';
define('_siteName', $CONF['siteName']);

$Test = false;
	
define('_siteDesp', $CONF['siteDescription']);

include './templates/index.html';
?>