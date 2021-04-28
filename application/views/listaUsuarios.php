<h2>Lista de Usuários</h2>
<table border="1" style="min-width: 500px;">
    <thead>
        <tr>
            <td>Código</td>
            <td>E-mail</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $u) { ?>
            <tr>
                <td><?= $u->id; ?></td>
                <td><?= $u->email; ?></td>
                <td></td>
            </tr>
        <?php } ?>
    </tbody>
</table>