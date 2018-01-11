<?php

class Model
{
    public function get_services()
    {
        $query = 'SELECT * FROM service ORDER BY name';
        $db = new DB();
        
        $rows = $db->getAll($query);
        
        $services_arr = [];
        foreach ($rows as $row) {
            $service = new Service($row["id"], $row["name"], $row["description"], $row["content"], $row["img"]);
            $services_arr[] = $service;
        }
        
        return $services_arr;
    }
    
    public function get_one_service($id)
    {
        $query = 'SELECT * FROM service WHERE id = ?';
        $db = new DB();
        
        $row = $db->getOne($query, $id);
        
        return $row;
    }
}
