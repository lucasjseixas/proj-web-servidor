<?php
session_start();
include '../database/config.php';  // Conexão com o banco de dados

$userId = $_SESSION['id'];

// Se um arquivo foi carregado
if (isset($_FILES['pfp_upload']) && $_FILES['pfp_upload']['error'] == 0) {
    $uploadDir = "E:/xampp/htdocs/web-serv/src/uploads/$userId/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadPath = $uploadDir . basename($_FILES['pfp_upload']['name']);
    move_uploaded_file($_FILES['pfp_upload']['tmp_name'], $uploadPath);
    $url = "/web-serv/src/uploads/$userId/" . $_FILES['pfp_upload']['name'];
} elseif (!empty($_POST['pfp_url'])) {  // Se uma URL foi fornecida
    $url = $_POST['pfp_url'];
} else {
    $_SESSION['alert'] = 'error';
    $_SESSION['msg'] = 'Erro ao definir imagem.';
    header("Location: perfil.php");
    exit;
}

// Atualiza o banco de dados
$sql = "UPDATE `usuarios` SET url = '$url' WHERE id = '$userId'";
mysqli_query($conn, $sql);

// Atualiza a sessão
$_SESSION['url_pfp'] = $url;

$_SESSION['alert'] = 'success';
$_SESSION['msg'] = 'Foto de perfil atualizada!';
header("Location: perfil.php");
exit;
