<?php
require_once 'db.php';

function getVacina($id) {
    global $connect;
    $query = "SELECT va.idvacina, va.data, va.nome, a.nome as nome_animal, va.id_veterinario, va.id_animal, va.data_registro, 
    v.nome as nome_veterinario, v.sobrenome as sobrenome_veterinario FROM vacina_animal va 
    JOIN veterinario v ON va.id_veterinario = v.idveterinario
    JOIN animal a ON va.id_animal = a.idanimal WHERE va.idvacina = '$id'";
    $result = mysqli_query($connect, $query);
    return $result;
}


function updateVacina($idvacina, $data, $nome, $id_veterinario, $id_animal) {
    global $connect;
    $query = "UPDATE vacina_animal 
    SET data = '$data', nome = '$nome', id_veterinario = '$id_veterinario', id_animal = '$id_animal'
    WHERE idvacina = '$idvacina'";
    if(mysqli_query($connect, $query)) {
        echo "Update";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }

    $connect->close();
}

function deleteVacina($id) {
    global $connect;
    $query = "DELETE FROM vacina_animal WHERE idvacina = '$id'";
    if(mysqli_query($connect, $query)) {
        echo "Delete";
    } else {
        echo "Error" . $query . ' ' . $connect->connect_error;
    }
    $connect->close();
}
