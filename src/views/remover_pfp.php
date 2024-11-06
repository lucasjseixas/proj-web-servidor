<?php
session_start();
include '../database/config.php';

$userId = $_SESSION['id'];

// Define a URL para a imagem padrão
$defaultUrl = "/web-serv/src/img/default_pfp.png";

// Atualiza no DB
$sql = "UPDATE `usuarios` SET url = '$defaultUrl' WHERE id = '$userId'";
mysqli_query($conn, $sql);

// Atualiza a sessão
$_SESSION['url'] = $defaultUrl;

$_SESSION['alert'] = 'info';
$_SESSION['msg'] = 'Foto de perfil removida!';
header("Location: perfil.php");
exit;
