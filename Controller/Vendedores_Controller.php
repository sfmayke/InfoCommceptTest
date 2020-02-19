<?php

require_once('../Model/Vendedores_Model.php');
require_once('../Utilitarios/FuncoesComuns.php');

$vendedores_model = new Vendedores_Model();

if (!empty($_GET['vendedor_search'])){
    $vendedores = $vendedores_model->find_all($_GET['vendedor_search']);
}else{
    $vendedores = $vendedores_model->all();
}

if (!empty($_POST)) {

    if (isset($_POST['save'])) {

        $vendedores_model->save($_POST);
        session_start();
        $_SESSION['save_mensagem'] = 'Dados salvos com Sucesso!';
        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['editar_id'])){

        $vendedor = $vendedores_model->find_one((int)$_POST['editar_id']);
        $getString = http_build_query($vendedor);
        redirecionar("../View/Vendedores/Update.php?$getString");
    }
    else if(isset($_POST['update'])){

        $vendedores_model->update($_POST);
        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['delete_id'])){

        $vendedores_model->delete((int)$_POST['delete_id']);
        session_start();
        $_SESSION['delete_mensagem'] = 'Dados apagados com Sucesso!';

        redirecionar($_SERVER['PHP_SELF']);
    }
}

require_once('../View/Vendedores/Index.php');
