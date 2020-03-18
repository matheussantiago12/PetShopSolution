<?php include("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <label for="">Veterinário</label>
                </div>
                <label class="custom-select select-info">
                    <select disabled>
                        <option value="1">Selecione...</option>
                    </select>
                </label>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Cliente</label>
                </div>
                <input type="text" placeholder="Cliente" disabled>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Pet</label>
                </div>
                <input type="text" placeholder="Pet" disabled>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Data</label>
                </div>
                <input type="datetime-local" placeholder="Data" disabled>
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
                <button class="btnSalvar shadow">Salvar</button>
                <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
            </div>
        </div>
        <div class="otherInfos">
            <div class="cliente-info">
                <h1>Cliente</h1>
                <div class="petCard shadow">
                    <div class="left">
                        <h1></h1>
                        <span>Informe o nome do cliente.</span>
                    </div>
                    <div class="right">
                        <a href="#">Escolher</a>
                        <span>|</span>
                        <a href="#">Editar</a>
                    </div>
                </div>
            </div>
            <div class="pet-info">
                <h1>Pets</h1>
                <div class="petCard shadow">
                    <div class="left">
                        <h1></h1>
                        <span>O cliente informado não possui pets cadastrados.</span>
                    </div>
                    <div class="right">
                        <a href="#">Escolher</a>
                        <span>|</span>
                        <a href="#">Editar</a>
                    </div>
                </div>
                <div class="infoAdd">
                    <button><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>