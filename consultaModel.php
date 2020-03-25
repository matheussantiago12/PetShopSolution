<?php
require_once("db.php");

function createConsulta($idveterinario, $idanimal, $data, $observacoes) {
    global $connect;
    $query = "INSERT INTO consulta(idveterinario, idanimal, data, observacoes, idstatus, data_registro) 
    VALUES ('$idveterinario', '$idanimal', '$data', '$observacoes', 1, now())";
    
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

function getConsultasByStatus($status) {
    global $connect;
    $query = "SELECT idconsulta FROM consulta WHERE idstatus = '$status'";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getConsulta($id) {
    global $connect;
    $query = "SELECT c.idconsulta, v.nome AS nome_veterinario, v.sobrenome AS sobrenome_veterinario,
    a.nome AS nome_cachorro, cl.nome AS cliente_nome, cl.sobrenome AS cliente_sobrenome, c.data,
     s.nome_status, c.data_registro, v.idveterinario, a.idanimal, c.idstatus, c.observacoes
    FROM consulta c
    JOIN veterinario v ON c.idveterinario = v.idveterinario
    JOIN animal a ON c.idanimal = a.idanimal
    JOIN cliente cl ON a.idcliente = cl.idcliente 
    JOIN status s ON c.idstatus = s.idstatus 
    WHERE c.idconsulta = '$id'";
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

function getVeterinariosConsulta() {
    global $connect;
    $query = "SELECT idveterinario, nome FROM veterinario";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getPetConsulta($id) {
    global $connect;
    $query = "SELECT c.idanimal, a.nome, a.raca, t.nome_tipo as tipo,
    cl.nome as dono_nome, cl.sobrenome as dono_sobrenome, cl.telefone, cl.idcliente, a.foto
    FROM consulta c
    JOIN animal a ON c.idanimal = a.idanimal 
    JOIN cliente cl ON a.idcliente = cl.idcliente
    JOIN tipo_animal t ON a.idtipo = t.idtipo
    WHERE c.idconsulta ='$id'";
    $result = mysqli_query($connect, $query);
    return $result;
}