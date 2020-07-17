<?php 
    session_start();

    require('../router.php');
    $router = new router();
    $router->run();
 ?>
