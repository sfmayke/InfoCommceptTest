<?php

require_once('db.php');

class Vendedores_Model extends db{

    public $table_name = "vendedores";

    function __construct(){
        parent::__construct();
    }
    
    function get_all(){
        
        $sql = "SELECT * FROM $this->table_name";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function find($id) {
        
        $sql = "SELECT * FROM $this->table_name WHERE vendedor_id = $id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function save($parametros){

        $sql = "INSERT INTO $this->table_name (nome, idade, cidade) VALUES (:nome, :idade, :cidade)";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(array(
            ':nome' => $parametros['nome'],
            ':idade' => (int)$parametros['idade'],
            ':cidade' => $parametros['cidade']));
    }

    function delete($id){

        $sql = "DELETE FROM $this->table_name WHERE vendedor_id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(array(':id' => $id));
    }

    function update(){

    }
}

