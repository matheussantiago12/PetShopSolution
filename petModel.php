<?php
require_once 'db.php';

function createPet($nome, $nascimento, $descricao, $raca, $idtipo, $idcliente, $nomeFoto) {
    global $connect;
    $query = "INSERT INTO animal(nome, nascimento, raca, descricao, idtipo, idcliente, foto, data_registro) 
    VALUES ('$nome', '$nascimento', '$raca', '$descricao', '$idtipo', '$idcliente', '$nomeFoto' ,now())";
    
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
    $query = "SELECT a.idanimal, a.nome, a.nascimento, a.raca, a.descricao, t.idtipo as idtipo, t.nome_tipo as tipo,
    c.nome as dono_nome, c.sobrenome as dono_sobrenome, c.idcliente, a.foto, a.data_registro
    FROM animal a 
    JOIN cliente c ON a.idcliente = c.idcliente
    JOIN tipo_animal t ON a.idtipo = t.idtipo
    WHERE a.idanimal ='$id'";
    $result = mysqli_query($connect, $query);
    return $result;
}

function getClientPets($idcliente) {
    global $connect;
    $query = "SELECT a.idanimal, a.nome, a.raca, t.nome_tipo AS tipo, a.foto, YEAR(CURDATE()) - YEAR(nascimento) AS idade FROM animal a
    JOIN tipo_animal t ON a.idtipo = t.idtipo
    WHERE idcliente = '$idcliente'";
    $result = mysqli_query($connect, $query);
    return $result;
}

function updatePet($idanimal, $nome, $nascimento, $raca, $descricao, $tipo, $idcliente, $nomeFoto) {
    global $connect;
    $query = "UPDATE animal 
    SET nome = '$nome', nascimento = '$nascimento', raca = '$raca', descricao = '$descricao', idtipo = '$tipo',
    idcliente = '$idcliente', foto = '$nomeFoto' WHERE idanimal = '$idanimal'";
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

// function getPetVacinas($id) {
//     global $connect;
//     $query = "SELECT va.idvacina, va.data, va.nome AS nome_vacina, v.idveterinario, v.nome AS nome_veterinario,
//     v.sobrenome AS sobrenome_veterinario, a.idanimal, a.nome AS nome_pet
//     FROM vacina_animal va
//     JOIN veterinario v ON va.id_veterinario = v.idveterinario
//     JOIN animal a ON va.id_animal = a.idanimal
//     WHERE idvacina = '$id'";
//     $result = mysqli_query($connect, $query);
//     return $result;
// }

function createPetVacina($nomeVacina, $idveterinario, $idanimal, $data) {
    global $connect;
    $query = "INSERT INTO vacina_animal(nome, id_veterinario, id_animal, data, data_registro) 
    VALUES ('$nomeVacina', '$idveterinario', '$idanimal', '$data', now())";

    if($connect->query($query)) {
        echo "Registro adicionado";
    } else {
        echo "Error " . $query . ' ' . $connect->connect_error;
    }   
    $connect->close();
}

function getPetVacinas($id) {
    global $connect;
    $query = "SELECT va.idvacina, va.data, va.nome, va.id_veterinario, va.id_animal, va.data_registro, 
    v.nome as nome_veterinario, v.sobrenome as sobrenome_veterinario 
    FROM vacina_animal va JOIN veterinario v ON va.id_veterinario = v.idveterinario WHERE id_animal = '$id'";
    $result = mysqli_query($connect, $query);
    return $result;
}
