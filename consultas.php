<?php include("header.php")?>
<?php include("consultaController.php")?>
<head>
    <script src="public/js/consulta.js"></script>
    <title>Consultas</title>
</head>
<div class="testee">
    <div class="body">
        <div class="cabecalho">
            <h1>Consultas cadastradas</h1>
            <div class="search">
                <input type="text" placeholder="Pesquisar" class="shadow filtro">
                <label class="custom-select">
                    <select class="shadow filtro-select">
                        <option value="">Todos</option>
                        <option value="pendente">Pendente</option>
                        <option value="concluiída">Concluída</option>
                        <option value="cancelada">Cancelada</option>
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
