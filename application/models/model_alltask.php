<?php

class Model_allTask extends Model
{
	
	public function get_data($filter)
	{	
    
        $sql = "SELECT * FROM `task`";
        
        if(!empty($filter['sort'])){
            $sql .= ' ORDER BY ' . $filter['sort'];
        }
        
        if(!empty($filter['limit'])){
            $sql .= ' limit ' . $filter['limit'];
        }
        
        if(!empty($filter['page'])){
            $sql .= ' OFFSET ' . $filter['page'];
        }
        
        $result = $this->query($sql);
        
        if (!empty($result)){
            return $result;
        }
        
        
	}
    
    public function get_data_total()
    {
        $sql = "SELECT COUNT(*) AS total FROM `task`";
        
        $result = $this->query($sql);
        
        if (!empty($result)){
            return $result['0']['total'];
        }
    }

}
