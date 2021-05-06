<?php error_reporting(0); ?>
<h2>Cadastro de Usuários</h2>
<div class="message">
    <?php
        if($this->session->flashdata('message')) {
            echo "<h4 style='color: orange;'>" . $this->session->flashdata('message') . "</h4>";
        }
    ?>
</div>
<form action="<?= $url . ((isset($usuario)) ? 'usuario/alterar/' . $usuario->id : 'usuario/cadastrar'); ?>" method="post" name="cadastro-usuario">
    <label for="email">E-mail:</label>
    <input type="text" name="email" id="email" value="<?= $usuario->email; ?>">
    <br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" value="">

    <br><br>
    <button type="submit">Salvar</button>
</form>