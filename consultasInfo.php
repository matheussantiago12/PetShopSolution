<?php include("header.php") ?>
<?php require_once("consultaController.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Informações da consulta</title>
        <script src="public/js/consulta.js"></script>
    </head>
    <body>
        <div class="testee">
        <div class="bodyInfo">
            <div class="form">
                <div class="formHeader">
                    <h1>Dados</h1>
                    <a href="javascript:habilitarInputs()">Habilitar edição</a>
                </div>
                <div class="form-validation-consulta" style="display: none">
                    <span style="color: red">Preencha todos os campos corretamente.</span>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Id</label>
                    </div>
                    <input type="text" placeholder="Id" id="idconsulta" disabled value="<?php echo listarConsulta($_GET['id'])['idconsulta'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Veterinário</label>
                    </div>
                    <label class="custom-select select-info">
                        <select id="veterinario" class="clear" disabled>
                            <option value="">Selecione o veterinário...</option>
                            <?php listarVeterinariosOptionsFromConsulta($_GET['id']); ?>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Pet</label>
                    </div>
                    <label class="custom-select select-info">
                        <select id="pet" class="clear" disabled>
                            <option value="">Selecione...</option>
                            <?php listarPetsOptionsFromConsulta($_GET['id']); ?>
                        </select>
                    </label>
                </div>
                
                <div class="row">
                    <div class="label">
                        <label for="">Status</label>
                    </div>
                    <label class="custom-select select-info">
                        <select id="idstatus" class="clear" disabled>
                            <option value="1" <?php if(listarConsulta($_GET['id'])['idstatus']==1){echo "selected";}?>>Pendente</option>
                            <option value="2" <?php if(listarConsulta($_GET['id'])['idstatus']==2){echo "selected";}?>>Concluída</option>
                            <option value="3" <?php if(listarConsulta($_GET['id'])['idstatus']==3){echo "selected";}?>>Cancelada</option>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data e hora da consulta</label>
                    </div>
                    <?php $value = date("Y-m-d\TH:i:s", strtotime(listarConsulta($_GET['id'])['data'])); ?>
                    <input id="data" type="datetime-local" placeholder="Data" class="clear" disabled value="<?php echo $value; ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Observações</label>
                    </div>
                    <input type="text" placeholder="Observações" class="clear" id="observacoes" disabled value="<?php echo listarConsulta($_GET['id'])['observacoes'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data de registro</label>
                    </div>
                    <input type="text" placeholder="Data" disabled value="<?php echo listarConsulta($_GET['id'])['data_registro']; ?>">
                </div>
                <div class="row">
                    <button class="btnSalvar shadow" id="updateConsulta">Salvar</button>
                    <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                </div>
            </div>
            <div class="otherInfos">
                <div class="pet-info" >
                    <h1>Cliente</h1>
                    <div class="petCard shadow" style="height: auto;">
                        <?php listarClienteConsulta($_GET['id']);?>    
                    </div>
                </div>
                <div class="pet-info">
                    <h1>Pet</h1>
                    <div class="petCard shadow" >
                        <?php listarPetConsulta($_GET['id']);?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>