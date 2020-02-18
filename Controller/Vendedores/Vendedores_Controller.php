<?php

require_once('../../Model/Vendedores_Model.php');
require_once('../../Utilitarios/FuncoesComuns.php');

$vendedores_model = new Vendedores_Model();

$vendedores = $vendedores_model->get_all();

if (!empty($_POST)) {
    
    if (isset($_POST['save'])) {

        $vendedores_model->save($_POST);
        redirecionar($_SERVER['PHP_SELF']);
    }
    else if (isset($_POST['editar_id'])){

        $vendedor = $vendedores_model->find((int)$_POST['editar_id']);
        $getString = http_build_query($vendedor);

        redirecionar("../../View/Vendedores/Update.php?$getString");
    }
    else if (isset($_POST['delete_id'])){

        $vendedores_model->delete((int)$_POST['delete_id']);
        redirecionar($_SERVER['PHP_SELF']);
    } 
}



require_once('../../View/Vendedores/Index.php');
