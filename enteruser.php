<?php
	class Random
	{
		function RandomKey()
		{
			$guid = '';
			$uid = uniqid("", true);
			$data = $namespace;
			$data .= $_SERVER['REQUEST_TIME'];
			$data .= $_SERVER['HTTP_USER_AGENT'];
			$data .= $_SERVER['LOCAL_ADDR'];
			$data .= $_SERVER['LOCAL_PORT'];
			$data .= $_SERVER['REMOTE_ADDR'];
			$data .= $_SERVER['REMOTE_PORT'];
			$hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
			$guid = '{' .   
			substr($hash,  0,  8) . 
			'-' .
			substr($hash,  8,  4) .
			'-' .
			substr($hash, 12,  4) .
			'-' .
			substr($hash, 16,  4) .
			'-' .
			substr($hash, 20, 12) .
			'}';
            
            return $guid;
		}
		
		function GetUniqueId()
		{
			$id = $this->RandomKey();
			$id = md5($id);
			$id = substr($id, 0, 5);
			$id = "ITRIX".$id;
			return $id;
		}
	}
	$name = $_POST['name'];
	$email = $_POST['email'];
	$organisation = $_POST['organisation'];
	$phone = $_POST['phone'];
	$gender = "Male";
	if(isset($_POST['female']))
		$gender="Female";
	$rand = new Random();
	$id = $rand->GetUniqueId();
	
	
	echo $name;
	echo $phone;
	echo $email;
	echo $organisation;
	echo $gender;
	echo $id;
?>