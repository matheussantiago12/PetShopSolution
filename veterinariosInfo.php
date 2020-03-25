<?php include("header.php") ?>
<?php include("veterinarioController.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/veterinario.js"></script>
    <title>Informações do veterinário</title>
</head>
<body>
    <div class="testee">
        <div class="bodyInfo">
            <div class="form">
                <div class="formHeader">
                    <h1>Dados</h1>
                    <a href="javascript:habilitarInputs()">Habilitar edição</a>
                </div>
                <div class="form-validation" style="display: none">
                    <span style="color: red">Preencha todos os campos corretamente.</span>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Id</label>
                    </div>
                    <input type="text" placeholder="Nome" id="idveterinario" disabled value="<?php echo listarVeterinario($_GET['id'])['idveterinario']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Nome</label>
                    </div>
                    <input type="text" placeholder="Nome" id="nome" class="clear" disabled value="<?php echo listarVeterinario($_GET['id'])['nome']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Sobrenome</label>
                    </div>
                    <input type="text" placeholder="Sobrenome" id="sobrenome" class="clear" disabled value="<?php echo listarVeterinario($_GET['id'])['sobrenome']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">CPF</label>
                    </div>
                    <input type="text" placeholder="CPF" id="cpf" class="clear" disabled value="<?php echo listarVeterinario($_GET['id'])['cpf']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Email</label>
                    </div>
                    <input type="text" placeholder="Email" id="email" class="clear" disabled  value="<?php echo listarVeterinario($_GET['id'])['email']?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data de cadastro</label>
                    </div>
                    <input type="date" placeholder="Data de cadastro" id="data" disabled value="<?php echo listarVeterinario($_GET['id'])['data_registro']?>">
                </div>
                <div class="row">
                    <button class="btnSalvar shadow" id="update">Salvar</button>
                    <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>