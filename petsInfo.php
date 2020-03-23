<?php include("header.php")?>
<?php include("petController.php")?>
<?php include("consultaController.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/pet.js"></script>
    <title>teste</title>
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
                    <input type="text" placeholder="Id" id="idpet" disabled value="<?php echo listarPet($_GET['id'])['idanimal'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Nome</label>
                    </div>
                    <input type="text" placeholder="Nome" id="nome" disabled value="<?php echo listarPet($_GET['id'])['nome'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Dono</label>
                    </div>
                    <label class="custom-select select-info">
                        <select id="idcliente" disabled>
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
                        <select id="tipo" disabled value="<?php echo listarPet($_GET['id'])['idtipo'] ?>">
                            <option value="">Selecione...</option>
                            <option value="1" <?php if(listarPet($_GET['id'])['idtipo']==1){echo "selected";}?>>Cão</option>
                            <option value="2" <?php if(listarPet($_GET['id'])['idtipo']==2){echo "selected";}?>>Gato</option>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Raça</label>
                    </div>
                    <input type="text" placeholder="Raça" id="raca" disabled value="<?php echo listarPet($_GET['id'])['raca'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Nascimento</label>
                    </div>
                    <input type="date" placeholder="Data de nascimento" id="nascimento" disabled value="<?php echo listarPet($_GET['id'])['nascimento'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Descrição</label>
                    </div>
                    <input type="text" placeholder="Descrição" id="descricao" disabled value="<?php echo listarPet($_GET['id'])['descricao'] ?>">
                </div>
                <div class="row">
                    <button class="btnSalvar shadow" id="updatePet">Salvar</button>
                    <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                </div>
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