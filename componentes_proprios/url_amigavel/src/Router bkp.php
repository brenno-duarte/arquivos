<?php

//namespace Source\Router;

class Router
{

    private $debug;
    private $method;
    private $controller = [];
    private $uri = [];

    public function __construct(bool $debug = false)
    {
        $this->debug = $debug;
        //$this->router();
    }

    public function add($uri, $controller = null, $method = null)
    {
        $this->uri[] = '/'. trim($uri, '/');
        $this->method = $method;

        if ($controller != null) {
            $this->controller[] = $controller;
        }
    }

    public function submit()
    {
        $uriGet = isset($_GET['uri']) ? '/'.$_GET['uri'] : '/';

        foreach ($this->uri as $key => $value) {
            
            if (preg_match("#^$value$#", $uriGet)) {
                
                if (is_string($this->controller[$key])) {
                    $urlController = $this->controller[$key];
                    //print_r($urlMethod);
                    //$urlMethod();
                    $controller = dirname(__DIR__).'/src/App/Controllers/'.$urlController;

                    if (is_file($controller.".php")) {
                        require_once $controller.".php";
                        
                        $methodClass = $this->method;

                        $newController = $urlController::$methodClass();

                        return true;
                        //var_dump($newController);
                    } else
                    {
                        echo 'não é um controller';
                    }

                } else {
                    call_user_func($this->method[$key]);
                }
            }  
        }
    }

    // public function router()
    // {
    //     if ($this->debug == true) {
    //         $this->router = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"].$this->uri;
    //     } else {
    //         $this->router = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].$this->uri;
    //     }
    // }
}
