<?php

include '../validator/sessao.php';
// Tudo isso pelo $_GET veio atraves da URL pelo href='' pseudo botao <a></a> da pagina perfil
// Que passou a operaçao e o nome do arquivo
if (isset($_GET['op']) && $_GET['op'] == 'delete' && isset($_GET['filename'])) {
    $filename = basename($_GET['filename']); // basename evita injeção de caminho

    // Define o caminho completo do diretório do usuário
    $userId = $_SESSION['id'];
    $userDir = __DIR__ . "/../uploads/$userId/";

    // Verificação se o arquivo possui extensão .txt
    if (pathinfo($filename, PATHINFO_EXTENSION) == 'txt') {
        $filepath = $userDir . $filename;

        // Verificação se o arquivo existe antes de tentar deletar
        if (file_exists($filepath)) {
            removeFile($filepath);
        } else {
            $_SESSION['alert'] = 'error';
            $_SESSION['msg'] = 'Falha ao remover arquivo';
            header("Location: ./perfil.php");
            // echo "Arquivo não encontrado para remoção";
        }
    } elseif ((pathinfo($filename, PATHINFO_EXTENSION) == 'png') || (pathinfo($filename, PATHINFO_EXTENSION) == 'jpg') || (pathinfo($filename, PATHINFO_EXTENSION) == 'jpeg')) {
        $filepath = $userDir . $filename;
        if (file_exists($filepath)) {
            removeFile($filepath);
        } else {
            $_SESSION['alert'] = 'error';
            $_SESSION['msg'] = 'Falha ao remover arquivo';
            header("Location: ./perfil.php");
            // echo "Arquivo não encontrado para remoção";
        }
    } else {
        $_SESSION['alert'] = 'error';
        $_SESSION['msg'] = 'Operação não permitida. Apenas arquivos .txt podem ser EXCLUÍDOS';
        // echo "Operação não permitida. Apenas arquivos .txt podem ser EXCLUÍDOS";
        header("Location: ./perfil.php");
    }
}

// Funcao para remoção do arquivo
function removeFile($filepath)
{
    if (unlink($filepath)) {
        $_SESSION['alert'] = 'success';
        $_SESSION['msg'] = 'Arquivo removido com sucesso';
        header("Location: ./perfil.php");
    } else {
        $_SESSION['alert'] = 'error';
        $_SESSION['msg'] = 'Falha ao remover arquivo';
        echo "Falha ao deletar arquivo";
    }
}
