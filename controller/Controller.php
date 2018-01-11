<?php

class Controller extends RenderTemplate
{
    private $model;

    function __construct() {
        $this->model = new Model();
    }

    
    public function home()
    {
        $html = $this->render('view/home.php');
        
        return $html;
    }
    
    public function services($id = null)
    {
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
        $html = $this->render('view/order.php');
        
        return $html;
    }
}