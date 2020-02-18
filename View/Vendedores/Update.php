<?php var_dump($_GET); ?>
<p>Alterar dados do Vendedor</p>
    <form method="post">
        <p>Nome:
            <input type="text" size="40" name="nome" value="<?= $_GET['nome'] ?>"></p>
        <p>Idade:
            <input type="number" name="idade" value="<?= $_GET['idade'] ?>"></p>
        <p>Cidade:
            <input type="text" size="40" name="cidade" value="<?= $_GET['cidade'] ?>"></p>
        <p>
            <button type="submit" name='save' value='true'>Alterar</Button>
    </form>