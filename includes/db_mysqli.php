<?php

class Database{

	private $con = false; 
    private $conect = ""; 
	private $result = array();
    private $query = "";
	
	public function connect(){
		if(!$this->con){
			$this->conect = new mysqli( _host, _user, _pass, _base );
            if($this->conect->connect_errno > 0){
                array_push($this->result,$this->conect->connect_error);
                return false;
            }else{
                $this->con = true;
                return true;
            } 
        }else{  
            return true;
        }  	
	}
			
    public function close(){
    	if($this->con){
    		if($this->conect->close()){
    			$this->con = false;
				return true;
			}else{
				return false;
			}
		}
    }
	
	public function query($query){
		$query = $this->conect->query($query);
		return $query;
	}
	
	public function fetch_array($sql){
		$array = mysqli_fetch_array($sql);
		
		return $array;
	}	
		
	private function tableExists($table){
		$tablesInDb = $this->conect->query('SHOW TABLES FROM '._base.' LIKE "'.$table.'"');
        if($tablesInDb){
        	if($tablesInDb->num_rows == 1){
                return true;
            }else{
            	array_push($this->result,$table." does not exist in this database");
                return false;
            }
        }
    }
	
	public function num_rows($query)
	{
		return mysqli_num_rows($query);
	}
} 
?>