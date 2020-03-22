<?php

class Model
{
	
	function __construct()
    {
        $this->params = array(
            'host' => 'localhost',
            'dbname' => 'u0340415_mvc',
            'user' => 'u0340415_mvc',
            'password' => 'glzgcoc142'
                              );
    }
    
    public function query($sql) {
         
        $dsn = "mysql:host=" . $this->params['host'] . ";" . "dbname=" . $this->params['dbname'] . ";";
    
        $db = new PDO($dsn, $this->params['user'], $this->params['password']);
    
        $db->exec("set names utf8");
        
        $result = $db->query($sql);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();      
    }
    
    public function check_authorization($user_id)
	{	

    $sql =  "SELECT * FROM users WHERE user_id = '".intval($user_id)."' LIMIT 1";

    $result = $this->query($sql);
        
        if (!empty($result)){
            return $result[0];
        }
	}
    

}
