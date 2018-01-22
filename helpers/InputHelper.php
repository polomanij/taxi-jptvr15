<?php

class InputHelper
{
    private $model;
            
    function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function registerCheckInputs()
    {
        $errors = [];
        
        $mail = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_2 = $_POST['pass-2'];
        $name = $_POST['name'];
        $emailExists = $this->model->db->getOne('SELECT id FROM user WHERE email = ?', $mail);

        if (!isset($mail)) {
            $errors[] = 'Enter email';
        }
        
        if (!empty($emailExists)) {
            $errors[] = 'This email is already exists';
        }

        if (!isset($pass)) {
            $errors[] = 'Enter pass';
        }

        if (!isset($pass_2)) {
            $errors[] = 'Enter reset email';
        }
        
        if ($pass != $pass_2) {
            $errors[] = 'Passwords do not match';
        }

        if (!isset($name)) {
            $errors[] = 'Enter name';
        }
        
        return $errors;
    }

    public function loginCheckInputs()
    {
        $errors = [];
        
        $mail = $_POST['email'];
        $pass = $_POST['pass'];

        if (!isset($pass)) {
            $errors[] = 'Enter pass';
        }
        
        if (!isset($mail)) {
            $errors[] = 'Enter email';
        } else {
            if(!$this->checkUser($mail, $pass)) {
                $errors[] = 'Wrong password or email';
            }
        }
        
        return $errors;
    }
    
    private function checkUser($email, $pass)
    {
        $user = $this->model->getUser($email);
        $result = true;
        
        if(!empty($user)) {
            if (!password_verify($pass, $user['pass'])) {
                $result = false;
            }
        } else {
            return $result = false;
        }
        
        return $result;
    }
}
