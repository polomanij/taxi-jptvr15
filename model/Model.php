<?php

class Model
{
    public $db;

    function __construct() {
        $this->db = new DB();
    }

    public function get_services()
    {
        $query = 'SELECT * FROM service ORDER BY name';
        
        $rows = $this->db->getAll($query);
        
        $services_arr = [];
        foreach ($rows as $row) {
            $service = new Service($row["id"], $row["name"], $row["description"], $row["content"], $row["img"], $row["price"]);
            $services_arr[] = $service;
        }
        
        return $services_arr;
    }
    
    public function get_one_service($id)
    {
        $query = 'SELECT * FROM service WHERE id = ?';

        $row = $this->db->getOne($query, $id);
        
        return $row;
    }
    
    public function getUser($email)
    {
        $query = 'SELECT * FROM user WHERE email = ?';
        
        $row = $this->db->getOne($query, $email);
        
        return $row;
    }

    public function addUser($data)
    {
        if (true) {
            return $this->db->insertUser('INSERT INTO user(name, email, pass) VALUES('
                    . ':name,'
                    . ':email,'
                    . ':pass)', $data);
        }
    }
}