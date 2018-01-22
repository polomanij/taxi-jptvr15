<?php

class DB
{
    public $link;
    
    public function __construct()
    {
        $this->connect();
    }
    
    private function connect()
    {
        $config = require_once __dir__ . '/../conf/db_conf.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];
        
        try {
            $this->link = new PDO($dsn, $config['user'], $config['pass']);
        } catch (Exception $exc) {
            echo $exc->getMessage();
            die();
        }
    }
    
    private function queryPrepare($query, $id =null)
    {
        $result = $this->link->prepare($query);
        $result_exe = isset($id) ? $result->execute([$id]) : $result->execute();
        
        if (!$result_exe) {
            echo 'PDO error with query: ' . $query;
            die();
        }
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getOne($query, $id = null)
    {
        $result = isset($id) ? $this->queryPrepare($query, $id) : $this->queryPrepare($query);

        $response = $result->fetch();
        
        return $response;
    }
    
    public function getAll($query)
    {
        $result = $this->queryPrepare($query);
        $response = $result->fetchAll();
        
        return $response;
    }

        public function insertUser($query, $data)
    {
        if (is_array($data)  && !empty($data)) {
            $result = $this->link->prepare($query);
            
            return $result->execute([
                'name' => $data['name'],
                'email' => $data['email'],
                'pass' => password_hash($data['pass'], PASSWORD_DEFAULT),
            ]);
        }
    }
    
    public function insertService($query, $values)
    {
        $result = $this->link->prepare($query);

        try {
            /*$result->execute([
                'name' => $values['name'],
                'description' => $values['description'],
                'content' => $values['content'],
                'price' => $values['price'],
                'img' => $values['img']
            ]);*/
            
            $result->execute($values);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
    }
}
