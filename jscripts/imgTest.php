<?php
  
class imgTest{
	private $avUser;
	private $avFriend;
	private $avTur = 0;
	private $fond;
	
	private function prepareImg($U, $s,$name){
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $U); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_HEADER, true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $ZZ = curl_exec($ch); 
        curl_close($ch);
        preg_match('/Location:(.*?)\n/', $ZZ, $matches); 
        $im = trim(array_pop($matches)); 
        return $this->resize(imagecreatefromjpeg($im), $s, $s,$name); 
    }
	
	private function ext($img){
	    $ext = pathinfo($img);
        $ext = $ext['extension'];
	
	    switch($ext) {
          case 'jpg':
            $this->fond = @imagecreatefromjpeg($img);
            break;
          case 'gif':
            $this->fond = @imagecreatefromgif($img);
            break;
          case 'png':
            $this->fond = @imagecreatefrompng($img);
            break;
        }
    }
	
	private function resize($img, $x, $y,$name){	
        $Imgx = imagesx($img);
        $Imgy = imagesy($img);
 
        $im = imagecreatetruecolor($x, $y);
        imagecopyresampled($im, $img, 0, 0, 0, 0, $x, $y, $Imgx, $Imgy);
		
		//NCR
		$bg = imagecolorallocate($im, 255, 255, 255);
		$textcolor = imagecolorallocate($im, 255, 0, 0);

		// Write the string at the top left
		imagestring($im, 5, 10, $y - 10, $name, $textcolor);
		//NCR
	
     	return $im;
    }
	
    private function GetPhoto($uid){
	    return "https://graph.facebook.com/".$uid."/picture?width=1400&height=1400";
    }
	
	private function SR_Array($string, $delimiter = ',', $kv = ':') {
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
	
	function __construct($fond, $uid, $fid, $uCords, $fCords, $fn, $un){
		$this->ext($fond);
		$this->fond = $this->resize($this->fond, 575, 302,'');
		
		$uC = $this->SR_Array($uCords);
		$fC = $this->SR_Array($fCords);
		if($uC['status'] == '200'){
			$this->avUser = $this->prepareImg($this->GetPhoto($uid), $uC['s'],$un);
		    imagecopy($this->fond,$this->avUser, $uC['x'], $uC['y'], 0, 0, $uC['s'], $uC['s']); 
		}
        if($fC['status'] == '200'){
			$this->avFriend = $this->prepareImg($this->GetPhoto($fid), $fC['s'],$fn);
		    imagecopy($this->fond, $this->avFriend, $fC['x'], $fC['y'], 0, 0, $fC['s'], $fC['s']);	
		}
		
        imagejpeg($this->fond);
	}
	
	//NCR
	private function add_name_on_img($uid,$name){
				// Create image handle
		//$im = imagecreatetruecolor(200, 200);
		$im = $this->GetPhoto($uid);

		// Allocate colors
		//$black = imagecolorallocate($im, 0, 0, 0);
		//$white = imagecolorallocate($im, 255, 255, 255);

		// Load the PostScript Font
		//$font = imagepsloadfont('font.pfm');

		// Write the font to the image
		//imagepstext($im, $name, $font, 12, $black, $white, 50, 50);
		//return $im;
		
		// White background and blue text
		$bg = imagecolorallocate($im, 255, 255, 255);
		$textcolor = imagecolorallocate($im, 0, 0, 0);

		// Write the string at the top left
		if(imagestring($im, 5, 0, 10, $name, $textcolor,50, 50))
			return $im;
		else
			return null;
	}
	
	
	//NCR
	
	
}
?>