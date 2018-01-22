<?php

class Controller extends RenderTemplate
{
    private $model;

    function __construct() {
        $this->model = new Model();
    }

    
    public function home()
    {
        session_start();
        $html = $this->render('view/home.php');
        
        return $html;
    }
    
    public function services($id = null)
    {
        session_start();
        $service_list;
        $html;
        
        if (!isset($id)) {
            $service_list = $this->model->get_services();
            $html = $this->render('view/services.php', $service_list);
        } else {
            $service_list = $this->model->get_one_service($id);
            $html = $this->render('view/one_service.php', $service_list);
        }
        
        return $html;
    }
    
    public function order()
    {
        session_start();
        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, 'name');
            $tel = filter_input(INPUT_POST, 'tel');
            $adress = filter_input(INPUT_POST, 'adress');
            $serviceName = filter_input(INPUT_POST, 'service');
            $orderSuccessMsg = [];
            
            $ownerMail = 'ownerMail@mail.ru';
            $message = "Tel.: $tel, adress: $adress, service: $serviceName";
            
            $orderSuccess = mail($ownerMail, "Mail from $name, for taxi order", $message);
            
            if ($orderSuccess) {
                $orderSuccessMsg[] = 'Order was created succesfully! We will call you soon.';
            } else {
                $orderSuccessMsg[] = 'There was an error, please try again.';
            }
        }
        $services = $this->model->get_services();
        
        $html = $this->render('view/order.php', $services, isset($orderSuccessMsg) ? $orderSuccessMsg : null);
        
        return $html;
    }
    
    public function register()
    {
        session_start();
        if (isset($_POST['submit'])) {
            $helper = new InputHelper($this->model);

            $errors = $helper->registerCheckInputs();
            $inputsData = [];
            if (empty($errors)) {
                $inputData['email'] = $_POST['email'];
                $inputData['pass'] = $_POST['pass'];
                $inputData['name'] = $_POST['name'];
                
                $this->model->addUser($inputData);
                return $this->render('view/registerSuccess.php');
            } else {
                return $this->render('view/register.php', $errors);
            }
        }
        
        return $this->render('view/register.php');
    }
    
    public function login()
    { 
        session_start();
        if (isset($_SESSION['is_auth'])) {
            return $this->render('view/home.php');
        }
        
        if (isset($_POST['submit'])) {
            $helper = new InputHelper($this->model);
            
            $errors = $helper->loginCheckInputs();
            
            if (empty($errors)) {
                $user = $this->model->getUser($_POST['email']);

                session_start();
                $_SESSION['is_auth'] = true;
                
                if ($user['is_admin']) {
                    $_SESSION['is_admin'] = true;
                }
                
                header('Location:index.php');
            } else {
                var_dump($errors);die;
            }
        }
        
        return $this->render('view/login.php');
    }
    
    public function logout()
    {
        session_start();
        unset($_SESSION['is_auth']);
        header('Location:login');
        die;
    }
}