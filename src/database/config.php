<?php

// Server local = localhost na porta padrao do Apache
// Como só existe a conexao com 1 db, o padrao é 'db_webserv'
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_webserv";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
