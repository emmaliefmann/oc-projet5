<?php

namespace EmmaLiefmann\recipes\config; 

class Autoloader 
{
    public static function register()
    {
        spl_autoload_register(([__CLASS__, 'autoload']));
    }

    public static function autoload($class)
    {
        $class = str_replace('emmaliefmann\recipes\\', '', $class);
        // replace backslash by slash
        $class = str_replace('\\', '/', $class);
        require './'.$class.'.php';
    }
}