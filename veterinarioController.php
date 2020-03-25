<?php
require_once("veterinarioModel.php");

if(isset($_POST['create'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    createVeterinario($nome, $sobrenome, $cpf, $email);
}

function listarVeterinarios() {
    $result = getVeterinarios();
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href='veterinariosInfo.php?id=$row[idveterinario]' title='Mais informações'>". $row['idveterinario'] ."</a></td>";
        echo "<td>". $row['nome'] ."</td>";
        echo "<td>". $row['sobrenome'] ."</td>";
        echo "<td>". $row['cpf'] ."</td>";
        echo "<td>". $row['email'] ."</td>";
        echo "<td>". $row['data_registro'] ."</td>";
        echo "<td><a href='#' name='delete' class='delete' value='$row[idveterinario]'><i class='fa fa-trash delete'></i></a></td>";
        echo "</tr>";
    }
}

function listarVeterinario($id) {
    $result = getVeterinario($id);
    $row = mysqli_fetch_array($result);
    return $row;
}

function getQuantidadeVeterinarios() {
    $result = getVeterinarios();
    $count = mysqli_num_rows($result);
    return $count;
}

if(isset($_POST['update'])) {
    $idveterinario = $_POST['idveterinario'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    updateVeterinario($idveterinario, $nome, $sobrenome, $cpf, $email);
}

if(isset($_POST['deletevet'])) {
    $id = $_POST['idveterinario'];
    deleteVeterinario($id);
}