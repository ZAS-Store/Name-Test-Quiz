<?php
require_once './global.php';

if(isset($_GET['Act'])){
    if($_GET['Act'] == 'get_test')
	  {
		$Test = $zdk->Get_Test($_REQUEST['test']);  
        				
		echo json_encode($Test);
      }	
    elseif($_GET['Act'] == 'get_test_ramd')
	  {
		$Test = $zdk->Load_Tests_Ramd(true);  
        				
		echo $Test;
      }	
    elseif($_GET['Act'] == 'perform_test')
	  {
		$Test = $zdk->perform_test($_REQUEST['game'], $_REQUEST['uid'], $_REQUEST['fid'], $_REQUEST['uname'], $_REQUEST['fname']);  
        				
		echo json_encode($Test);
      }
	else
	  {
	    header('location: 404.php');
      }  
}
else{
	header('location: 404.php');
}

?>