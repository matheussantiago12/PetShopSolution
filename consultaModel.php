<?php
require_once("db.php");

function createConsulta($idveterinario, $idanimal, $data, $idstatus) {
    global $connect;
    $query = "INSERT INTO consulta(idveterinario, idanimal, data, idstatus, data_registro) 
    VALUES ('$idveterinario', '$idanimal', '$data', 1, now())";
    
    if($connect->query($query)) {
        echo "Registro adicionado";
    } else {
        echo "Error " . $query . ' ' . $connect->connect_error;
    }
    
    $connect->close();
}

function getConsultas() {
    global $connect;
    $query = "SELECT c.idconsulta, v.nome AS nome_veterinario, v.sobrenome AS sobrenome_veterinario,
    a.nome AS nome_animal, cl.nome AS nome_cliente, cl.sobrenome AS sobrenome_cliente, c.data, s.nome_status
    FROM consulta c
    JOIN veterinario v ON c.idveterinario = v.idveterinario
    JOIN animal a ON c.idanimal = a.idanimal
    JOIN cliente cl ON a.idcliente = cl.idcliente 
    JOIN status s ON c.idstatus = s.idstatus";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getConsulta($id) {
    global $connect;
    $query = "SELECT c.idconsulta, v.nome AS nome_veterinario, v.sobrenome AS sobrenome_veterinario,
    a.nome AS nome_cachorro, cl.nome AS cliente_nome, cl.sobrenome AS cliente_sobrenome, c.data,
     s.nome_status, c.data_registro
    FROM consulta c
    JOIN veterinario v ON c.idveterinario = v.idveterinario
    JOIN animal a ON c.idanimal = a.idanimal
    JOIN cliente cl ON a.idcliente = cl.idcliente 
    JOIN status s ON c.idstatus = s.idstatus";
    $result = mysqli_query($connect, $query);
    return $result;
}

function updateConsulta($idconsulta, $idveterinario, $idanimal, $data, $idstatus, $observacoes) {
    global $connect;
    $query = "UPDATE consulta 
    SET idveterinario = '$idveterinario', idanimal = '$idanimal', data = '$data', idstatus = '$idstatus',
    observacoes = '$observacoes'
    WHERE idconsulta = '$idconsulta'";
    if(mysqli_query($connect, $query)) {
        echo "Update";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }

    $connect->close();
}

function deleteConsulta($id) {
    global $connect;
    $query = "DELETE FROM consulta WHERE idconsulta = '$id'";
    if(mysqli_query($connect, $query)) {
        echo "Delete";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }
    $connect->close();
}

function getVeterinarios() {
    global $connect;
    $query = "SELECT idveterinario, nome FROM veterinario";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getClientes() {
    global $connect;
    $query = "SELECT idcliente, nome FROM cliente";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getPets() {
    global $connect;
    $query = "SELECT idanimal, nome FROM animal";
    $result = mysqli_query($connect, $query);
    return $result;
}