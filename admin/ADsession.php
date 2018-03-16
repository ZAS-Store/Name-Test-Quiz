<?php

class ADsession {

  function set($nombre, $valor) 
  {
        $_SESSION[$nombre] = $valor;
  }
  
  function restric($dir) 
  {
	  global $ZDK;
	  
	    if ($admin->user_id == "0") {
		    header("Location: ".$dir.".php");
	    }
  }  

  function get($nombre)
  {
	    $default = "0"; 
		
        if (isset ($_SESSION["$nombre"])) {
            return $_SESSION["$nombre"];
        } else {
            if ($nombre == "admin_id"){
				return $default;
			} else {
				return false;
			}
        }
  }
  
  function session_destroy() 
  {
        unset($_SESSION['e-mail'],$_SESSION['aid'],$_SESSION['user-name']);
        session_destroy ();
        header("Location: index.php");
  }
  
  function login($user, $password) 
  {
	global $db;
	$query = $db->query("SELECT * FROM ".TABLE_PREFIX."users WHERE username = '$user' AND password = SHA('$password')");
    $row = $db->fetch_array($query);  
    $this->set("user-name", $row["username"]);
    $this->set("e-mail", $row["email"]);
    $this->set("aid", $row["id"]);
	if($_SESSION['user-name'] == true){
		header("Location: ./index.php");
		return true;
	} else {
	    header("Location: ./index.php?error=login");
	}			
  }  
}