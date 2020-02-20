<?php

require_once('db.php');

class Vendedores_Model extends db{

    public $table_name = "vendedores";

    function __construct(){
        parent::__construct();
    }
    
    function all(){
        
        $sql = "SELECT * FROM $this->table_name";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_one($id) {
        
        $sql = "SELECT * FROM $this->table_name WHERE vendedor_id = $id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_all($nome) {
        
        $sql = "SELECT * FROM $this->table_name WHERE nome LIKE '%$nome%'";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_id_vendedores() {
        
        $sql = "SELECT vendedor_id, nome FROM $this->table_name";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    function update($parametros){
        
        $sql = "UPDATE $this->table_name 
                SET nome = :nome, idade = :idade, cidade = :cidade 
                WHERE vendedor_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            ':nome' => $parametros['nome'],
            ':idade' => (int)$parametros['idade'],
            ':cidade' => $parametros['cidade'],
            ':id' => $parametros['vendedor_id']));
    }

    function delete($id){

        $sql = "DELETE FROM $this->table_name WHERE vendedor_id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(array(':id' => $id));
    }
}

