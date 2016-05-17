<?php

spl_autoload_register(function($class)
{
    $dirs = array(
        'Database/',
        'Settings/',
        'VRP/',
    );
    foreach ($dirs as $dir) {
        if (file_exists($dir.$class.'.php')) {
            require($dir.$class.'.php');
            return;
        }
    }
});
