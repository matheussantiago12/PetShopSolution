<?php
include("vacinaModel.php");

function listarVacina($id) {
    $result = getVacina($id);
    $row = mysqli_fetch_array($result);
    return $row;
}

if(isset($_POST['updatevacina'])) {
    $idvacina = $_POST['idvacina'];
    $data = $_POST['data'];
    $nome = $_POST['nome'];
    $idveterinario = $_POST['idveterinario'];
    $idanimal = $_POST['idanimal'];
    updateVacina($idvacina, $data, $nome, $idveterinario, $idanimal);
}

if(isset($_POST['deletevacina'])) {
    $idvacina = $_POST['idvacina'];
    deleteVacina($idvacina);
}