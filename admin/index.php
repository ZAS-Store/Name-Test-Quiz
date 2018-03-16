<?php
define('_siteName', 'Panel De Administrador');
require_once './global.php';

if(isset($_POST['siteName']) AND isset($_POST['siteDescription']) AND $_USER['uid'] != 0 AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	Echo $zdkCore->udt_conf();
	exit;
}

if(isset($_GET['Act_add_test']) AND $_USER['uid'] != 0 AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	Echo json_encode($zdkCore->add_categori());	
	exit;
}

if(isset($_GET['Act_udt_test']) AND $_USER['uid'] != 0 AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	Echo json_encode($zdkCore->udp_categori());
	exit;
}


if(isset($_GET['Act_inc_test_res']) AND isset($_POST['title']) AND isset($_POST['des']) AND $_USER['uid'] != 0 AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	Echo json_encode($zdkCore->add_Res());
	exit;
}

if(isset($_GET['Act_udt_test_res']) AND isset($_POST['title']) AND isset($_POST['des']) AND $_USER['uid'] != 0 AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	Echo json_encode($zdkCore->udp_res());
	exit;
}

if(!isset($_GET['Act'])) Header("location: ?Act=int");
else{
	if($_GET['Act'] == 'int'){	
		if($_USER['uid'] != 0){
		    $InPage = 'Home';
		    include '../templates/ADDashboard.html';
            include '../templates/ADindex.html';
		}
        else{
            include '../templates/ADlogin.html';
		}
	}
	elseif($_GET['Act'] == 'Home' AND $_SERVER['REQUEST_METHOD'] == 'POST'){					
		$InPage = 'Home';
		include '../templates/ADDashboard.html';
        Echo $ADbody;		
	}
	elseif($_GET['Act'] == 'config' AND $_SERVER['REQUEST_METHOD'] == 'POST'){					
		$InPage = 'config';
		include '../templates/ADconfig.html';	
        Echo $ADbody;		
	}
	elseif($_GET['Act'] == 'NewTest' AND $_SERVER['REQUEST_METHOD'] == 'POST'){					
		$InPage = 'NewTest';
		include '../templates/ADnewtest.html';	
        Echo $ADbody;		
	}
	elseif($_GET['Act'] == 'Stats' AND $_SERVER['REQUEST_METHOD'] == 'POST'){					
		$InPage = 'Stats';
		include '../templates/ADStats.html';
        Echo $ADbody;		
	}
	elseif($_GET['Act'] == 'AllTest' AND $_SERVER['REQUEST_METHOD'] == 'POST'){								
		$InPage = 'AllTest';
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."test ORDER BY id DESC");
	    while($Test = $db->fetch_array($query)){
			include '../templates/ADalltest.html';			
		}
        Echo '<div style="overflow: hidden;padding: 11px;">'.$ADbody.'</div>';		
	}
	elseif($_GET['Act'] == 'AllTestRes' AND $_SERVER['REQUEST_METHOD'] == 'POST'){									
		$InPage = 'AllTest';		
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."result WHERE id_test = ".$_GET['tid']);
        include '../templates/ADheaderAdd.html';
		if($db->num_rows($query) !=0){
	      while($Test = $db->fetch_array($query)){
			include '../templates/ADallresults.html';
		  }		
	      $ADbody = $addbutton.$rtn;
		}else			
	      $ADbody = $addbutton;
	    Echo '<div style="overflow: hidden;padding: 11px;">'.$ADbody.'</div>';
	}
	elseif($_GET['Act'] == 'AddTestRes' AND $_SERVER['REQUEST_METHOD'] == 'POST'){											
		$InPage = 'AllTest';				
		include '../templates/AddTestRes.html';		
        Echo '<div style="overflow: hidden;padding: 11px;">'.$ADbody.'</div>';	
	}
	elseif($_GET['Act'] == 'EditTestRes' AND $_SERVER['REQUEST_METHOD'] == 'POST'){													
		$InPage = 'AllTest';					
		include '../templates/EditTestRes.html';
	    Echo '<div style="overflow: hidden;padding: 11px;">'.$ADbody.'</div>';
	}
	elseif($_GET['Act'] == 'EditTest' AND $_SERVER['REQUEST_METHOD'] == 'POST'){														
		$InPage = 'AllTest';					
		include '../templates/ADeditTest.html';	
        Echo $ADbody;		
	}
	elseif($_USER['uid'] == 0 AND $_GET['Act'] == 'login')
	    $zdkSess->login($_POST['username'], $_POST['password']);
	elseif($_USER['uid'] != 0 AND $_GET['Act'] == 'logout')
	    $zdkSess->session_destroy();
	elseif($_USER['uid'] != 0 AND $_GET['Act'] == 'DeleteTest' AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	    Echo $zdkCore->DeleteTest();
	}
	elseif($_USER['uid'] != 0 AND $_GET['Act'] == 'DeleteRes' AND $_SERVER['REQUEST_METHOD'] == 'POST'){
	    Echo $zdkCore->DeleteResTest();
	}
}
?>