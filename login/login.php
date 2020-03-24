<?php
session_start();
include('../db.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: ../index.php');
    exit();
}

$usuario = mysqli_real_escape_string($connect, $_POST['usuario']);
$senha = mysqli_real_escape_string($connect, $_POST['senha']);

$query = "SELECT idusuario, usuario from usuarios where usuario = '$usuario' and senha = '$senha'";

$result = mysqli_query($connect, $query);
$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: ../dashboard.php');
    exit();
} else {
    $_SESSION['naoAutenticado'] = true;
    header('Location: ../index.php')/
    exit();
}