<?php include("header.php")?>
<?php include("consultaController.php")?>
<script src="public/js/consulta.js"></script>
<div class="body">
    <div class="cabecalho">
        <h1>Consultas cadastradas</h1>
        <div class="search">
            <input type="text" placeholder="Pesquisar" class="shadow">
            <label class="custom-select">
                <select class="shadow">
                    <option>Pendente</option>
                    <option>Concluída</option>
                    <option>Cancelada</option>
                </select>
            </label>
            <button class="shadow" onclick="mostrarRegistro();">Cadastrar</button>
        </div>
    </div>
    <div class="cabecalhoRegistro shadow" id="registro">
        <input list="veterinarios" name="veterinario" placeholder="Veterinário" id="veterinario"/>
        <datalist id="veterinarios">
            <?php listarVeterinarios() ?>
        </datalist>
        <input list="clientes" name="cliente" placeholder="Cliente" id="cliente"/>
        <datalist id="clientes">
            <?php listarClientes() ?>
        </datalist>
        <input list="pets" name="pet" placeholder="Pet" id="pet"/>
        <datalist id="pets">
            <?php listarPets() ?>
        </datalist>
        <input type="datetime-local" name="data" id="data">
        <input type="text" placeholder="Observações" name="observacoes" id="observacoes">
        <button class="btnCadastro" name="submit" value="click"  id="createButton">Salvar</button>
        <button class="btnCadastro cancelar" onclick="esconderRegistro();">Cancelar</button>
    </div>
    <table cellspacing="0" class="shadow">
        <thead class="shadow">
            <tr>
                <th>Id</th>
                <th>Veterinário</th>
                <th>Cliente</th>
                <th>Pet</th>
                <th>Data</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php listarConsultas() ?>
        </tbody>
    </table>
</div>

