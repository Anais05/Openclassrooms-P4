<?php
session_start();

spl_autoload_register(function ($class)
{
    include 'controller/' . $class . '.php' ;
});


// use \projet4\config\Autoloader;

// use \projet4\app\Frontend;
// require 'config/autoloader.php';
// Autoloader::register();
require('controller/Frontend.php');


$frontend = new Frontend();


    if (isset($_GET['action'])) 
    {
        if ($_GET['action'] == 'listChapitre')
        {
            $frontend->listChapitre();
        }
    }

?>