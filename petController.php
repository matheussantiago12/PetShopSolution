<?php
require_once("petModel.php");
require_once("clienteModel.php");
require_once("vacinaModel.php");
require_once("veterinarioModel.php");

if(isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $descricao = $_POST['descricao'];
    $raca = $_POST['raca'];
    $tipo = $_POST['tipo'];
    $idcliente = $_POST['idcliente'];
    createPet($nome, $nascimento, $descricao, $raca, $tipo, $idcliente);  
}

if(isset($_POST['vacina'])) {
    $nomevacina = $_POST['nomevacina'];
    $idveterinario = $_POST['idveterinario'];
    $idanimal = $_POST['idanimal'];
    $data = $_POST['data'];
    createPetVacina($nomevacina, $idveterinario, $idanimal, $data);
}

function listarPets() {
    $result = getPets();
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href='petsInfo.php?id=$row[idanimal]' title='Mais informações'>". $row['idanimal'] ."</a></td>";
        echo "<td>". $row['nome'] ."</td>";
        echo "<td>". $row['tipo'] ."</td>";
        echo "<td>". $row['raca'] ."</td>";
        echo "<td>". $row['nascimento'] ."</td>";
        echo "<td>". $row['dono'] ."</td>";
        echo "<td><a href='#' name='delete' class='delete' id='$row[idanimal]'><i class='fa fa-trash delete'></i></a></td>";
        echo "</tr>";
    }
}

function listarPet($id) {
    $result = getPet($id);
    $row = mysqli_fetch_array($result);
    return $row;
}

function listarPetCards($idcliente) {
    $result = getClientPets($idcliente);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='petCard shadow'>";
        echo "<img src='https://catiororeflexivo.com/wp-content/uploads/2019/10/flamengo-doze-rifa-500x500.jpg'></img>";
        echo "<div class='left'>";
        echo "<h1>$row[nome]</h1>";
        echo "<span>$row[tipo]" . ", " . "$row[raca]" . ", " . "$row[idade]</span>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<a href='petsInfo.php?id=$row[idanimal]'>Ver</a>";
        echo "</div>";
        echo "</div>";
    }
}

if(isset($_POST['update'])) {
    $idanimal = $_POST['idanimal'];
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $descricao = $_POST['descricao'];
    $raca = $_POST['raca'];
    $tipo = $_POST['tipo'];
    $idcliente = $_POST['idcliente'];
    updatePet($idanimal, $nome, $nascimento, $raca, $descricao, $tipo, $idcliente);
}

if(isset($_POST['deletepet'])) {
    $id = $_POST['idpet'];
    deletePet($id);
}

function listarPetVacinas($id) {
    $result = getPetVacinas($id);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='petCard shadow'>";
        echo "<div class='left'>";
        echo "<h1>$row[nome]</h1>";
        echo "<span>Aplicada por: $row[nome_veterinario] $row[sobrenome_veterinario]</span>";
        echo "<span>em $row[data]</span>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<a href='vacinasInfo.php?id=$row[idvacina]'>Ver</a>";
        echo "</div>";
        echo "</div>";
    }
}

function listarClientePets($id) {
    $result = getClientPets($id);
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idanimal]'>$row[nome]</option>";
    }
}

function listarClienteOptions($id) {
    $resultClientes = getClientes();
    $resultPet = getPet($id);
    while($rowPet = mysqli_fetch_array($resultPet)) {
        $idcliente = $rowPet['idcliente'];
    }
    while($rowClientes = mysqli_fetch_array($resultClientes)) {
        $selected = "";
        if($idcliente == $rowClientes['idcliente']) {
            $selected = "selected='selected'";    
        }
        echo "<option value='$rowClientes[idcliente]'" . $selected . ">$rowClientes[nome] $rowClientes[sobrenome]</option>";
    }
}

function listarPetsOptions($id) {
    $resultPets = getPets();
    $resultVacina = getVacina($id);

    while($rowVacina = mysqli_fetch_array($resultVacina)) {
        $idanimal = $rowVacina['id_animal'];
    }

    while($rowPets = mysqli_fetch_array($resultPets)) {
        $selected = "";
        if($rowPets['idanimal'] == $idanimal) {
            $selected = "selected='selected'";
        }
        echo "<option value='$rowPets[idanimal]' $selected>$rowPets[nome]</option>";
    }
}

function listarVeterinariosOptionsFromVacina($id) {
    $resultVeterinarios = getVeterinarios();
    $resultVacina = getVacina($id);

    while($rowVacina = mysqli_fetch_array($resultVacina)) {
        $idveterinario = $rowVacina['id_veterinario'];
    }

    while($rowVeterinarios = mysqli_fetch_array($resultVeterinarios)) {
        $selected = "";
        if($rowVeterinarios['idveterinario'] == $idveterinario) {
            $selected = "selected='selected'";
        }
        echo "<option value='$rowVeterinarios[idveterinario]' $selected>$rowVeterinarios[nome]</option>";
    }
}