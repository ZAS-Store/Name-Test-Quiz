<?php

if (file_exists("./includes/config.php"))
{ 
    require_once './includes/config.php';
	
}else{
	header('location: ./index.php');
    exit;
}

define('TABLE_PREFIX', $config['table_prefix']);
define('_host', $config['hostname']);
define('_user', $config['username']);
define('_pass', $config['password']);
define('_base', $config['database']);

if (file_exists('./includes/db_mysqli.php')){
	require_once './includes/db_mysqli.php';

    $db = new database(); 
    $db->connect();
}

if (file_exists('./includes/core.php') == true){
    require_once './includes/core.php';

	$zdk = new core(); 
	$zdk->add_visit();
}

$query = $db->query("SELECT * FROM ".TABLE_PREFIX."config WHERE id=1 LIMIT 1");
$CONF = $db->fetch_array($query);
$CONF['ads_300'] = str_replace('[[=', '<', str_replace('=]]', '>', $CONF['ads_300']));
$CONF['ads_720'] = str_replace('[[=', '<', str_replace('=]]', '>', $CONF['ads_720']));

$CONF['server_url'] = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

?>