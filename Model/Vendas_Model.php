<?php

require_once('db.php');

class Vendas_Model extends db {

    public $table_name = "vendas";

    function __construct(){
        parent::__construct();
    }
    
    function all(){
        
        $sql = "SELECT venda_id, v.nome as vnome, p.nome as pnome, data FROM $this->table_name JOIN vendedores v JOIN produtos p 
                ON vendas.produto_id = p.produto_id 
                and vendas.vendedor_id = v.vendedor_id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_all($nome) {
        
        $sql = "SELECT venda_id, v.nome, p.nome, data FROM $this->table_name JOIN vendedores v JOIN produtos p 
                ON vendas.produto_id = p.produto_id 
                AND vendas.vendedor_id = v.vendedor_id 
                WHERE v.nome like '%:nome%' 
                OR p.nome like '%:nome%'";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':nome' => $nome));
        
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_one($id) {
        
        $sql = "SELECT venda_id, v.nome as vnome, p.nome as pnome, data FROM $this->table_name JOIN vendedores v JOIN produtos p 
        ON vendas.produto_id = p.produto_id 
        AND vendas.vendedor_id = v.vendedor_id 
        WHERE venda_id = :id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':id' => $id));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_id_vendedor($nome) {
        
        $sql = "SELECT v.vendedor_id FROM $this->table_name JOIN vendedores v JOIN produtos p 
        ON vendas.produto_id = p.produto_id 
        AND vendas.vendedor_id = v.vendedor_id 
        WHERE v.nome = :nome";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':nome' => $nome));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_id_produto($nome) {
        var_dump($nome);exit;
        $sql = "SELECT p.produto_id FROM $this->table_name JOIN produtos p 
        ON vendas.produto_id = p.produto_id 
        WHERE p.nome = :nome";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':nome' => $nome));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_by_nome($nome) {
        
        $sql = "SELECT v.nome, p.nome, data FROM $this->table_name JOIN vendedores v JOIN produtos p 
                ON vendas.produto_id = p.produto_id 
                AND vendas.vendedor_id = v.vendedor_id
                WHERE v.nome = :nome";
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array([
            ':nome' => $nome]));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_by_produto($produto) {
        
        $sql = "SELECT v.nome, p.nome, data FROM $this->table_name JOIN vendedores v JOIN produtos p 
                ON vendas.produto_id = p.produto_id 
                AND vendas.vendedor_id = v.vendedor_id
                WHERE p.nome = :produto";
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array([
            ':produto' => $produto]));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function find_by_data($data) {
        
        $sql = "SELECT v.nome, p.nome, data FROM $this->table_name JOIN vendedores v JOIN produtos p 
                ON vendas.produto_id = p.produto_id 
                AND vendas.vendedor_id = v.vendedor_id
                WHERE data = :data";
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array([
            ':data' => $data]));

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function save($parametros){

        $sql = "INSERT INTO $this->table_name (produto_id, vendedor_id, data) VALUES (:p_id, :v_id, :data)";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute(array(
            ':p_id' => $parametros['produto'],
            ':v_id' => $parametros['vendedor'],
            ':data' => $parametros['data']));
    }

    function update($parametros){

        $sql = "UPDATE $this->table_name 
                SET produto_id = :p_id, vendedor_id = :v_id , data = :data
                WHERE venda_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            ':id' => $parametros['venda_id'],
            ':p_id' => $parametros['produto'],
            ':v_id' => $parametros['vendedor'],
            ':data' => $parametros['data']));
    }

    function delete($id){
        
        $sql = "DELETE FROM $this->table_name WHERE venda_id = :id";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute(array(':id' => $id));
    }
}

