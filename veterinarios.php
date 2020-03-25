<?php include("header.php")?>
<?php include("veterinarioController.php")?>
<head>
    <script src="public/js/veterinario.js"></script>
    <title>Veterinários</title>
</head>
<div class="testee">
    <div class="body">
        <div class="cabecalho">
            <h1>Veterinários cadastrados</h1>
            <div class="search">
                <input type="text" id="filtro" placeholder="Pesquisar" class="shadow filtro">
                <button class="shadow" onclick="mostrarRegistro();">Cadastrar</button>
            </div>
        </div>
        <div class="form-validation" style="display: none">
            <span style="color: red">Preencha todos os campos corretamente.</span>
        </div>
        <div class="cabecalhoRegistro shadow" id="registro">
            <input type="text" placeholder="Nome" name="nome" id="nome">
            <input type="text" placeholder="Sobrenome" name="sobrenome" id="sobrenome">
            <input type="text" placeholder="CPF" name="cpf" id="cpf">
            <input type="email" placeholder="Email" name="email" id="email">
            <button class="btnCadastro" name="submit" value="click"  id="createButton">Salvar</button>
            <button class="btnCadastro cancelar" onclick="esconderRegistro();">Cancelar</button>
        </div>
        <table cellspacing="0" class="shadow">
            <thead class="shadow">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Data de cadastro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php listarVeterinarios() ?>
            </tbody>
        </table>
    </div>
</div>
    
    