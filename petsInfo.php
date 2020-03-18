<?php include("header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/js/pet.js"></script>
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
                    <label for="">Nome</label>
                </div>
                <input type="text" placeholder="Nome" disabled>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Animal</label>
                </div>
                <label class="custom-select select-info">
                    <select disabled>
                        <option value="1">Selecione...</option>
                        <option>Cão</option>
                        <option>Gato</option>
                    </select>
                </label>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Raça</label>
                </div>
                <input type="text" placeholder="Raça" disabled>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Nascimento</label>
                </div>
                <input type="date" placeholder="data" disabled>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Descrição</label>
                </div>
                <input type="text" placeholder="Descrição" disabled>
            </div>
            <div class="row">
                <div class="label">
                    <label for="">Dono</label>
                </div>
                <input type="text" placeholder="Dono" disabled>
            </div>
            <div class="row">
                <button class="btnSalvar shadow">Salvar</button>
                <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
            </div>
        </div>
        <div class="otherInfos">
            <h1>Vacinas</h1>
            <div class="petCard shadow">
                <div class="left">
                    <h1>Tipo</h1>
                    <span>01/01/2020</span>
                    <span>Aplicada por: Dr. Nome</span>
                </div>
                <div class="right">
                    <a href="#">Editar</a>
                </div>
            </div>
            <div class="petCard shadow">
                <div class="left">
                    <h1>Tipo</h1>
                    <span>01/01/2020</span>
                    <span>Aplicada por: Dr. Nome</span>
                </div>
                <div class="right">
                    <a href="#">Editar</a>
                </div>
            </div>
            <div class="petCard shadow">
                <div class="left">
                    <h1>Tipo</h1>
                    <span>01/01/2020</span>
                    <span>Aplicada por: Dr. Nome</span>
                </div>
                <div class="right">
                    <a href="#">Editar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>