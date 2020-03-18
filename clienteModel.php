<?php
require_once 'db.php';

function createCliente($nome, $sobrenome, $cpf, $telefone, $endereco) {
    global $connect;
    $query = "INSERT INTO cliente(nome, sobrenome, cpf, telefone, endereco, data_registro) 
    VALUES ('$nome', '$sobrenome', '$cpf', '$telefone', '$endereco', now())";
    
    if($connect->query($query)) {
        echo "Registro adicionado";
    } else {
        echo "Error " . $query . ' ' . $connect->connect_error;
    }
    
    $connect->close();
}

function getClientes() {
    global $connect;
    $query = "SELECT idcliente, nome, sobrenome, cpf, telefone, endereco FROM cliente";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getCliente($id) {
    global $connect;
    $query = "SELECT idcliente, nome, sobrenome, cpf, telefone, endereco, data_registro FROM cliente WHERE idcliente = $id";
    $result = mysqli_query($connect, $query);
    return $result;
}

function updateCliente($idcliente, $nome, $sobrenome, $cpf, $telefone, $endereco) {
    global $connect;
    $query = "UPDATE cliente 
    SET nome = '$nome', sobrenome = '$sobrenome', cpf = '$cpf', endereco = '$endereco', telefone = '$telefone' 
    WHERE idcliente = '$idcliente'";
    if(mysqli_query($connect, $query)) {
        echo "Update";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }

    $connect->close();
}

function deleteCliente($id) {
    global $connect;
    $query = "DELETE FROM cliente WHERE idcliente = '$id'";
    if(mysqli_query($connect, $query)) {
        echo "Delete";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }
    $connect->close();
}