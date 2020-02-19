<?php

require_once('db.php');

class Produtos_Model extends db {

    public $table_name = "produtos";

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
        
        $sql = "SELECT * FROM $this->table_name WHERE produto_id = $id";
        
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

    function save($parametros){

        $sql = "INSERT INTO $this->table_name (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(array(
            ':nome' => $parametros['nome'],
            ':descricao' => $parametros['descricao']));
    }

    function update($parametros){

        $sql = "UPDATE $this->table_name 
                SET nome = :nome, descricao = :descricao 
                WHERE produto_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            'id' => $parametros['produto_id'],
            ':nome' => $parametros['nome'],
            ':descricao' => $parametros['descricao']));
    }

    function delete($id){

        $sql = "DELETE FROM $this->table_name WHERE produto_id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(array(':id' => $id));
    }
}

