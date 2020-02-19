<p>Alterar dados do Vendedor</p>
    <form method="post" action="../../Controller/Vendedores_Controller.php">
        <p>Nome:
            <input type="number" name="vendedor_id" hidden value="<?= $_GET['vendedor_id'] ?>"></p>
            <input type="text" size="40" name="nome" value="<?= $_GET['nome'] ?>"></p> 
        <p>Idade:
            <input type="number" name="idade" value="<?= $_GET['idade'] ?>"></p>
        <p>Cidade:
            <input type="text" size="40" name="cidade" value="<?= $_GET['cidade'] ?>"></p>
        <p>
            <button type="submit" name='update' value='true'>Alterar</Button>
    </form>