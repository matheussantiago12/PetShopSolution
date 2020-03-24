<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>
    <div class="bg">
        <div class="login-box">
            <div class="login-head">
                <h1>Pet Shop</h1>
            </div>
            <?php if(isset($_SESSION['naoAutenticado'])): ?>
            <div class="erro-login">
                Usuário ou senha inválidos.
            </div>
            <?php 
            endif;
            unset($_SESSION['naoAutenticado']);
            ?>
            <form action="login/login.php" method="POST">
                <div class="row">
                    <div class="label">
                        <label for="">Login</label>
                    </div>
                    <input type="text" class="login" name="usuario" placeholder="Insira seu login">
                </div>
                <div class="row">
                    <div class="label">
                        <label for="">Senha</label>
                    </div>
                    <input type="password" class="login" name="senha" placeholder="Insira sua senha">
                </div>
                <div class="row">
                    <button>Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>