<?php

class core {
	
	private $keyunlock = 'mikey';
	
	public function Get_Test($tid){
		global $db, $CONF;
		if(is_numeric($tid)){
			$where = "id = '{$tid}'";
		}else{
			$where = "nombreseo = '{$tid}'";
		}
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."test WHERE ".$where);
		if($db->num_rows($query) == '0')
			return false;
		else{
			$Test = $db->fetch_array($query);
			$user_per = $db->query("SELECT * FROM ".TABLE_PREFIX."users_test WHERE id_result=".$Test['id']." ORDER BY id DESC LIMIT 10");
				if($user_per){
					$fbusers = false;
					while($users = $db->fetch_array($user_per)){
						include './templates/fb_users_row.html';
					}
				}
				$val_rcount = number_format($Test['rcount']);				
                $val_exploded = explode(',', $val_rcount);
                if(count($val_exploded) == 1){
	                $ident = false;
                }elseif(count($val_exploded) == 2){
	                $ident = 'K';
                }elseif(count($val_exploded) == 3){
                	$ident = 'M';
                }
                $mostuser = $val_exploded[0].$ident;
			return array(
			    'img' => $Test['imagen'],
				'title' => $Test['titulo'],
				'descripcion' => $Test['descripcion'],
				'nombreseo' => $Test['nombreseo'],
				'cid' => $Test['id'],
				'uri' => $CONF['siteUri'].'test.php?test='.$Test['nombreseo'],
				'users_per' => $fbusers,
				'rcount' => $mostuser
			);
		}
	}	
	
	public function user_in_Tests($uid){
		global $db;		
		$user = $db->query("SELECT * FROM ".TABLE_PREFIX."users_test WHERE uid='".$uid."'");
		if($db->num_rows($user) != 0){
			return true;
		}else{
			return false;
		}
	}
	
	public function Load_Tests(){
		global $db;		
		
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."test ORDER BY id DESC");
		if($db->num_rows($query) == 0)
			return false;
		else{
			$LIMIT = 0;
		    $Is_New = '<div class="test_is_new">Nuevo</div>';
			$feed_id = 'top';
			$feed = array(
			    'top' => false,
			    'left' => false,
			    'right' => false
			);
			$Users_Limit = 10;
			$test_movile = false;
			while($Test = $db->fetch_array($query)){
				$user_per = $db->query("SELECT * FROM ".TABLE_PREFIX."users_test WHERE id_result=".$Test['id']." ORDER BY id DESC LIMIT ".$Users_Limit);
				$Users_Limit = 4;
				if($user_per){
					$fbusers = false;
					while($users = $db->fetch_array($user_per)){
						include './templates/fb_users_row.html';
					}
				}
				$val_rcount = number_format($Test['rcount']);				
                $val_exploded = explode(',', $val_rcount);
                if(count($val_exploded) == 1){
	                $ident = false;
                }elseif(count($val_exploded) == 2){
	                $ident = 'K';
                }elseif(count($val_exploded) == 3){
                	$ident = 'M';
                }
                $mostuser = $val_exploded[0].$ident;
				$Test['time'] = time() - $Test['time'];
				if($LIMIT != 3){
					$LIMIT++;
				}else{
					if($Test['time'] > 86400){
					    $Is_New = false;
				    }					
				}				
				include './templates/test_row.html';
				$test_movile .= $test;
				$feed[$feed_id][] = $test;
				if($feed_id == 'top'){
					$feed_id = 'left';
				}elseif($feed_id == 'left'){
					$feed_id = 'right';
				}elseif($feed_id == 'right'){
					$feed_id = 'left';
				}
			}
			$feeds = array(
			    'left' => false,
			    'right' => false
			);
			for($i = 0, $max = count($feed['left']); $i < $max; $i++){
				$feeds['left'] .= $feed['left'][$i];
			}
			for($i = 0, $max = count($feed['right']); $i < $max; $i++){
				$feeds['right'] .= $feed['right'][$i];
			}
					
			$rtn = '<div id="destop_format">'
			    .'<div id="feed_top">'.$feed['top'][0].'</div>'
			    .'<div id="feed_left">'.$feeds['left'].'</div>'
			    .'<div id="div_dv"></div>'
			    .'<div id="feed_right">'.$feeds['right'].'</div>'
				.'</div>'
				.'<div id="movile_format">'
				.$test_movile
				.'</div>';
			
			return $rtn;
		}		
	}		
	
	public function Load_Tests_Ramd($right_result=false){
		global $db;		
		
		if($right_result != false) $lm = 6; else $lm = 5;
		
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."test ORDER BY RAND() LIMIT ".$lm);
		if($db->num_rows($query) == 0)
			return false;
		else{
			while($Test = $db->fetch_array($query)){
				if($right_result == false)
				    include './templates/test_ramd_row.html';
				else
				    include './templates/test_right_ramd_row.html';
			}
			return $rtn; 
		}		
	}
	
	public function res_not_inc($gid, $u, $f, $un, $fn, $udt){
		global $db;	
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."result WHERE id_test='".$gid."' ORDER BY RAND() LIMIT 1");
		    $db->query("UPDATE ".TABLE_PREFIX."test SET rcount=rcount+1 WHERE id = '".$gid."' ");	
		    if($db->num_rows($query) > 0){
		        $Test = $db->fetch_array($query);
			
			    $img = 'resimg.php?r='. $Test['id'] .'&u='. $u .'&f='. $f.'&fn='. $fn.'&un='. $un ;
			    $sd = 'img_res: '.$img
				   .', g:'.$gid
				   .', test:'.$gid				   
				   .', uname:'.$un
				   .', fname:'.$fn
				   .', resID:'.$Test['id'];
				if($udt == true){
					$db->query("UPDATE ".TABLE_PREFIX."users_test SET 
					    fid='".$f."',
					    result='".$img."'
					    time_inc='".date("Y-m-d")."'
						WHERE uid='".$u."'
					");
				}else{
					$db->query("INSERT INTO ".TABLE_PREFIX."users_test (uid, fid, uname, fname result, id_result, time_inc) 
					    VALUES 
					('".$u."','".$un."','".$f."','".$fn."','".$img."','".$gid."', '".date("Y-m-d")."') ");
				}   
		        return array(
		          'status' => true,
                  'img' => $img,
                  'code' => str_replace('+', '@', $this->enCode($sd)),
                  'ResIF' => $Test['id']				  
		        );
		    }
	}
	
	public function perform_test($gid, $u, $f, $un, $fn){
		global $db;		
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."test WHERE id='".$gid."'");
		$test = $db->fetch_array($query);
		
		$user_inc = $db->query("SELECT * FROM ".TABLE_PREFIX."users_test WHERE uid='".$u."' AND id_result='".$gid."'");
		$user_rlz = false;
		if($db->num_rows($user_inc)){
			$user_ext = true;
		    $user = $db->fetch_array($user_inc);			
		    if($user['time_inc'] == date("Y-m-d")){
				$user_rlz = true;
			}
		}else{
			$user_ext = false;
		}		
		
		if($user_ext == true){
			if($test['unic_result'] == 'FALSE-RES'){
			    $rtn = $this->res_not_inc($gid, $u, $f, $un, $fn, true);
				if($rtn['status'] == true){
					return array(
					   'status' => true,
                       'img' => $rtn['img'],
                       'code' => $rtn['code'],
                       'ResIF' => $rtn['id'],
						'fname' => $fn,
					);
				}
		    }elseif($test['unic_result'] == 'TRUE-RES'){			    
				if($user_rlz == true){
					$ress = $this->res_not_inc($gid, $u, $f, $un, $fn, true); 
					if($ress['status'] == true){
					    $sd = 'img_res: '.$ress['img']
			              .', g:'.$gid
			              .', test:'.$gid			   
				          .', uname:'.$un
				          .', fname:'.$fn
				          .', ResID:'.$ress['ResID'];
		                return array(
		                  'status' => true,
                          'img' => $ress['img'],
                          'fname' => $fn,
                          'code' => str_replace('+', '@', $this->enCode($sd)) ,
                          'ResIF' => $ress['ResID']				  			  
		                );	
					}else{
						return array(
						  'status' => false
						);
					}
				}else{
					$sd = 'img_res: '.$user['result']
			            .', g:'.$gid
			            .', test:'.$gid				   
			            .', uname:'.$u
			            .', fname:'.$f;
		            return array(
		                'status' => true,
                        'img' => $user['result'],
						'fname' => $f,
                        'code' => str_replace('+', '@', $this->enCode($sd)) 			  
		            );	
				}
		    }	
		}else{
			return $this->res_not_inc($gid, $u, $f, $un, $fn, false);	
		}
	}
	
	public function enCode($string) {
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($this->keyunlock, ($i % strlen($this->keyunlock))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            @$result.=$char;
        }
        return base64_encode($result);
    }

    public function deCode($string) {
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($this->keyunlock, ($i % strlen($this->keyunlock))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            @$result.=$char;
        }
        return $result;
    }
	
	public function SR_Array($string, $delimiter = ',', $kv = ':') {
        if ($a = explode($delimiter, $string)) {
            foreach ($a as $s) {
                if ($s) {
                    if ($pos = strpos($s, $kv)) {
                        $ka[trim(substr($s, 0, $pos))] = trim(substr($s, $pos + strlen($kv)));
                    } else {
                        $ka[] = trim($s);
                    }
                }
            }
            return $ka;
        }
    }
	
	public function utp_visit_test($test){
		global $db;
		$db->query("UPDATE ".TABLE_PREFIX."test SET views=views+1 WHERE nombreseo='".$test."'");
	}
	
	public function add_visit(){
		if (empty($_POST['checkip']))
        {
            $ip = $_SERVER["REMOTE_ADDR"]; 
        }
        else
        {
            $ip = $_POST['checkip']; 
        }
		
		if($this->check_visit($ip)){
			$this->utp_visit($ip);
		}
		else
		{
			$this->inc_visit($ip);
		}
	}
	
	public function utp_visit($ip){
		global $db;
		$db->query("UPDATE ".TABLE_PREFIX."view SET views=views+1 WHERE ip='".$ip."' AND date='".date("Y-m-d")."' ");
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."view WHERE ip='".$ip."' LIMIT 1");
		$visit = $db->fetch_array($query);
		$db->query("UPDATE ".TABLE_PREFIX."region SET views=views+1 WHERE region='".$visit['region']."' AND date='".date("Y-m-d")."' ");
	}
	
	public function inc_visit($ip){
		global $db;
		
		if($_SERVER["SERVER_NAME"] == "localhost")
        {
            //localhost
			$Region = "Region Desconocida";
		}
        else
		{
            //dominio
		    include("geoiploc.php"); 			
            $Region = getCountryFromIP($ip, " NamE");			
        }  
		$db->query("INSERT INTO ".TABLE_PREFIX."view (ip, views, region, time, date) 
		    VALUES('".$ip."', 1,'".$Region."','".time()."','".date("Y-m-d")."')");	
		if(!$this->check_region($Region)){
			$db->query("INSERT INTO ".TABLE_PREFIX."region (views, region, time, date) 
		        VALUES(1,'".$Region."','".time()."','".date("Y-m-d")."')");
		}	
	}
	
	public function check_visit($ip){
		global $db;
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."view WHERE ip='".$ip."' AND date='".date("Y-m-d")."' LIMIT 1");
		if($db->num_rows($query)){
			return true;
		}else{
			return false;
		}
	}
	
	public function check_region($Region){
		global $db;
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."region WHERE region='".$Region."' AND date='".date("Y-m-d")."' LIMIT 1");
		if($db->num_rows($query)){
			return true;
		}else{
			return false;
		}
	}
}
?>