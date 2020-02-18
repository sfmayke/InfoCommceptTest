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
            <input type="submit" value="Cadastrar"/>
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
            <td><?= $v['cidade']; ?> </td>
            <td>
                <form name='formDelete' method='post'>
                    <button type='submit' name='delete' value='<?= $v['vendedor_id']; ?>'>Deletar</Button>
                </form>
             </td>
        </tr>
    <?php } ?>
</table>