<?php

if (file_exists("../includes/config.php"))
{ 
    require_once '../includes/config.php';
	
}else{
	header('location: ../admin/index.php');
    exit;
}

define('TABLE_PREFIX', $config['table_prefix']);
define('_host', $config['hostname']);
define('_user', $config['username']);
define('_pass', $config['password']);
define('_base', $config['database']);

if (file_exists('../includes/db_mysqli.php')){
	require_once '../includes/db_mysqli.php';

    $db = new database(); 
    $db->connect();
}

if (file_exists('./ADcore.php') == true){
    require_once './ADcore.php';

	$zdkCore = new ADcore(); 
	
}

if (file_exists('./ADsession.php') == true){
    require_once './ADsession.php';

	$zdkSess = new ADsession(); 
	
	@session_start();
	
	$_USER = array(
	    'username' => $zdkSess->get('user-name'),
	    'uid' => $zdkSess->get('aid'),
	    'email' => $zdkSess->get('e-mail')		
	);
	
}