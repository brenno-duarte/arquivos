<?php

//namespace Source;

class Router
{
    private $namespace;
    private $uri = [];
    private $method;
    private $function;
    
    public function __construct(string $namespace) 
    {
        $this->namespace = $namespace;
    }
    
    public function add(string $uri, $method = false, string $function = null)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->function = $function;
    }
    
    public function run() 
    {
        $uriGet = isset($_GET['url']) ? $_GET['url'] : "/";
        
        #echo '<pre>';
        #var_dump($this->uri);
        #var_dump($this->method);
        #echo '</pre>';
        
        #foreach ($this->uri as $key => $value) {
            #if (preg_match("~^$value$~", $uriGet)) {
                #$this->uri = $uriGet;
                $uri = $this->uri;
                $controller = $this->method;
                $methodClass = $this->function;
                
                #var_dump($uriGet);
                
                #echo '<pre>';
                #$controller = $uri[$key];
                #call_user_func($uri);
                #var_dump($this->uri);
                #var_dump($controller);

                /*if (is_callable($controller)) {
                    call_user_func($controller);
                    return true;
                } else {
                    echo 'not callback';
                    return false;
                }*/
                
                
                $file = __DIR__.'/App/Controllers/'.$controller.'.php';
                
                if (is_file($file)) {

                    require_once $file;

                    if (class_exists($controller)) {
                        $controller = new $controller();
                        
                        if (method_exists($controller, $methodClass)) {
                            $controller->$methodClass();
                            return true;
                        } else {
                            echo 'Method not exist';
                            return false;
                        }

                    } else {
                        echo 'Class not exist';
                        return false;
                    }

                } else {
                    echo 'Is not file';
                    return false;
                }
            #}
        #}
        
        //return $this->execute();
    }
    
    public function execute() 
    {
        
        /*$controller = $this->method;
        $methodClass = $this->function;
        
        $file = __DIR__.'/App/Controllers/'.$controller.'.php';
        
        if (is_file($file)) {
            
            require_once $file;
            
            if (class_exists($controller)) {
                $newController = new $controller();

                if (method_exists($newController, $methodClass)) {
                    $newController->$methodClass();
                    return true;
                } else {
                    echo 'Method not exist';
                    return false;
                }
                
            } else {
                echo 'Class not exist';
                return false;
            }
            
        } else {
            echo 'Is not file';
            return false;
        }*/
    }
}
