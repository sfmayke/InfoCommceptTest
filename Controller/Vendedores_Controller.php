<?php

require_once('../Model/Vendedores_Model.php');

$vendedores_model = new Vendedores_Model();

$vendedores = $vendedores_model->get_all();
if (!empty($_POST)) {

    if (isset($_POST['delete'])){
        
    }
    
    $vendedores_model->save($_POST);

    /* $e = $_POST['email'];
    $p = $_POST['password'];

    $sql = "SELECT name FROM users
       WHERE email = '$e'
       AND password = '$p'";

    echo "<p>$sql</p>\n";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($row);
    echo "-->\n";
    if ( $row === FALSE ) {
       echo "<h1>Login incorrect.</h1>\n";
    } else {
       echo "<p>Login success.</p>\n";
    } */
}

require_once('../View/Vendedores_View.php');
