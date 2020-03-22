<?php

class Controller_alltask extends Controller
{
    function get_data(){
        
        $this->model = new Model_allTask();
        if(isset($_COOKIE["sort"])){
            $filter['sort'] = $_COOKIE["sort"];
        } else {
            $filter['sort'] = 'name';
        }
        
        $filter['limit'] = 3;
        
        $serv = $_SERVER['HTTP_REFERER'];
        
        parse_str( parse_url( $serv, PHP_URL_QUERY ), $output);   
        if(!empty($output['page'])){
        $data['page'] = $output['page'];
        
        if($data['page'] > 1 ){
            $filter['page'] = ((int)$data['page'] - 1) * 3;
        }
        }
        
        $data['total'] = $this->model->get_data_total();
        
        $data['pagination'] = ceil($data['total'] / 3);
        
        
        $data['task'] = $this->model->get_data($filter);
        
        return $data;
        
    }
    
	function action_index()
	{  
        $data = $this->get_data();
		include 'application/views/allTask_view.php'; 
	}
    
    function action_adminAllTask()
	{  
        $data = $this->get_data();
		include 'application/views/admin_allTask_view.php'; 
	}
}