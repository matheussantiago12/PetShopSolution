<?php include("header.php") ?>
<?php include("clienteController.php")?>
<?php include("petController.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="public/js/cliente.js"></script>
        <title>teste</title>
    </head>
    <body>
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
                        <input type="text" placeholder="Id" name="idcliente" id="idcliente" disabled value="<?php echo listarCliente($_GET['id'])['idcliente'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Nome</label>
                        </div>
                        <input type="text" placeholder="Nome" name="nome" id="nome" disabled value="<?php echo listarCliente($_GET['id'])['nome'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Sobrenome</label>
                        </div>
                        <input type="text" placeholder="Sobrenome" name="sobrenome" id="sobrenome" disabled value="<?php echo listarCliente($_GET['id'])['sobrenome'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">CPF</label>
                        </div>
                        <input type="text" placeholder="CPF" name="cpf" id="cpf" disabled value="<?php echo listarCliente($_GET['id'])['cpf'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Endereço</label>
                        </div>
                        <input type="text" placeholder="Endereço" name="endereco" id="endereco" disabled value="<?php echo listarCliente($_GET['id'])['endereco'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Telefone</label>
                        </div>
                        <input type="text" placeholder="Telefone" name="telefone" id="telefone" disabled value="<?php echo listarCliente($_GET['id'])['telefone']?>"> 
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Data de cadastro</label>
                        </div>
                        <input type="text" placeholder="Data de cadastro" name="dataregistro" id="dataregistro" disabled value="<?php echo listarCliente($_GET['id'])['data_registro']?>"> 
                    </div>
                    <div class="row">
                        <button class="btnSalvar shadow" name="update" id="update">Salvar</button>
                        <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                    </div>
            </div>
        <div class="otherInfos">
            <h1>Pets</h1>
            <?php listarPetCards($_GET['id']) ?>
            <div class="infoAdd">
                <button><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</body>
</html>