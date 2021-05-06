<h2>Lista de Usuários</h2>
<div class="message">
    <?php
        if($this->session->flashdata('message')) {
            echo "<h4 style='color: green;'>" . $this->session->flashdata('message') . "</h4>";
        }
    ?>
</div>
<a href="<?= $url; ?>usuario/cadastrar">Novo Cadastro</a>
<table border="1" style="min-width: 500px; margin-top: 15px;">
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