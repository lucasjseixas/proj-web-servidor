<?php

// Define o caminho do diretório de arquivos
$target_dir = "C:/xampp/htdocs/web-serv/src/views/";

// Simples sanitização do nome do arquivo
$target_file = $target_dir . basename($_FILES['uploadFile']['name']);

// Checa se o arquivo já existe no diretorio
if (file_exists($target_file)) {
    echo 'Erro, arquivo já existente';
} else {
    // Realiza a movimentação do arquivo do diretorio temporario para o diretorio de arquivos e redireciona para o perfil em caso de sucesso
    if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_file)) {
        header("Location: perfil.php");
    } else {
        echo 'Problema na movimentação do arquivo';
    }
}
