<?php

include '../validator/sessao.php';

// Define o caminho do diretório de arquivos
$target_dir = "E:/xampp/htdocs/web-serv/src/views/";

// Verifica se há arquivo para ser uploadeado
if (!isset($_FILES['uploadFile']) || $_FILES['uploadFile']['error'] == UPLOAD_ERR_NO_FILE) {
    $_SESSION['alert'] = 'error';
    $_SESSION['msg'] = "Nenhum arquivo selecionado para upload";
    header("Location: ./perfil.php");
    exit;
}

// Simples sanitização do nome do arquivo
$target_file = $target_dir . basename($_FILES['uploadFile']['name']);

// Checa se o arquivo já existe no diretorio
if (file_exists($target_file)) {
    $_SESSION['alert'] = 'error';
    $_SESSION['msg'] = "Arquivo já existente";
    echo 'Erro, arquivo já existente';
} else {
    // Realiza a movimentação do arquivo do diretorio temporario para o diretorio de arquivos e redireciona para o perfil em caso de sucesso
    if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_file)) {
        $_SESSION['alert'] = 'success';
        $_SESSION['msg'] = "Upload de arquivo bem sucedido";
        header("Location: perfil.php");
    } else {
        echo 'Problema na movimentação do arquivo';
    }
}
