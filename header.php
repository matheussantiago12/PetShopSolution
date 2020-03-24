<?php include('login/verificaLogin.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="public/css/smallscreen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/general.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery.Validate/1.6/jQuery.Validate.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="public/js/script.js"></script>
</head>
<body>
    <div class="main">
        <div class="list">
            <div class="teste">
                <div class="item">
                    <a href="consultas.php">Consultas</a>
                </div>
                <div class="item">
                    <a href="clientes.php">Clientes</a>
                </div>
                <div class="item">
                    <a href="veterinarios.php">Veterinários</a>
                </div>
                <div class="item">
                    <a href="pets.php">Pets</a>
                </div>
            </div>       
        </div>     
    </div>
    <div class="aside">
        <a href="index.php">
            <div class="aside-row first">
                <h1>Pet Shop</h1>
            </div>
        </a>
        <a href="index.php">
            <div class="aside-row">
                <div class="aside-icon">
                    <i class="fa fa-home"></i>
                </div>
                <div class="aside-title">
                    Home
                </div>
            </div>
        </a>
        <a href="dashboard.php">
            <div class="aside-row">
                <div class="aside-icon">
                    <i class="fa fa-columns"></i>
                </div>
                <div class="aside-title">
                    Dashboard
                </div>
            </div>
        </a>
        <a href="consultas.php">
            <div class="aside-row">
                <div class="aside-icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="aside-title">
                    Consultas
                </div>
            </div>
        </a>
        <a href="clientes.php">
            <div class="aside-row">
                <div class="aside-icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="aside-title">
                    Clientes
                </div>
            </div>
        </a>
        <a href="veterinarios.php">
            <div class="aside-row">
                <div class="aside-icon">
                    <i class="fa fa-user-md"></i>
                </div>
                <div class="aside-title">
                    Veterinários
                </div>
            </div>
        </a>
        <a href="pets.php">
            <div class="aside-row">
                <div class="aside-icon">
                    <i class="fa fa-paw"></i>
                </div>
                <div class="aside-title">
                    Pets
                </div>
            </div>
        </a>
        
        <a href="login/logout.php">
            <div class="aside-row last">
                <div class="aside-icon">
                    <i class="fa fa-chevron-left"></i>
                </div>
                <div class="aside-title">
                    Sair
                </div>
            </div>
        </a>
        </div>
    </body>
</html>