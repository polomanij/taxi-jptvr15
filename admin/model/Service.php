<?php

class Service {
    public $id;
    public $name;
    public $description;
    public $content;
    public $img;
    public $price;
            
    function __construct($id, $name, $description, $content, $img, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->content = $content;
        $this->img = $img;
        $this->price = $price;
    }

}
