<?php
define('TEST_ZDK', true);
require_once './global.php';
define('_siteName', $CONF['siteName']);

if(isset($_GET['dc'])){
	$TR = $zdk->SR_Array($zdk->deCode(str_replace('@', '+', $_GET['dc'])));
	$Test = $zdk->Get_Test($TR['test']);
	$Site['img'] = $TR['img_res'];
	
	$zdk->utp_visit_test($TR['test']);
	
	define('_siteDesp', $Test['descripcion']);
}elseif(isset($_GET['test'])){
	$Test = $zdk->Get_Test($_GET['test']);	
	$Site['img'] = $Test['img'];
	
	$zdk->utp_visit_test($_GET['test']);
	define('_siteDesp', $Test['descripcion']);	
}else{
    header("location: ./index.php");	
}

include './templates/test.html';
?>