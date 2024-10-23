<?php

// include '/salvar.php';

if (isset($_POST["uploadFile"])) {

    // Diretório de arquivos
    $path = "C:/xampp/htdocs/web-serv/src/views";
    $file = $path . basename($_FILES["uploadFile"]);
    // $uploadOk = 1;
    if (file_exists($file) && pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
        echo "Arquivo já existente, pelo menos com essa extensão..........";
    } else {
        if (move_uploaded_file($file["tmp_name"], "$path/" . $file["name"])) {
            echo "Arquivo enviado com sucesso!";
            header("Location: /perfil.php");
        } else {
            echo "Erro, o arquivo n&atilde;o pode ser enviado.";
        }
        echo "Arquivo";
    }
} else {
    echo 'laallala';
    var_dump($_POST['uploadFile']);
}

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
// 