<?php

namespace Analytics\Resources;

class Cookie {
    
    public static function new($index, $cookie, $time, $path) 
    {
        setcookie($index, $cookie, $time, $path);
        return true;
    }
    
    public static function delete($index) 
    {
        setcookie($index, NULL, -1);
        return true;
    }
    
    public static function show($index) 
    {
        if (isset($_COOKIE[$index])) {
            return $_COOKIE[$index];
        }
    }
    
}
