<?php

namespace Source\Controllers;
use Source\View\View;

class UserController extends View
{
    public function index()
    {
        $view = new View();
        $view->render("templates/home");
    }

    public function contato()
    {
        $view = new View();
        $view->render("templates/contato");
    }
    
    public function sobre()
    {
        $view = new View();
        $view->render("templates/sobre");
    }
}
