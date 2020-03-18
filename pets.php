<?php include("header.php")?>
<?php include("petController.php")?>
<script src="public/js/pet.js"></script>
    <div class="body">
        <div class="cabecalho">
            <h1>Pets cadastrados</h1>
            <div class="search">
                <input type="text" placeholder="Pesquisar" id="filtro" class="shadow">
                <button class="shadow" onclick="mostrarRegistro();">Cadastrar</button>
            </div>
        </div>
        <div class="cabecalhoRegistro shadow" id="registro">
            <input type="text" placeholder="Nome" name="nome" id="nome">
            <label class="custom-select">
                <select name="tipo" id="tipo">
                    <option value="1">Cão</option>
                    <option value="2">Gato</option>
                </select>
            </label>
            <input type="text" placeholder="Raça" name="raca" id="raca">
            <input type="date" placeholder="Data de nascimento" name="data" id="data">
            <input type="text" placeholder="Dono" name="idcliente" id="cliente">
            <input type="text" placeholder="Descrição" name="descricao" id="descricao">
            <button class="btnCadastro" name="submit" value="click" id="createPet">Salvar</button>
            <button class="btnCadastro cancelar" onclick="esconderRegistro();">Cancelar</button>
        </div>
        <table cellspacing="0" class="shadow" id="tabela">
            <thead class="shadow">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Raça</th>
                    <th>Nascimento</th>
                    <th>Dono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php listarPets(); ?>
            </tbody>
        </table>
    </div>

