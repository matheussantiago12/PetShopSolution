<?php
require_once 'db.php';

function createPet($nome, $nascimento, $descricao, $raca, $idtipo, $idcliente) {
    global $connect;
    $query = "INSERT INTO animal(nome, nascimento, raca, descricao, idtipo, idcliente, data_registro) 
    VALUES ('$nome', '$nascimento', '$raca', '$descricao', '$idtipo', '$idcliente', now())";
    
    if($connect->query($query)) {
        echo "Registro adicionado";
    } else {
        echo "Error " . $query . ' ' . $connect->connect_error;
    }   
    $connect->close();
}

function getPets() {
    global $connect;
    $query = "SELECT a.idanimal, a.nome, a.nascimento, a.raca, c.nome as dono, t.nome_tipo as tipo
    FROM animal a JOIN cliente c ON a.idcliente = c.idcliente JOIN tipo_animal t ON a.idtipo = t.idtipo";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getPet($id) {
    global $connect;
    $query = "SELECT a.idanimal, a.nome, a.nascimento, a.raca, a.descricao, t.nome_tipo as tipo, c.nome as dono 
    FROM animal a 
    JOIN cliente c ON a.idcliente = c.idcliente
    JOIN tipo_animal t ON a.idtipo = t.idtipo
    WHERE a.idanimal ='$id'";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getClientPets($idcliente) {
    global $connect;
    $query = "SELECT a.idanimal, a.nome, a.raca, t.nome_tipo AS tipo, YEAR(CURDATE()) - YEAR(nascimento) AS idade FROM animal a
    JOIN tipo_animal t ON a.idtipo = t.idtipo
    WHERE idcliente = '$idcliente'";
    $result = mysqli_query($connect, $query);
    return $result;
}

function updatePet($idanimal, $nome, $nascimento, $raca, $descricao, $tipo, $idcliente) {
    global $connect;
    $query = "UPDATE animal 
    SET nome = '$nome', nascimeno = '$nascimento', raca = '$raca', descricao = '$descricao', tipo = '$tipo', idcliente = '$idcliente' 
    WHERE idanimal = '$idanimal'";
    if(mysqli_query($connect, $query)) {
        echo "Update";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }

    $connect->close();
}

function deletePet($id) {
    global $connect;
    $query = "DELETE FROM animal WHERE idanimal = '$id'";
    if(mysqli_query($connect, $query)) {
        echo "Delete";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }
    $connect->close();
}