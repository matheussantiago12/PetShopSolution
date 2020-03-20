<?php
include("petModel.php");

if(isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $descricao = $_POST['descricao'];
    $raca = $_POST['raca'];
    $tipo = $_POST['tipo'];
    $idcliente = $_POST['idcliente'];
    createPet($nome, $nascimento, $descricao, $raca, $tipo, $idcliente);  
}

function listarPets() {
    $result = getPets();
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href='petsInfo.php?id=$row[idanimal]' title='Mais informações'>". $row['idanimal'] ."</a></td>";
        echo "<td>". $row['nome'] ."</td>";
        echo "<td>". $row['tipo'] ."</td>";
        echo "<td>". $row['raca'] ."</td>";
        echo "<td>". $row['nascimento'] ."</td>";
        echo "<td>". $row['dono'] ."</td>";
        echo "<td><a href='#' name='delete' class='delete' id='$row[idanimal]'><i class='fa fa-trash delete'></i></a></td>";
        echo "</tr>";
    }
}

function listarPet($id) {
    $result = getPet($id);
    $row = mysqli_fetch_array($result);
    return $row;
}

function listarPetCards($idcliente) {
    $result = getClientPets($idcliente);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='petCard shadow'>";
        echo "<img src='https://catiororeflexivo.com/wp-content/uploads/2019/10/flamengo-doze-rifa-500x500.jpg'></img>";
        echo "<div class='left'>";
        echo "<h1>$row[nome]</h1>";
        echo "<span>$row[tipo]" . ", " . "$row[raca]" . ", " . "$row[idade]</span>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<a href='petsInfo.php?id=$row[idanimal]'>Ver</a>";
        echo "</div>";
        echo "</div>";
    }
}

if(isset($_POST['update'])) {
    $idanimal = $_POST['idcliente'];
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $descricao = $_POST['descricao'];
    $raca = $_POST['raca'];
    $tipo = $_POST['tipo'];
    $idcliente = $_POST['idcliente'];
    updateCliente($idanimal, $nome, $nascimento, $descricao, $raca, $tipo, $idcliente);
}

if(isset($_POST['deletepet'])) {
    $id = $_POST['idpet'];
    deletePet($id);
}

function listarVacinas() {
    $result = getClientPets($idcliente);
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='petCard shadow'>";
        echo "<div class='left'>";
        echo "<h1>Tipo</h1>";
        echo "<span>01/01/2020</span>";
        echo "<span>Aplicada por: Dr. Nome</span>";
        echo "</div>";
        echo "<div class='right'>";
        echo "<a href='#'>Ver</a>";
        echo "</div>";
        echo "</div>";
    }
}