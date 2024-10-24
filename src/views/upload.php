<?php

// Define o caminho do diretório de arquivos
$target_dir = "C:/xampp/htdocs/web-serv/src/views/";

// Simples sanitização do nome do arquivo
$target_file = $target_dir . basename($_FILES['uploadFile']['name']);

// Checa se o arquivo já existe no diretorio
if (file_exists($target_file)) {
    echo 'Erro, arquivo já existente';
}

// Realiza a movimentação do arquivo do diretorio temporario para o diretorio de arquivos e redireciona para o perfil
if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_file)) {
    header("Location: perfil.php");
} else {
    echo 'Problema na movimentação do arquivo';
}

?>

TODO LIST -> Feito em 23/10/2024

// Implementação do Upload sem muitas restrições em 24/10/2024
// Futuramente adicionar if statements para bloquear outros tipos de arquivos, ou seja, deixar somente arquivos do tipo .txt

// Detalhe de implementação de upload
// $_FILES é um array
// enctype="multipart/form-data" -> necessário
// <Form></Form> -> Somente em metodo POST
// Envio de diversos arquivos: inputfile no html -> no atributo name="arquivo[]" // Também necessita atribuição de diversos arquivos
// Também tem as posições no array
// Também necessita utilizar foreach, while, for, qualquer um tipo desses para passar pelos arquivos
// Função move_uploaded_file, pega o arquivo da superglobal $_FILES (tmp_name, e deixa salvo em algum lugar com um nome tmp também)
// move_uploaded_file retorna true or false
// Deixar dentro de um 'if statement', ou seja, fazer tratamento dos dados