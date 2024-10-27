<?php

// Inicia sessao
if (!isset($_SESSION)) {
    session_start();
}

// Caso sessao nao esteja definida indica botao para index
if (!isset($_SESSION['email'])) {
    die("<head><link rel='stylesheet' href='../css/bootstrap.min.css'><link rel='stylesheet' href='../css/boostrap-icons/font/bootstrap-icons.css'></head>
    <div class='container text-center'><h1>Você não está logado! Por favor, faça o login ou registre-se<br><a class='btn btn-primary mt-5' href=\"\web-serv\src\index.php\">Entrar</a></h1></div>");
}
