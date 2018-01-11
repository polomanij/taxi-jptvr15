<?php

abstract class RenderTemplate
{
    public function render($path, $args1 = [], $args2 = [])
    {
        extract($args1);
        extract($args2);
        
        ob_start();
        require_once $path;
        $html = ob_get_clean();
        
        return $html;
    }
}
