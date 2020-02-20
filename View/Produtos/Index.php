<style style="text/css">
    .hoverTable th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .hoverTable tr:hover {
        background-color: #f5f5f5;
    }
    
</style>
<?php session_start();
    if (isset($_SESSION['delete_mensagem'])) {
        echo "<p style='color: green'><b>".$_SESSION['delete_mensagem']."</b></p>";
        unset($_SESSION['delete_mensagem']);
    }elseif(isset($_SESSION['save_mensagem'])){
        echo "<p style='color: green'><b>".$_SESSION['save_mensagem']."</b></p>";
        unset($_SESSION['save_mensagem']);
    }
?>
<table>
<tr>
        <td>
            <p style="text-align: left">
                <a href="Vendedores_Controller.php">Cadastro de Vendedores</a>
            </p>
        </td>
        <td>
            <p style="text-align: right">
                <a href="Vendas_Controller.php">Cadastro de Vendas</a>
            </p>
        </td>
    </tr>
    <tr>
    <tr>
        <td>
        <p style="text-align: center"><b>CADASTRO DE PRODUTOS</b></p>
            <form method="post">
                <p>Nome:
                    <input type="text" size="40" name="nome"></p>
                <p>Descricao:
                    <input type="text" size="40" name="descricao"></p>
                <p>
                    <button type="submit" name='save' value='true'>Cadastrar</Button>
            </form>
            <br/>
            <br/>
        <form  style="text-align: center">
            <span><b>BUSCAR PRODUTO:</b></span>
            <br/>
            <br/>
            <input type="text" name='produto_search'></input><button onclick="search();" >Buscar</button>
        </form>
        </td>
        <td>
        <div style="overflow-y:scroll; height: 30em; width: 30em">
        <table class="hoverTable">
        <caption style="text-align: center"><b>PRODUTOS</b></caption>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            <?php foreach ( $produtos as $v ) { ?>
                <tr>
                    <td><?= $v['produto_id']; ?></td>
                    <td><?= $v['nome']; ?></td>
                    <td><?= $v['descricao']; ?> </td>
                    <td>
                        <form method='post'>
                            <button type='submit' name='delete_id' value='<?= $v['produto_id']; ?>'>Deletar</Button>
                        </form>
                        <form method='post'>
                            <button type='submit' name='editar_id' value='<?= $v['produto_id']; ?>'>Editar</Button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>
        </td>
    </tr>
</table>
<script><?php require_once('../Js/Search.js'); ?></script>