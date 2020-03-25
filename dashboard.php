<?php include("header.php")?>
<?php require_once("clienteController.php")?>
<?php require_once("consultaController.php")?>
<?php require_once("petController.php")?>
<?php require_once("veterinarioController.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="testee">
        <div class="body dashboard">
            <h1>Seja bem-vindo(a), <?php echo $_SESSION['usuario'];?>.</h1>
            <div class="dashboard-row">
                <div class="dashboard-card shadow">
                    <div class="card-icon cyan">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="card-text">
                        <span><span class="card-number"><?php echo getQuantidadeClientes();?></span> clientes cadastrados</span>
                    </div>
                </div>
                <div class="dashboard-card shadow">
                    <div class="card-icon purple">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="card-text">
                        <span><span class="card-number"><?php echo getQuantidadeConsultasByStatus(1);?></span> consultas agendadas</span>
                    </div>
                </div>
                <div class="dashboard-card shadow">
                    <div class="card-icon yellow">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="card-text">
                        <span><span class="card-number"><?php echo getQuantidadeVeterinarios();?></span> veterinários cadastrados</span>
                    </div>
                </div>
                <div class="dashboard-card shadow">
                    <div class="card-icon green">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="card-text">
                        <span><span class="card-number"><?php echo getQuantidadePets();?></span> pets cadastrados</span>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</body>
</html>