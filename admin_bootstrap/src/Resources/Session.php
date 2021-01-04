<?php

namespace Analytics\Resources;

class Session 
{
    
    public static function new($index, $session) 
    {
        $_SESSION[$index] = $session;
        return $_SESSION[$index];
    }
    
    public static function delete($index) 
    {
        unset($_SESSION[$index]);
        return true;
    }
    
    public static function show($index) 
    {
        if (isset($_SESSION[$index])) {
            return $_SESSION[$index];
        }
    }

    public static function has($index) 
    {
        if (isset($_SESSION[$index])) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function destroyAll() 
    {
        session_destroy();
        return true;
    }
}
