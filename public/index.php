<?php 
    session_start();
?>

<?php
    require('../router.php');
    $router = new router();
    $router->run();
 ?>
