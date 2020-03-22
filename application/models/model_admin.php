<?php

class Model_Admin extends Model
{
	
	public function get_data()
	{	
        $value = "qwewqe'qwq'weq'ew";
        $sql = "INSERT INTO `table`(`Year`, `Site`, `Description`) VALUES ('1','" . addslashes($value)  . "','3')";
        
        $sql = "SELECT * FROM `table`";
        
        $result = $this->query($sql);
        
        if (!empty($result)){
            return $result;
        }
        
        
	}
    
    public function login()
	{	
    $sql = "SELECT user_id, user_password FROM users WHERE user_login='".$_POST['login']."' LIMIT 1";

    $result = $this->query($sql);
        if (!empty($result)){
            return $result[0];
        }
	}    
    
    public function authorization($hash, $user_id)
	{	

    $sql =  "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$user_id."'";

    $result = $this->query($sql);
        
        if (!empty($result)){
            return $result[0];
        }
        
        
	}
}
