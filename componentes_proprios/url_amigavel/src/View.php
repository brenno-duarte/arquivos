<?php

namespace Source\View;

class View 
{

    public function render(string $file)
    {

        //$file = $_GET['url'].".php";

        /*var_dump($file);
        exit;*/

        if (is_file($file.".php")) 
        {
            include_once $file.".php";
        } else 
        {
            include "404.php";
        }        
    }
}