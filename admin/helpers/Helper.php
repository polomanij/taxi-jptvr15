<?php

class Helper
{
    public static function checkAdmin()
    {
        session_start();
        if (!isset($_SESSION['is_auth']) || !isset($_SESSION['is_admin'])) {
            header('Location:/taxi-jptvr15/login');
            die;
        }
    }
    
    public static function serviceCreateCheck()
    {
        $errors = [];
        
        isset($_POST['name']) || $errors[] = 'Enter name';
        isset($_POST['desc']) || $errors[] = 'Enter desc';
        isset($_POST['content']) || $errors[] = 'Enter content';
        isset($_POST['price']) || $errors[] = 'Enter price';
        
        if (!empty($_FILES['image']['name'])) {
            $allowedImageTypes = ['image/jpeg', 'image/png'];
            
            if (!in_array($_FILES['image']['type'], $allowedImageTypes)) {
                $errors[] = 'Wrong image type';
            }
            
            $imageSize = $_FILES['image']['size'];
            
            if ($imageSize > 500000) {
                $errors[] = 'Too big file. Max length of the file is 500000kb';
            }
        }
        
        return $errors;
    }
}
