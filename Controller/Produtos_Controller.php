<?php

require_once('../Model/Produtos_Model.php');
require_once('../Utilitarios/FuncoesComuns.php');

$produtos_model = new Produtos_Model();

if (!empty($_GET['produto_search'])){
    $produtos = $produtos_model->find_all($_GET['produto_search']);
}else{
    $produtos = $produtos_model->all();
}

if (!empty($_POST)) {

    if (isset($_POST['save'])) {

        $produtos_model->save($_POST);
        session_start();
        $_SESSION['save_mensagem'] = 'Dados salvos com Sucesso!';
        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['editar_id'])){

        $produto = $produtos_model->find_one((int)$_POST['editar_id']);
        $getString = http_build_query($produto);

        redirecionar("../View/Produtos/Update.php?$getString");
    }
    else if(isset($_POST['update'])){

        $produtos_model->update($_POST);
        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['delete_id'])){

        $produtos_model->delete((int)$_POST['delete_id']);
        session_start();
        $_SESSION['delete_mensagem'] = 'Dados apagados com Sucesso!';

        redirecionar($_SERVER['PHP_SELF']);
    }
}

require_once('../View/Produtos/Index.php');
