<?php

include '../validator/sessao.php';
// Tudo isso pelo $_GET veio atraves da URL pelo href='' pseudo botao <a></a> da pagina perfil
// Que passou a operaçao e o nome do arquivo
if (isset($_GET['op']) && $_GET['op'] == 'delete' && isset($_GET['filename'])) {
    $filename = basename($_GET['filename']); // basename evita injeção de caminho

    // Verificação se o arquivo possui extensão .txt
    if (pathinfo($filename, PATHINFO_EXTENSION) == 'txt') {

        // Verificação se o arquivo existe antes de tentar deletar
        if (file_exists($filename)) {
            removeFile($filename);
        } else {
            $_SESSION['alert'] = 'error';
            $_SESSION['msg'] = 'Falha ao remover arquivo';
            // echo "Arquivo não encontrado para remoção";
        }
    } else {
        $_SESSION['alert'] = 'error';
        $_SESSION['msg'] = 'Operação não permitida. Apenas arquivos .txt podem ser EXCLUÍDOS';
        // echo "Operação não permitida. Apenas arquivos .txt podem ser EXCLUÍDOS";
    }
}

// Funcao para remoção do arquivo
function removeFile($filename)
{
    if (unlink($filename)) {
        $_SESSION['alert'] = 'success';
        $_SESSION['msg'] = 'Arquivo removido com sucesso';
        header("Location: ./perfil.php");
    } else {
        echo "Falha ao deletar arquivo";
    }
}
