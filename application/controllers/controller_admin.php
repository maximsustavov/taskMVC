<?php
class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
    
    function action_index()
	{
        
        if($this->checkAuthorization()){
            $this->view->generate('admin_view.php', 'template_view.php');
        } else {
            $this->view->generate('login_view.php', 'template_view.php');
        }
        
		if(isset($_POST['submit'])) {
            
            $data = $this->model->login();

            if($data['user_password'] === md5(md5($_POST['password']))){
        
                $hash = md5($this->generateCode(10));
                $this->model->authorization($hash, $data['user_id']);

                setcookie("id", $data['user_id'], time()+60*60*24*30);
                setcookie("hash", $hash, time()+60*60*24*30);
                
                header('Location: /admin');
                
            } else {
                print '<div class="container mt-2"><div class="alert alert-danger" role="alert">Неправильный логин или пароль!</div></div>';
            }

        }
	}
    
    function action_logout() {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        header('Location: /admin');
    }
    
    function generateCode($length=6) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;  
        
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
        }
        
        return $code;
    }
}
