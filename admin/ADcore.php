<?php

class ADcore {	
	
	public function add_categori(){
		global $db;		
		if(!isset($_POST['test-name']) OR $_POST['test-name'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: el titulo no existe o no as escrito uno: '.$_POST['test-name']
			);
		elseif(!isset($_POST['seo-name']) OR $_POST['seo-name'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: el Nombre seo no existe o no as escrito uno'
			);	
		elseif(!isset($_POST['des-test']) OR $_POST['des-test'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: la descripcion no existe o no as escrito una'
			);	
        else{
			$IMG = $this->upload_photo( $_FILES['imagenTest'] );	
            if($_POST['rcount-test'] == ''){
				$_POST['rcount-test'] = 1000;
			}				
			if($IMG['status'] == true){			
		        $query = $db->query("INSERT INTO ".TABLE_PREFIX."test (titulo, nombreseo, descripcion, imagen, rcount, time, date, unic_result) 
		           VALUES('".$_POST['test-name']."','".$_POST['seo-name']."','".$_POST['des-test']."','".$IMG['img']."','".$_POST['rcount-test']."', '".time()."', '".date("Y-m-d")."', '".$_POST['mode_life_result']."')");							
                if($query)                
			      return array(
		            "state" => true,
			     	"messaje" => 'Succesfully: el test fue creada con exito'
                  );
			}else{
				return array(
		            "state" => false,
			     	"messaje" => $IMG['messaje']
			    );
			}				
		}	
	}
	
	public function udp_categori(){
		global $db;		
		if(!isset($_POST['test-name']) OR $_POST['test-name'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: el titulo no existe o no as escrito uno'
			);
		elseif(!isset($_POST['seo-name']) OR $_POST['seo-name'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: el Nombre seo no existe o no as escrito uno'
			);	
		elseif(!isset($_POST['des-test']) OR $_POST['des-test'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: la descripcion no existe o no as escrito una'
			);	
        else{
			if(in_array($_FILES['imagenTest']['type'], $this->image_soport ))
		        $IMG = $this->upload_photo( $_FILES['imagenTest'] );
		    else
			    $IMG=array(
				   'status' => true,
				   'img' => $_POST['UrIMG']
				);	
				
            if($_POST['rcount-test'] == ''){
				$_POST['rcount-test'] = 1000;
			}					
			if($IMG['status'] == true){			
                $query = $db->query("UPDATE ".TABLE_PREFIX."test SET 
		           titulo='".$_POST['test-name']."', 
			       nombreseo='".$_POST['seo-name']."',
			       descripcion='".$_POST['des-test']."',
			       rcount='".$_POST['rcount-test']."',
				   unic_result='".$_POST['mode_life_result']."',
			       imagen='".$IMG['img']."'
  			       WHERE id = '".$_POST['test-id']."' ");					
                if($query)                
			      return array(
		            "state" => true,
			     	"messaje" => 'Succesfully: el test fue Actualizada con exito'
                  );
				else                
			      return array(
		            "state" => false,
			     	"messaje" => 'ERROR: actualizando el test'
                  );
			}else{
				return array(
		            "state" => false,
			     	"messaje" => $IMG['messaje']
			    );
			}				
		}			
	}	
	
	public function add_Res(){
		global $db;		
		if(!isset($_POST['title']) OR $_POST['title'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: el titulo no existe o no as escrito uno'
			);
		elseif(!isset($_POST['des']) OR $_POST['des'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: la descripcion no existe o no as escrito una'
			);	
        else{
			$IMG = $this->upload_photo( $_FILES['imagenTest'] );			
			if($IMG['status'] == true){			
		        $query = $db->query("INSERT INTO ".TABLE_PREFIX."result (id_test, titulo, descripcion, imagen, user_av, friend_av1) 
		           VALUES('".$_POST['test_id']."','".$_POST['title']."','".$_POST['des']."','".$IMG['img']."','".$_POST['data_user']."','".$_POST['data_userFriend']."')");							
                if($query)                
			      return array(
		            "state" => true,
			     	"messaje" => 'Succesfully: el resultado fue creada con exito'
                  );
			}else{
				return array(
		            "state" => false,
			     	"messaje" => $IMG['messaje']
			    );
			}				
		}		
	}
	
	private $image_soport = array(
	    'image/png',
	    'image/jpg',			
	    'image/jpeg',
	    'image/gif'
    );
	
	public function udp_res(){
		global $db;		
		if(!isset($_POST['title']) OR $_POST['title'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: el titulo no existe o no as escrito uno'
			);
		elseif(!isset($_POST['des']) OR $_POST['des'] == '')
			return array(
		        "state" => false,
				"messaje" => 'ERROR: la descripcion no existe o no as escrito una'
			);	
        else{
			if(in_array($_FILES['imagenTest']['type'], $this->image_soport ))
		        $IMG = $this->upload_photo( $_FILES['imagenTest'] );
		    else
			    $IMG=array(
				   'status' => true,
				   'img' => $_POST['UrIMG']
				);			
			if($IMG['status'] == true){			
                $query = $db->query("UPDATE ".TABLE_PREFIX."result SET 
		           titulo='".$_POST['title']."', 
			       descripcion='".$_POST['des']."',
			       imagen='".$IMG['img']."',
			       user_av='".$_POST['data_user']."',
			       friend_av1='".$_POST['data_userFriend']."'
  			       WHERE id = '".$_POST['test_id']."' ");					
                if($query)                
			      return array(
		            "state" => true,
			     	"messaje" => 'Succesfully: el resultado fue Actualizada con exito'
                  );
				else                
			      return array(
		            "state" => false,
			     	"messaje" => 'ERROR: actualizando el resultado'
                  );
			}else{
				return array(
		            "state" => false,
			     	"messaje" => $IMG['messaje']
			    );
			}				
		}			
	}	
	
	public function DeleteTest(){
        global $db;	
		$query = $db->query("DELETE FROM ".TABLE_PREFIX."test WHERE id = ".$_GET['tid']); 
		if($query){
			$db->query("DELETE FROM ".TABLE_PREFIX."test WHERE id_categoria = ".$_GET['tid']); 
			return 'DELETE-TEST-SUCCESFULLY';
		}
	}
	
	public function DeleteResTest(){
        global $db;	
		$query = $db->query("DELETE FROM ".TABLE_PREFIX."result WHERE id = ".$_GET['tid']); 
		if($query)
			return 'DELETE-TEST-RES-SUCCESFULLY';
	}
	
	public function udt_conf(){	
        global $db;	
	    $query = $db->query("UPDATE ".TABLE_PREFIX."config SET 
		    siteName='".$_POST['siteName']."', 
			siteDescription='".$_POST['siteDescription']."',
			siteUri='".$_POST['siteUri']."',
			FanPage='".$_POST['FB_page']."',
			FB_ID='".$_POST['FB_ID']."',
			analytics_ID='".$_POST['analytics_ID']."',
			ads_720='".$_POST['ads_720']."',
			ads_300='".$_POST['ads_300']."'
  			WHERE id=1");
		if($query)
			return 'SAVE-CONFIG-SUCCESFULLY';
	}
	
    public function upload_photo( $__FILE ){
		global $db, $_USER;
		if($_USER['uid'] != 0){	
			if(in_array($__FILE['type'], $this->image_soport)){
	            switch($__FILE['type']){
	    	        case "image/gif":
	    		        $__TYPE = 'gif'; 
	    		        break;
	                case "image/jpeg":
	    	        case "image/jpeg":
	    	        case "image/jpg":
	    		        $__TYPE = 'jpg';
	    	        	break;
	                case "image/png":
	    	        case "image/x-png":
	    		        $__TYPE = 'png';
	    	        	break;
  	            }
				$__rand01 = rand(55000, 90000);
				$__rand02 = rand(10000, 50000);
				$__NEW_NAME = $__rand01.'7'.time().'7'.$__rand02.'.'.$__TYPE;
				$Dir = 'images/'.$__NEW_NAME;
			    if(move_uploaded_file($__FILE['tmp_name'], '../'.$Dir)){					
					    
				    $rtn = array(
				        'status' => true,
						'img' => $Dir
				    );
				}else
				    $rtn = array(
				        'status' => false,
						'messaje' => 'MOVE-ERROR'
				    );	
			}else
			    $rtn = array(
				    'status' => false,
					'messaje' => 'TYPE-ERROR'
				);				
		}else
			$rtn = array(
			    'status' => false,
			    'messaje' => 'IDENT-ERROR'
	        );
        return $rtn;		
	} 
	
	function get_name_test($tid) {
		global $db;
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."test WHERE id='".$tid."'");
		$Test = $db->fetch_array($query);
        return $Test['nombreseo'];
    }
	
	function porcent($t, $p, $r = 2) {
        return round($p / $t * 100, $r);
    }
	
	public function get_unic_visit_delay(){
		global $db;
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."view WHERE date='".date("Y-m-d")."'");
        return $db->num_rows($query);
	}
	
	public function get_visit_delay(){
		global $db;
		$query = $db->query("SELECT SUM(views) AS Total FROM ".TABLE_PREFIX."view WHERE date='".date("Y-m-d")."'");
		$result = $db->fetch_array($query);
		if($result['Total'] == false){
			$result['Total'] = 0; 
		}
        return $result['Total'];	
	}
	
	public function get_pais_delay(){
		global $db;
		$paises = array();
		$visitas = array();
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."region WHERE date='".date("Y-m-d")."'");
		while($result = $db->fetch_array($query)){
		    $paises[$result['views']] = $result['region'];
		    $visitas[] = $result['views'];
		}
        $max = max($visitas);
		@$total="";
		Foreach ($visitas as $valor){ 
            $total=$total+$valor; 
        } 
        return $paises[$max].'<br>'.$this->porcent($total, $max, 2).'%';	
	}
	
	public function get_pais_total(){
		global $db;
		$paises = array();
		$visitas = array();
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."region ORDER BY views DESC");
		while($result = $db->fetch_array($query)){
		    $paises[$result['views']] = $result['region'];
		    $visitas[] = $result['views'];
		}
        $max = max($visitas);
		@$total="";
		Foreach ($visitas as $valor){ 
            $total=$total+$valor; 
        } 
        return $paises[$max].'<br>'.$this->porcent($total, $max, 2).'%';	
	}
	
	public function get_table_pais(){
		global $db;
		$paises = array();
		$query = $db->query("SELECT SUM(views) AS Total FROM ".TABLE_PREFIX."region");
		$vtp = $db->fetch_array($query);
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."region");
		while($result = $db->fetch_array($query)){
			if(!in_array($paises[$result['region']], $paises)){
				$paises[$result['region']] = array(
				    'region' => $result['region'], 
				    'views' => $result['views'],
					'porcent' => $this->porcent($vtp['Total'], $result['views'], 2)
				);
			}else{
				$paises[$result['region']] = array(
				    'region' => $result['region'], 
				    'views' => $paises[$result['region']]['views'] + $result['views'],
					'porcent' => $paises[$result['region']]['porcent'] + $this->porcent($vtp['Total'], $result['views'], 2)
				);
			}
		}
		Foreach ($paises as $pais){ 
            $gpt .= '<tr><td class="row">'.$pais['region'].'</td><td class="row">'.$pais['views'].'</td><td class="row row_por">'.$pais['porcent'].'%</td></tr>';
        } 
	    
        return $gpt;	
	}
	
	public function get_table_pais_delay(){
		global $db;
		$paises = array();
		$query = $db->query("SELECT SUM(views) AS Total FROM ".TABLE_PREFIX."region WHERE date='".date("Y-m-d")."'");
		$vtp = $db->fetch_array($query);
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."region WHERE date='".date("Y-m-d")."'");
		while($result = $db->fetch_array($query)){
			if(!in_array($paises[$result['region']], $paises)){
				$paises[$result['region']] = array(
				    'region' => $result['region'], 
				    'views' => $result['views'],
					'porcent' => $this->porcent($vtp['Total'], $result['views'], 2)
				);
			}else{
				$paises[$result['region']] = array(
				    'region' => $result['region'], 
				    'views' => $paises[$result['region']]['views'] + $result['views'],
					'porcent' => $paises[$result['region']]['porcent'] + $this->porcent($vtp['Total'], $result['views'], 2)
				);
			}
		}
		Foreach ($paises as $pais){ 
            $gpt .= '<tr><td class="row">'.$pais['region'].'</td><td class="row">'.$pais['views'].'</td><td class="row row_por">'.$pais['porcent'].'%</td></tr>';
        } 
        return $gpt;	
	}
	
	public function get_unic_visit_total(){
		global $db;
		$query = $db->query("SELECT * FROM ".TABLE_PREFIX."view");
        return $db->num_rows($query);
	}
	
	public function get_visit_total(){
		global $db;
		$query = $db->query("SELECT SUM(views) AS Total FROM ".TABLE_PREFIX."view");
		$result = $db->fetch_array($query);
		if($result['Total'] == false){
			$result['Total'] = 0; 
		}
        return $result['Total'];	
	}
	
	function SR_Array($string, $delimiter = ',', $kv = ':') {
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
}