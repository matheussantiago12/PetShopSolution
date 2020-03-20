<?php include("header.php")?>
<?php include("petController.php")?>
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
                        <label for="">Animal</label>
                    </div>
                    <label class="custom-select select-info">
                        <select id="select" disabled value="<?php echo listarPet($_GET['id'])['idtipo'] ?>">
                            <option value="">Selecione...</option>
                            <option value="1">Cão</option>
                            <option value="2">Gato</option>
                        </select>
                    </label>
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Raça</label>
                    </div>
                    <input type="text" placeholder="Raça" disabled value="<?php echo listarPet($_GET['id'])['raca'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Nascimento</label>
                    </div>
                    <input type="date" placeholder="data" disabled value="<?php echo listarPet($_GET['id'])['nascimento'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Descrição</label>
                    </div>
                    <input type="text" placeholder="Descrição" disabled value="<?php echo listarPet($_GET['id'])['descricao'] ?>">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Dono</label>
                    </div>
                    <input type="text" placeholder="Dono" disabled value="<?php echo listarPet($_GET['id'])['dono_nome']." "; echo listarPet($_GET['id'])['dono_sobrenome']?>">
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
                        <a href="#">Ver</a>
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
                        <a href="#">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>