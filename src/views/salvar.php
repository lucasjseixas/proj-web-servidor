<?php
// Verifica se o conteúdo da textarea name=`textArea` foi enviado
// Essa condição irá evitar erros

include '../validator/sessao.php';

if (isset($_POST["textArea"]) && isset($_POST['docName'])) {

    $docName = $_POST['docName'];

    // Captura o conteúdo enviado
    $ccs = $_POST["textArea"];

    // Abre o arquivo com o modo a+
    // Esse modo permite abrir o arquivo
    // tanto para o modo de leitura, quanto
    // para o modo de escrita, além de colocar
    // o ponteiro no final do arquivo.

    // Define o caminho completo do diretório do usuário
    $userId = $_SESSION['id'];
    $userDir = __DIR__ . "/../uploads/$userId/";

    // Verifica se a pasta do usuário existe, caso contrário, cria
    if (!is_dir($userDir)) {
        mkdir($userDir, 0755, true);
    }

    if (pathinfo($docName, PATHINFO_EXTENSION) !== 'txt') {
        $filename = $userDir . $docName . ".txt";
    } else {
        $filename = $userDir . $docName; // Se já tem .txt, somente usa o nome do arquivo
    }

    $file = fopen($filename, "w");

    // Escreve o conteúdo enviado e adiciona
    // uma quebra de linha no arquivo.
    fwrite($file, $ccs);
    fwrite($file, PHP_EOL);

    // Flusha a stream de output
    fflush($file);

    // Fecha o arquivo 
    fclose($file);

    // Retorna para a index
    $_SESSION['alert'] = 'success';
    $_SESSION['msg'] = 'Arquivo Salvo com sucesso!';
    header("Location: ./perfil.php");

    exit;
}
