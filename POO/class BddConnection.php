<?php
class BddConnection
{
    private $type = "mysql";
    private $host = "localhost";
    private $dbname = "projet4";
    private $username = "root";
    private $password = '';
    private $dbh;

    private function __construct()
    {
        try{
            $this->db = new PDO(
                $this->type.':host='.$this->host.';dbname='.$this->dbname, 
                $this->username, 
                $this->password,
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
          
        }
        catch(PDOException $e){
            echo "<div class='error'>Erreur !: ".$e->getMessage()."</div>";
            die();
        }
    }

