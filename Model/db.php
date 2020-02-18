<?php

class Db {

    protected $conn;

    function __construct(){
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=info commcept",'root','');
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }  
    }
}


