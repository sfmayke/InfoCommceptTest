<?php

require_once('db.php');

class Vendedores_Model {

    public $table_name = "vendedores";

    function get_all(){
        
        $sql = "SELECT * FROM $this->table_name";

        $stmt = $this->db->prepare($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}

