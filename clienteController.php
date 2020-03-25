<?php
require_once("clienteModel.php");

if(isset($_POST['create'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    createCliente($nome, $sobrenome, $cpf, $telefone, $endereco);
}

function listarClientes() {
    $result = getClientes();
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href='clientesInfo.php?id=$row[idcliente]' title='Mais informações'>". $row['idcliente'] ."</a></td>";
        echo "<td>". $row['nome'] ."</td>";
        echo "<td>". $row['sobrenome'] ."</td>";
        echo "<td>". $row['cpf'] ."</td>";
        echo "<td>". $row['telefone'] ."</td>";
        echo "<td>". $row['endereco'] ."</td>";
        echo "<td><a href='#' name='delete' class='delete' value='$row[idcliente]'><i class='fa fa-trash delete'></i></a></td>";
        echo "</tr>";
    }
}

function listarCliente($id) {
    $result = getCliente($id);
    $row = mysqli_fetch_array($result);
    return $row;
}

function getQuantidadeClientes() {
    $result = getClientes();
    $count = mysqli_num_rows($result);
    return $count;
}

if(isset($_POST['updateCliente'])) {
    $idcliente = $_POST['idcliente'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    updateCliente($idcliente, $nome, $sobrenome, $cpf, $telefone, $endereco);

}

if(isset($_POST['deletecliente'])) {
    $id = $_POST['idcliente'];
    deleteCliente($id);
}