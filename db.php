<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "petshop";

$connect = new mysqli($host, $user, $password, $db); 
global $connect;
 
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
}