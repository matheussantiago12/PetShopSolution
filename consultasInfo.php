<?php include("consultaController.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>teste</title>
    </head>
    <body>
        <?php include("header.php") ?>
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
                    <input type="text" placeholder="Id" disabled value="<?php echo listarConsulta($_GET['id'])['idconsulta'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Veterinário</label>
                    </div>
                    <label class="custom-select select-info">
                        <select disabled>
                            <?php listarVeterinariosConsulta() ?>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Cliente</label>
                    </div>
                    <input type="text" placeholder="Cliente" disabled value="<?php echo listarConsulta($_GET['id'])['cliente_nome']." ";
                    echo listarConsulta($_GET['id'])['cliente_sobrenome'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Pet</label>
                    </div>
                    <label class="custom-select select-info">
                        <select disabled>
                            <option value="1">Selecione...</option>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Status</label>
                    </div>
                    <label class="custom-select select-info">
                        <select disabled>
                            <option value="1">Pendente</option>
                            <option>Concluída</option>
                            <option>Cancelada</option>

                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Data</label>
                    </div>
                    <input type="datetime-local" placeholder="Data" disabled>
                </div>
                <div class="row">
                    <button class="btnSalvar shadow">Salvar</button>
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