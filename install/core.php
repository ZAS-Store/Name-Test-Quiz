<?php

class coreInc {
	
	public function InserUser(){
		global $db;
		
        $email= $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
	   
	    if($email == ""){
			echo "debes introducir tu correo electronico";
		} elseif($username == ""){
			echo "debes introducir un username";
		} elseif($password == ""){
		 	echo "debes introducir un password";
		} else {
			$date = Date("Y-m-d h:i:s");
			$active = 'true';
		    $query = $db->query("INSERT INTO ".TABLE_PREFIX."users (username, email, password, created_on, active)
  			VALUES ('$username', '$email', SHA('$password'), '$date', '$active')");	
            if($query){
				$fp = fopen('../install/look.int', "w");
                fclose($fp);
				header("Location: ../index.php");
			}else                
				header("Location: index.php?fase=aduser&error");				
		}	   
	}
	
	public function createConf(){

		$conect = new mysqli( $_POST['host'], $_POST['username'], $_POST['password'], $_POST['database'] );
        if($conect->connect_errno > 0){
            header("Location: index.php?fase=db&ms=error_not_conet");
			exit;
        }		
		
		$cm = '"'; $DOL = '$';		
		$Conf = "<?php";
        $Conf .= "
	".$DOL."config['database'] = ".$cm.$_POST['database'].$cm.";";
        $Conf .= "
	".$DOL."config['table_prefix'] = ".$cm.$_POST['table_prefix'].$cm.";";
        $Conf .= "
	".$DOL."config['hostname'] = ".$cm.$_POST['host']."".$cm.";";
        $Conf .= "
	".$DOL."config['username'] = ".$cm.$_POST['username'].$cm.";";
        $Conf .= "
	".$DOL."config['password'] = ".$cm.$_POST['password'].$cm.";";
        $Conf .= "
?>";

        $fp = fopen('../includes/config.php', "w");
        fputs($fp, $Conf);
        fclose($fp);
        
		header("Location: index.php?fase=insert_tables");
        return true;
	}
	
}

?>