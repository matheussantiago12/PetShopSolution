<?php
require_once 'db.php';

function createVeterinario($nome, $sobrenome, $cpf, $email) {
    global $connect;
    $query = "INSERT INTO veterinario(nome, sobrenome, cpf, email, data_registro) 
    VALUES ('$nome', '$sobrenome', '$cpf', '$email', now())";
    
    if($connect->query($query)) {
        echo "Registro adicionado";
    } else {
        echo "Error " . $query . ' ' . $connect->connect_error;
    }
    
    $connect->close();
}

function getVeterinarios() {
    global $connect;
    $query = "SELECT idveterinario, nome, sobrenome, cpf, email, data_registro FROM veterinario";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getVeterinario($id) {
    global $connect;
    $query = "SELECT idveterinario, nome, sobrenome, cpf, email, data_registro 
    FROM veterinario WHERE idveterinario = '$id'";
    $result = mysqli_query($connect, $query);
    return $result;
}

function updateVeterinario($id, $nome, $sobrenome, $cpf, $email) {
    global $connect;
    $query = "UPDATE veterinario 
    SET nome = '$nome', sobrenome = '$sobrenome', cpf = '$cpf', email = '$email' 
    WHERE idveterinario = '$id'";
    if(mysqli_query($connect, $query)) {
        echo "Update";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }

    $connect->close();
}

function deleteVeterinario($id) {
    global $connect;
    $query = "DELETE FROM veterinario WHERE idveterinario = '$id'";
    if(mysqli_query($connect, $query)) {
        echo "Delete";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }
    $connect->close();
}