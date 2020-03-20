<?php
include("consultaModel.php");

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
        echo "<img src='https://catiororeflexivo.com/wp-content/uploads/2019/10/flamengo-doze-rifa-500x500.jpg'></img>";
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

function listarVeterinariosConsulta() {
    $result = getVeterinariosConsulta();
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idveterinario]'>$row[nome]</option>";
    }
}

if(isset($_POST['update'])) {
    $idconsulta = $_POST['idconsulta'];
    $idveterinario = $_POST['idveterinario'];
    $idanimal = $_POST['idanimal'];
    $data = $_POST['data'];
    $idstatus = $_POST['idstatus'];
    $observacoes = $_POST['observacoes'];
    updateConsulta($idconsulta, $idveterinario, $idanimal, $data, $idstatus, $observacoes);
}

if(isset($_POST['deleteconsulta'])) {
    $id = $_POST['idconsulta'];
    deleteConsulta($id);
}