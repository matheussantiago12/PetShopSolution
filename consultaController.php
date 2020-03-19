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

function listarVeterinarios() {
    $result = getVeterinarios();
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idveterinario]'>";
    }
}

function listarClientes() {
    $result = getClientes();
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idcliente]'>";
    }
}

function listarPets() {
    $result = getPets();
    while($row = mysqli_fetch_array($result)) {
        echo "<option value='$row[idanimal]'>";
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