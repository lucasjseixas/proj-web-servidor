<?php

// Verifica se o conteúdo da textarea name=`textArea` foi enviado
// Essa condição irá evitar erros

if (isset($_POST["textArea"]) && isset($_POST['docName'])) {

    $docName = $_POST['docName'];

    // Captura o conteúdo enviado
    $ccs = $_POST["textArea"];

    // Abre o arquivo com o modo a+
    // Esse modo permite abrir o arquivo
    // tanto para o modo de leitura, quanto
    // para o modo de escrita, além de colocar
    // o ponteiro no final do arquivo.

    if (pathinfo($docName, PATHINFO_EXTENSION) !== 'txt') {
        $filename = $docName . ".txt";
    } else {
        $filename = $docName; // Se já tem .txt, somente usa o nome do arquivo
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
    header("Location: ./perfil.php");

    exit;
}
