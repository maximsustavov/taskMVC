<?php

class Controller_Task extends Controller
{    
    function action_addTask()
	{	
        
        $data['result']='success';

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        } else {
            $data['result']='error';
        } 
        
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $data['result']='error';
        } 
        
        if (isset($_POST['task'])) {
            $task = $_POST['task'];
        } else {
            $data['result']='error';
        }
        
        if($data['result'] == 'success'){
            $this->model = new Model_Task();
            $this->model->addTask($name, $email, $task);
            
        }
        
        echo json_encode($data);
    } 
    
    function action_editTask()
	{
        if($this->checkAuthorization()){
            
            $data['result']='success';

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            } else {
                $data['result']='error';
            } 
        
            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            } else {
                $data['result']='error';
            } 
        
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                $data['result']='error';
            } 
        
            if (isset($_POST['task'])) {
                $task = $_POST['task'];
            } else {
                $data['result']='error';
            }
        
            if (isset($_POST['status'])) {
                $status = $_POST['status'];
            } else {
                $data['result']='error';
            }
        
            if($data['result'] == 'success'){
                $this->model = new Model_Task();
                
                $taskBd = $this->model->getTask($id);
                
                if($taskBd['Task'] != $task || $taskBd['edit_admin'] == 1){
                    $editAdmin = 1;
                } else {
                    $editAdmin = 0;
                }
                
                $this->model->editTask($id, $name, $email, $task, $status, $editAdmin);
            
            }
        
            echo json_encode($data);
            
        } else {
            $data['result']='Authorization';
            echo json_encode($data);
        }
        
    }
}
