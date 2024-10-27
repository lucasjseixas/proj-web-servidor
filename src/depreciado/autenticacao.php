<?php

function autenticarUsuario()
{
    header('WWW-Authenticate: Base realm="Area Segura"');
    header("HTTP/1.0 401 Unauthorized");
    exit();
}

// Se $_SERVER['PHP_AUTH_USER'] estiver em branco
// Ainda não foi solicitado ao usuário a informação de autenticação

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    autenticarUsuario();
} else {
    // Inclusão da configuração da conexão de DB
    include_once 'config.php';

    // Query para o DB para procurar na lista de usuarios o usuario cadastrado
    $sql = "SELECT email, senha FROM `usuarios` WHERE email='$_SERVER[PHP_AUTH_USER]' AND senha='$_SERVER[PHP_AUTH_PW]'";

    // Resultado da busca dentro do DB
    $res = $conn->query($sql);

    // Fecha a conexão com o DB
    $conn->close();

    if (mysqli_num_rows($res) == 0) {
        autenticarUsuario();
    } else {
        header("Location: ./perfil.php");
        echo "Bem vindo a Área Segura";
        exit();
    }
}
