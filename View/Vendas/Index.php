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
<?php 
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
                <a href="Produtos_Controller.php">Cadastro de Produtos</a>
            </p>
        </td>
    </tr>
    <tr>
        <td>
        
        <p style="text-align: center"><b>CADASTRO DE VENDAS</b></p>
                <form method="post">
                <input type="number" name="venda_id" hidden value="<?= $_GET['venda_id'] ?>"></p>
                <p>Vendedor:
                <select name="vendedor">
                    <?php foreach ($_SESSION['vendedores_ids'] as $vendedor) { ?>
                        <option value="<?= $vendedor['vendedor_id'] ?>"><?= $vendedor['nome'] ?></option>
                    <?php } ?>
                </select>
                    <!-- <input type="text" size="40" name="vendedor" value="<?= $_GET['vnome'] ?>"></p> -->
                <p>Produto:
                    <select name="produto">
                    <?php foreach ($_SESSION['produtos_ids'] as $produto) { ?>
                        <option value="<?= $produto['produto_id'] ?>"><?= $produto['nome'] ?></option>
                    <?php } ?>
                    </select>
                    <!-- <input type="text" size="40" name="produto" value="<?= $_GET['pnome'] ?>"></p> -->
                <p>Data:
                    <input type="date" name="data" value="<?= date('Y-m-d', (int)$_GET['data']); ?>"></p>
                <p>
                    <button type="submit" name='save' value='true'>Adicionar Venda</Button>
            </form>
            <br/>
            <br/>
        <form  style="text-align: center">
            <span><b>BUSCAR VENDA:</b></span>
            <br/>
            <br/>
            <input type="text" name='produto_search'></input><button onclick="search();" >Buscar</button>
        </form>
        </td>
        <td>
        <div style="overflow-y:scroll; height: 30em; width: 30em">
        <table class="hoverTable">
        <caption style="text-align: center"><b>VENDAS REALIZADAS</b></caption>
            <tr>
                <th>Vendedor</th>
                <th>Produto</th>
                <th>Data da Venda</th>
            </tr>
            <?php foreach ( $vendas as $v ) { ?>
                <tr>
                    <td><?= $v['vnome']; ?></td>
                    <td><?= $v['pnome']; ?> </td>
                    <td><?= date('d/m/Y', (int)$v['data']); ?> </td>
                    <td>
                        <form method='post'>
                            <button type='submit' name='delete_id' value='<?= $v['venda_id']; ?>'>Deletar</Button>
                        </form>
                        <form method='post'>
                            <button type='submit' name='editar_id' value='<?= $v['venda_id']; ?>'>Editar</Button>
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