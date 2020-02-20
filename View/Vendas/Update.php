<p>Alterar dados da Venda</p>
<?php session_start(); ?>

    <form method="post" action="../../Controller/Vendas_Controller.php">
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
            <button type="submit" name='update' value='true'>Alterar</Button>
    </form>