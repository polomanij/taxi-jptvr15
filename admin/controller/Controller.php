<?php

class Controller extends RenderTemplate
{
    private $model;

    function __construct() {
        $this->model = new Model();
    }

    
    public function adminHome()
    {
        Helper::checkAdmin();

        $html = $this->render('view/adminHome.php');
        
        return $html;
    }
    
    public function logout()
    {
        Helper::checkAdmin();

        unset($_SESSION['is_auth'], $_SESSION['is_admin']);
        
        header('Location:/taxi-jptvr15/login');
        die;
    }
    
    public function services()
    {
        Helper::checkAdmin();
        
        $services = $this->model->get_services();
        
        $html = $this->render('view/services.php', $services);
        return $html;
    }
    
    public function serviceCreate()
    {
        Helper::checkAdmin();
        
        if (isset($_POST['submit'])) {
            $errors = Helper::serviceCreateCheck();
            
            if (!count($errors)) {
                $filename = null;
                
                if (!empty($_FILES['image']['name'])) {
                    $filename = uniqid('', true) . $_FILES['image']['name'];
                    $this->model->serviceImageUpload($filename);
                }
                
                $this->model->saveService($filename);

                header('Location:services');
                die;
            } else {
                return $this->render('view/serviceCreate.php', $errors);
            }
        }
        
        $html = $this->render('view/serviceCreate.php');
        
        return $html;
    }
    
    public function serviceDelete($serviceId)
    {
        $service = $this->model->get_one_service($serviceId);
        
        if ($service['img'] !== 'no-image.png') {
            unlink(__DIR__ . '/../../public/images/' . $service['img']);
        }
        
        $this->model->deleteService($serviceId);
        
        header('Location:services');
    }
}