<?php include("vacinaController.php")?>
<?php include("consultaController.php")?>
<?php include("petController.php")?>
<?php include("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/vacina.js"></script>
    <title>Informações da vacina</title>
</head>
<body>
    <div class="testee">
        <div class="bodyInfo">
            <div class="form">
                <div class="formHeader">
                    <h1>Dados</h1>
                    <a href="javascript:habilitarInputs()">Habilitar edição</a>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Id</label>
                    </div>
                    <input type="text" placeholder="Id" id="idvacina" disabled value="<?php echo listarVacina($_GET['id'])['idvacina']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Tipo da vacina</label>
                    </div>
                    <input type="text" placeholder="Tipo da vacina" id="nome" class="clear" disabled value="<?php echo listarVacina($_GET['id'])['nome']?>">
                </div>
                <div class="row">
                    <div class="label">
                         <label for="">Veterinário</label>
                    </div>
                    <label class="custom-select select-info">
                        <select name="veterinario" id="idveterinario" class="clear" disabled>
                            <option value="">Selecione o veterinário</option>
                            <?php listarVeterinariosOptionsFromVacina($_GET['id']);?>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                         <label for="">Pet</label>
                    </div>
                    <label class="custom-select select-info">
                        <select name="idanimal" class="clear" id="idanimal" disabled>
                            <option value="">Selecione o pet</option>
                            <?php listarPetsOptions($_GET['id']); ?>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data da aplicação</label>
                    </div>
                    <input type="date" id="data" class="clear" disabled value="<?php echo listarVacina($_GET['id'])['data']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data de registro</label>
                    </div>
                    <input type="text" placeholder="Data" id="dataregistro" disabled  value="<?php echo listarVacina($_GET['id'])['data_registro']?>">
                </div>
                <div class="row">
                    <button class="btnSalvar shadow" id="update">Salvar</button>
                    <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                    <button class="btnSalvar btnLimpar shadow" id="delete">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>