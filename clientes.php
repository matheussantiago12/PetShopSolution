<?php include("header.php")?>
<?php require_once("clienteController.php")?>
<script src="public/js/cliente.js"></script>
<div class="testee">
    <div class="body">
        <div class="cabecalho">
            <h1>Clientes cadastrados</h1>
            <div class="search">
                <input type="text" id="filtro" placeholder="Pesquisar" class="shadow">
                <button class="shadow" onclick="mostrarRegistro();">Cadastrar</button>
            </div>
        </div>
        <div class="cabecalhoRegistro shadow" id="registro">
            <input type="text" placeholder="Nome" name="nome" id="nome">
            <input type="text" placeholder="Sobrenome" name="sobrenome" id="sobrenome">
            <input type="text" placeholder="CPF" name="cpf" id="cpf">
            <input type="text" placeholder="Telefone" name="telefone" id="telefone">
            <input type="text" placeholder="Endereço" name="endereco" id="endereco">
            <button class="btnCadastro" name="submit" value="click"  id="createButton">Salvar</button>
            <button class="btnCadastro cancelar" onclick="esconderRegistro();">Cancelar</button>
        </div>
        <table cellspacing="0" class="shadow" id="tabela">
            <thead class="shadow">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php listarClientes(); ?>
            </tbody>
        </table>

        <div id="modalExcluir" class="modal">
            <h1>Excluir cliente</h1>
            <p>Você tem certeza que deseja excluir o registro que possui o ID <span>0</span>?</p>
            <button class="btnCadastro">Confirmar</button>
            <button class="btnCadastro cancelar">Cancelar</button>
        </div>

        <a href="#modalExcluir" rel="modal:open"></a>

    </div>
</div>

