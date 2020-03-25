<?php include("header.php") ?>
<?php require_once("clienteController.php")?>
<?php require_once("petController.php")?>
<?php require_once("consultaController.php")?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="public/js/cliente.js"></script>
        <script src="public/js/consulta.js"></script>
        <script src="public/js/pet.js"></script>
        <title>Informação do cliente</title>
    </head>
    <body>
        <div class="testee">
            <div class="bodyInfo">
                <div class="form" id="formClear">
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
                        <input type="text" placeholder="Id" name="idcliente" id="idcliente" disabled value="<?php echo listarCliente($_GET['id'])['idcliente'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Nome</label>
                        </div>
                        <input type="text" placeholder="Nome" name="nome" class="clear" id="nome" disabled value="<?php echo listarCliente($_GET['id'])['nome'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Sobrenome</label>
                        </div>
                        <input type="text" placeholder="Sobrenome" class="clear" name="sobrenome" id="sobrenome" disabled value="<?php echo listarCliente($_GET['id'])['sobrenome'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">CPF</label>
                        </div>
                        <input type="text" placeholder="CPF" name="cpf" class="clear" id="cpf" disabled value="<?php echo listarCliente($_GET['id'])['cpf'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Endereço</label>
                        </div>
                        <input type="text" placeholder="Endereço" class="clear" name="endereco" id="endereco" disabled value="<?php echo listarCliente($_GET['id'])['endereco'] ?>">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Telefone</label>
                        </div>
                        <input type="text" placeholder="Telefone" class="clear" name="telefone" id="telefone" disabled value="<?php echo listarCliente($_GET['id'])['telefone']?>"> 
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Data de cadastro</label>
                        </div>
                        <input type="text" placeholder="Data de cadastro" name="dataregistro" id="dataregistro" disabled value="<?php echo listarCliente($_GET['id'])['data_registro']?>"> 
                    </div>
                    <div class="row">
                        <button class="btnSalvar shadow" name="update" id="updateCliente">Salvar</button>
                        <button class="btnSalvar btnLimpar shadow" onclick="limparDados();">Limpar</button>
                    </div>
                </div>
                <div class="otherInfos">
                    <h1>Pets</h1>
                    <?php listarPetCards($_GET['id']) ?>
                </div>
            </div>
        <div class="bodyInfo">
            <div class="form">
                <h1>Cadastrar consulta</h1>
                <div class="form-validation-consulta" style="display: none">
                    <span style="color: red">Preencha todos os campos corretamente.</span>
                </div>
                <div class="row">
                    <div class="label">
                         <label for="">Pet</label>
                    </div>
                    <label class="custom-select select-info" id="tipo">
                        <select name="pet" id="pet">
                            <option value="">Selecione o pet</option>
                            <?php listarClientePets($_GET['id']); ?>
                        </select>
                    </label>
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
                         <label for="">Data da consulta</label>
                    </div>
                    <input type="datetime-local" name="data" id="data">
                </div>
                <div class="row">
                    <div class="label">
                         <label for="">Observações (opcional)</label>
                    </div>
                    <input type="text" name="observacoes" id="observacoes" placeholder="Observações (opcional)">
                </div>
                <div class="row">
                    <button class="btnSalvar shadow" name="update" id="createConsulta">Salvar</button>
                </div>
            </div>
            <div class="form">
                <h1>Cadastrar pet</h1>
                <div class="form-validation-pet" style="display: none">
                    <span style="color: red">Preencha todos os campos corretamente.</span>
                </div>
                <form onsubmit="return false" enctype="multipart/form-data">
                    <div class="row">
                        <div class="label">
                            <label for="">Foto do pet</label>
                        </div>
                        <input type="file" id="foto" name="foto" placeholder="Foto">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Nome</label>
                        </div>
                        <input type="text" id="nomePet" name="nomePet" placeholder="Nome">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Tipo</label>
                        </div>
                        <label class="custom-select select-info">
                            <select name="tipo" id="tipoPet">
                                <option value="1">Cão</option>
                                <option value="2">Gato</option>
                            </select>
                        </label>
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Raça</label>
                        </div>
                        <input type="text" id="raca" name="raca" placeholder="Raça">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Data de nascimento</label>
                        </div>
                        <input type="date" id="dataPet" name="data" placeholder="Data de nascimento">
                    </div>
                    <div class="row">
                        <div class="label">
                            <label for="">Descrição (opcional)</label>
                        </div>
                        <input type="text" id="descricao" name="descricao" placeholder="Descrição (opcional)">
                    </div>
                    <div class="row">
                        <button class="btnSalvar shadow" name="create" id="createPetAlt">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>