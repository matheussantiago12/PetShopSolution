<?php
require_once("consultaModel.php");
require_once("veterinarioModel.php");
require_once("petModel.php");

if(isset($_POST['create'])) {
    $idveterinario = $_POST['idveterinario'];
    $idanimal = $_POST['idanimal'];
    $data = $_POST['data'];
    $observacoes = $_POST['observacoes'];
    createConsulta($idveterinario, $idanimal, $data, $observacoes);
}

function listarConsultas() {
    $result = getConsultas();
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href='consultasInfo.php?id=$row[idconsulta]' title='Mais informações'>" . $row['idconsulta'] . "</a></td>";
        echo "<td>" . $row['nome_veterinario'] . " " . $row['sobrenome_veterinario'] . "</td>";
        echo "<td>" . $row['nome_cliente'] . " " . $row['sobrenome_cliente'] . "</td>";
        echo "<td>" . $row['nome_animal'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['nome_status'] . "</td>";
        echo "</tr>";
    }
}

function listarConsulta($id) {
    $result = getConsulta($id);
    $row = mysqli_fetch_array($result);
    return $row;
}

function quantidadeConsultas() {
    $result = getConsultas();
    $count = mysqli_num_rows($result);
    return $count;
}

function listarPetsConsulta($id) {
    $result = getPetsConsulta($id);
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idanimal]'>$row[nome]</option>";
    }
}

function listarPetConsulta($id) {
    $result = getPetConsulta($id);
    while($row = mysqli_fetch_array($result)) {
        echo "<img src='uploads/$row[foto]'></img>";
        echo "<div class='left'>";
        echo "<h1>$row[nome]</h1>";
        echo "<span>$row[tipo]" . ", " . "$row[raca]</span>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<a href='petsInfo.php?id=$row[idanimal]'>Ver</a>";
        echo "</div>";
    }
}

function listarClienteConsulta($id) {
    $result = getPetConsulta($id);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='left' id='$row[idcliente]'>";
        echo "<h1>$row[dono_nome]"." "."$row[dono_sobrenome]</h1>";
        echo "<span>$row[telefone]</span>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<a href='clientesInfo.php?id=$row[idcliente]'>Ver</a>";
        echo "</div>";
    }
}

if(isset($_POST['updateconsulta'])) {
    $idconsulta = $_POST['idconsulta'];
    $idveterinario = $_POST['idveterinario'];
    $idanimal = $_POST['idanimal'];
    $idstatus = $_POST['idstatus'];
    $data = $_POST['data'];
    $observacoes = $_POST['observacoes'];
    updateConsulta($idconsulta, $idveterinario, $idanimal, $data, $idstatus, $observacoes);
}

if(isset($_POST['deleteconsulta'])) {
    $id = $_POST['idconsulta'];
    deleteConsulta($id);
}

function listarVeterinariosOptionsFromConsulta($id) {
    $resultVeterinarios = getVeterinarios();
    $resultConsulta = getConsulta($id);

    while($rowConsulta = mysqli_fetch_array($resultConsulta)) {
        $idveterinario = $rowConsulta['idveterinario'];
    }

    while($rowVeterinarios = mysqli_fetch_array($resultVeterinarios)) {
        $selected = "";
        if($rowVeterinarios['idveterinario'] == $idveterinario) {
            $selected = "selected='selected'";
        }
        echo "<option value='$rowVeterinarios[idveterinario]' $selected>$rowVeterinarios[nome] $rowVeterinarios[sobrenome]</option>";
    }
}

function listarPetsOptionsFromConsulta($id) {
    $resultPets = getPets();
    $resultConsulta = getConsulta($id);

    while($rowConsulta = mysqli_fetch_array($resultConsulta)) {
        $idpet = $rowConsulta['idanimal'];
    }

    while($rowPets = mysqli_fetch_array($resultPets)) {
        $selected = "";
        if($rowPets['idanimal'] == $idpet) {
            $selected = "selected='selected'";
        }
        echo "<option value='$rowPets[idanimal]' $selected>$rowPets[nome]</option>";
    }
}

function listarVeterinariosConsulta() {
    $result = getVeterinarios();
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idveterinario]'>$row[nome] $row[sobrenome]</option>";
    }
}

function getQuantidadeConsultasByStatus($status) {
    $result = getConsultasByStatus($status);
    $count = mysqli_num_rows($result);
    return $count;
}