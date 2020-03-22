<?php

class Model_Task extends Model
{    
    public function addTask($name, $email, $task){
        
        $sql = "INSERT INTO `task`(`Name`, `Email`, `Task`, `status`, `edit_admin`) VALUES ('" . addslashes($name)  . "','" . addslashes($email)  . "','" . addslashes($task)  . "', 0, 0)";
        
        $this->query($sql);
        
    }
    
    public function editTask($id, $name, $email, $task, $status, $editAdmin){
        
        $sql = "UPDATE `task` SET `Name`='" . addslashes($name)  . "',`Email`='" . addslashes($email)  . "',`Task`='" . addslashes($task)  . "',`status`='" . (int)$status  . "',`edit_admin`='" . (int)$editAdmin  . "' WHERE `id`='" . (int)$id  . "'";
        
        $this->query($sql);
        
    }
    
    public function getTask($id){
        
        $sql = "SELECT * FROM `task` WHERE `id`='" . (int)$id  . "'";
        
        $result = $this->query($sql);
        
        return $result[0];
        
    }

}
