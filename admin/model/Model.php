<?php

class Model
{
    public $db;

    function __construct() {
        $this->db = new DB();
    }

    public function get_services()
    {
        $query = 'SELECT * FROM service ORDER BY id';
        
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
    
    public function serviceImageUpload($filename)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../../public/images/' . $filename);
    }
    
    public function saveService($filename = null)
    {
        $query = isset($filename) ? 'INSERT INTO service(name, description, content, price, img) VALUES (?, ?, ?, ?, ?)' :
                'INSERT INTO service(name, description, content, price) VALUES (?, ?, ?, ?)';

        $values = [];
        $values[] = $_POST['name'];
        $values[] = $_POST['desc'];
        $values[] = $_POST['content'];
        $values[] = $_POST['price'];
        !empty($filename) && $values[] = $filename;

        try {
            $this->db->insertService($query, $values);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
    }
    
    public function deleteService($id)
    {
        $query = 'DELETE FROM service WHERE id = ?';
        
        $this->db->getOne($query, $id);
    }
}