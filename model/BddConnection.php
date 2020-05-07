<?php
class BddConnection
{
   
    protected function dbConnect() {
        
        
        $bdd = new \PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
        $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $bdd;

    }
}
