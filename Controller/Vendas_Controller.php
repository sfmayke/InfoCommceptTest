<?php

require_once('../Model/Vendas_Model.php');
require_once('../Model/Produtos_Model.php');
require_once('../Model/Vendedores_Model.php');
require_once('../Utilitarios/FuncoesComuns.php');

$vendas_model = new Vendas_Model();
$produtos_model = new Produtos_Model();
$vendedores_model = new Vendedores_Model();

if (!empty($_GET['produto_search'])){
    $vendas = $vendas_model->find_all($_GET['produto_search']);
}else{
    $vendas = $vendas_model->all();
}

if (!empty($_POST)) {

    if (isset($_POST['save'])) {

        $vendas_model->save($_POST);
        session_start();
        $_SESSION['save_mensagem'] = 'Dados salvos com Sucesso!';

        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['editar_id'])){

        $venda = $vendas_model->find_one((int)$_POST['editar_id']);
        $getString = http_build_query($venda);

        $vendedores_ids = $vendedores_model->find_id_vendedores();
        $produtos_ids = $produtos_model->find_id_produtos();
        
        session_start();
        $_SESSION['vendedores_ids'] = $vendedores_ids;
        $_SESSION['produtos_ids'] = $produtos_ids;

        redirecionar("../View/Vendas/Update.php?$getString");
    }
    else if(isset($_POST['update'])){
        
        $_POST['data'] = strtotime($_POST['data']);        
        $vendas_model->update($_POST);

        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['delete_id'])){
        
        $vendas_model->delete((int)$_POST['delete_id']);
        session_start();
        $_SESSION['delete_mensagem'] = 'Dados apagados com Sucesso!';

        redirecionar($_SERVER['PHP_SELF']);
    }
}

require_once('../View/Vendas/Index.php');
