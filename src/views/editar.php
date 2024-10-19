<?php
// Tudo isso pelo $_GET veio atraves da URL pelo href='' pseudo botao <a></a> da pagina perfil
// Que passou a operaçao e o nome do arquivo
if (isset($_GET['op']) && $_GET['op'] == 'edit' && isset($_GET['filename'])) {
    $filename = basename($_GET['filename']); // basename evita injeção de caminho

    // Verificação se o arquivo possui extensão .txt
    if (pathinfo($filename, PATHINFO_EXTENSION) == 'txt') {

        // Verificação se o arquivo existe antes de tentar deletar
        if (file_exists($filename)) {
            
        }
    }
}
