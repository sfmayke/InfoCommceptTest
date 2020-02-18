<style>
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {background-color: #f5f5f5;}
</style>

<p>Cadastro de Vendedores</p>
    <form method="post">
        <p>Nome:
            <input type="text" size="40" name="nome"></p>
        <p>Idade:
            <input type="number" name="idade"></p>
        <p>Cidade:
            <input type="text" size="40" name="cidade"></p>
        <p>
            <button type="submit" name='save' value='true'>Cadastrar</Button>
    </form>
<table>
<caption><b>Vendedores</b></caption>
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Cidade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ( $vendedores as $v ) { ?>
        <tr>
            <td><?= $v['vendedor_id']; ?></td>
            <td><?= $v['nome']; ?></td>
            <td><?= $v['idade']; ?> </td>
            <td><?= $v['cidade']; ?> </td>
            <td>
                <form method='post'>
                    <button type='submit' name='delete_id' value='<?= $v['vendedor_id']; ?>'>Deletar</Button>
                </form>
                <form method='post'>
                    <button type='submit' name='editar_id' value='<?= $v['vendedor_id']; ?>'>Editar</Button>
                </form>
             </td>
        </tr>
    <?php } ?>
</table>