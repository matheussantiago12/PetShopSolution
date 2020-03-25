<?php include("header.php")?>
<?php include("petController.php")?>
<?php include("consultaController.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/pet.js"></script>
    <script src="public/js/vacina.js"></script>
    <title>Informações do pet</title>
</head>
<body>
    <div class="testee">  
        <div class="bodyInfo">
            <div class="form">
                <div class="formHeader">
                    <h1>Dados</h1>
                    <a href="javascript:habilitarInputs()">Habilitar edição</a>
                </div>
                <div class="form-validation-pet" style="display: none">
                    <span style="color: red">Preencha todos os campos corretamente.</span>
                </div>
                <form onsubmit="return false" enctype="multipart/form-data">
                    <div class="row">
                        <div class="label">
                            <label for="">Id</label>
                        </div>
                        <input type="text" placeholder="Id" id="idpet" disabled value="<?php echo listarPet($_GET['id'])['idanimal'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Foto do pet</label>
                        </div>
                        <input type="file" id="foto" name="foto" placeholder="Foto" class="clear" disabled>
                    </div>
                    <div class="row" style="text-align: center;">
                        <img src="uploads/<?php echo listarPet($_GET['id'])['foto'] ?>" title="<?php echo listarPet($_GET['id'])['nome'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Nome</label>
                        </div>
                        <input type="text" placeholder="Nome" class="clear" id="nomePet" disabled value="<?php echo listarPet($_GET['id'])['nome'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Dono</label>
                        </div>
                        <label class="custom-select select-info">
                            <select id="idcliente" class="clear" disabled>
                                <option value="">Selecione...</option>
                                <?php listarClienteOptions($_GET['id']); ?>
                            </select>
                        </label>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Animal</label>
                        </div>
                        <label class="custom-select select-info">
                            <select id="tipo" class="clear" disabled value="<?php echo listarPet($_GET['id'])['idtipo'] ?>">
                                <option value="1" <?php if(listarPet($_GET['id'])['idtipo']==1){echo "selected";}?>>Cão</option>
                                <option value="2" <?php if(listarPet($_GET['id'])['idtipo']==2){echo "selected";}?>>Gato</option>
                            </select>
                        </label>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Raça</label>
                        </div>
                        <input type="text" class="clear" placeholder="Raça" id="raca" disabled value="<?php echo listarPet($_GET['id'])['raca'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Nascimento</label>
                        </div>
                        <input type="date" class="clear" placeholder="Data de nascimento" id="dataPet" disabled value="<?php echo listarPet($_GET['id'])['nascimento'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Descrição (opcional)</label>
                        </div>
                        <input type="text" class="clear" placeholder="Descrição (opcional)" id="descricao" disabled value="<?php echo listarPet($_GET['id'])['descricao'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Data de registro</label>
                        </div>
                        <input type="text" placeholder="Data de registro" disabled value="<?php echo listarPet($_GET['id'])['data_registro'] ?>">
                    </div>
                    <div class="row">
                        <button class="btnSalvar shadow" id="updatePet">Salvar</button>
                        <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                        <button class="btnSalvar btnLimpar shadow" value="<?php echo listarPet($_GET['id'])['idanimal'] ?>" id="excluirPet">Excluir</button>
                    </div>
                </form>
            </div>
            <div class="otherInfos">
                <h1>Vacinas</h1>
                <?php listarPetVacinas($_GET['id'])?>
            </div>
        </div>
        <div class="bodyInfo">
            <div class="form">
                <div class="formHeader">
                    <h1>Cadastrar vacina</h1>
                </div>
                <div class="form-validation-vacina" style="display: none">
                    <span style="color: red">Preencha todos os campos corretamente.</span>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Tipo da vacina</label>
                    </div>
                    <input type="text" placeholder="Tipo da vacina" id="tipovacina">
                </div>
                <div class="row">
                    <div class="label">
                         <label for="">Veterinário</label>
                    </div>
                    <label class="custom-select select-info">
                        <select name="veterinario" id="veterinario">
                            <option value="">Selecione o veterinário</option>
                            <?php listarVeterinariosConsulta(); ?>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data</label>
                    </div>
                    <input type="date" name="data" id="data">
                </div>
                <div class="row">
                    <button class="btnSalvar shadow" id="createVacina">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>