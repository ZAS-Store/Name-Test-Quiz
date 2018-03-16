<?php
define('TEST_ZDK', true);
require_once './global.php';
require_once './includes/imgTest.php';

if(isset($_GET['r']) 
    AND isset($_GET['u'])
    AND isset($_GET['f'])
    AND is_numeric($_GET['r'])
    AND is_numeric($_GET['u'])
    AND is_numeric($_GET['f'])
	){
	 
    $query = $db->query("SELECT * FROM ".TABLE_PREFIX."result WHERE id = ".$_GET['r']);
    if($db->num_rows($query) > 0){
        $i = $db->fetch_array($query);   
	    header('Content-type: image/png');
        $Tim = new imgTest($i['imagen'], $_GET['u'], $_GET['f'], $i['user_av'], $i['friend_av1'], $_GET['fn'], $_GET['un']);
	    //header("location: http://soportemybb.es/imgTest.php?i=http://wordtag.hol.es/".$i['imagen']."&u=".$_GET['u']."&f=".$_GET['f']."&du=".$i['user_av']."&df=".$i['friend_av1']);
    }   
}

?>