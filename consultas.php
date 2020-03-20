<?php include("header.php")?>
<?php include("consultaController.php")?>
<script src="public/js/consulta.js"></script>
<div class="testee">
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
            </div>
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
</div>
