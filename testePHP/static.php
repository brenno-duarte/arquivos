<?php
echo '<pre>';

class Estatica
{
    public static $param;

    public static function metodo($param)
    {
        self::$param[] = $param;
        return self::$param;
        
    }

    public static function return()
    {
        var_dump(self::$param);
    }
}

Estatica::metodo('teste');
Estatica::metodo('teste2');
Estatica::return();