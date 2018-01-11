<?php

class Service {
    public $id;
    public $name;
    public $description;
    public $content;
    public $img;
    
    function __construct($id, $name, $description, $content, $img) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->content = $content;
        $this->img = $img;
    }

}
