<?php
class BddConnection
{
    private static $instance;
    private $type = "mysql";
    private $host = "localhost";
    private $dbname = "projet4";
    private $username = "root";
    private $password = '';
    private $dbh;

    private function __construct()
    {
        try{
            $this->dbh = new PDO(
                $this->type.':host='.$this->host.';dbname='.$this->dbname, 
                $this->username, 
                $this->password,
            );
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            $this->dbh->exec("set names 'utf8';");
          
        }
        catch(PDOException $e){
            echo "<div class='error'>Erreur !: ".$e->getMessage()."</div>";
            die();
        }
    }

