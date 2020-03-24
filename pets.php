<?php include("header.php")?>
<?php include("petController.php")?>
<script src="public/js/pet.js"></script>
<div class="testee">
    <div class="body">
        <div class="cabecalho">
            <h1>Pets cadastrados</h1>
            <div class="search">
                <input type="text" placeholder="Pesquisar" id="filtro" class="shadow filtro">
            </div>
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
</div>
