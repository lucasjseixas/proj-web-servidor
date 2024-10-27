<?php

// salva o path para o diretório do arquivo
$path = "C:/xampp/htdocs/web-serv/src/views/";
$diretorio = dir($path);

// Realiza a renderização do HTML para a tabela
print "<table class='table table-hover' style='width:50%'>";
print "<thead><tr><th>Arquivo</th><th>Data de Modificação</th><th>Tamanho</th><th>Ações</th></tr></thead>";
print "<tbody>";

// Loop de leitura do diretório de arquivos e impressão da tabela
while (false !== ($arquivo = $diretorio->read())) {
    if ($arquivo != "." && $arquivo != "..") {
        $filePath = $path . $arquivo;  // Caminho completo para o arquivo
        $relativePath = "/web-serv/src/views/" . $arquivo;  // Caminho relativo para o link

        // Obtém a data de modificação e o tamanho do arquivo
        $fileModificationTime = date("d/m/Y H:i:s", filemtime($filePath));  // Data de modificação formatada
        $fileSize = filesize($filePath);  // Tamanho do arquivo em bytes

        // Exibe o arquivo, data de modificação e tamanho na tabela
        print "<tr class='table-primary'>";
        print "<td><a href='" . $relativePath . "'>" . $arquivo . "</a></td>";
        print "<td>" . $fileModificationTime . "</td>";
        print "<td>" . number_format($fileSize / 1024, 2) . " KB</td>";  // Tamanho em KB com 2 casas decimais
        print "</tr>";
    }
}

print "</tbody></table>";

// Fecha o diretório
$diretorio->close();
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/boostrap-icons/font/bootstrap-icons.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Projeto Web - SUCESSO</title>
</head>

<body>
    <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"></div>
        <div class="card-body">
            <h4 class="card-title">DEU BOM</h4>
        </div>
    </div>

    <script src="./perfil.js"></script>
</body>

</html>