<p>Alterar dados do Produto</p>
    <form method="post" action="../../Controller/Produtos_Controller.php">
        <p>Nome:
            <input type="number" name="produto_id" hidden value="<?= $_GET['produto_id'] ?>"></p>
            <input type="text" size="40" name="nome" value="<?= $_GET['nome'] ?>"></p> 
        <p>Descricao:
            <input type="text" size="40" name="descricao" value="<?= $_GET['descricao'] ?>"></p>
        <p>
            <button type="submit" name='update' value='true'>Alterar</Button>
    </form>