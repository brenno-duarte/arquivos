<?php

//namespace Source;

class Router {

    private $routes = [];

    public function route($action, Closure $callback) {
        //global $routes;
        $action = trim($action, '/');
        $this->routes[$action] = $callback;
    }

    public function dispatch($action) {
        //global $routes;
        $action = trim($action, '/');
        $callback = $this->routes[$action];
    }
} 