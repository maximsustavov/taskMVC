<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
        $this->model = new Model();
	}
    
    function checkAuthorization()
    {
        
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){

            $userdata = $this->model->check_authorization($_COOKIE['id']);

            if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {

                setcookie("id", "", time() - 3600*24*30*12, "/");

                setcookie("hash", "", time() - 3600*24*30*12, "/");

                return false;

            } else {
                return true;
            }

        } else {
            return false;
        }
        
    }
}
