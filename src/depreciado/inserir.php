<?php

// Inicia a session
include '../validator/sessao.php';

include '../database/config.php';

// Checa se o metodo do formulario é 'POST'
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Checa se o usuário já existe no DB
    $sql = "SELECT * FROM `usuarios` WHERE email='$email' AND senha='$senha'";
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: /web-serv/src/views/perfil.php");
    } else {
        header("Location: /web-serv/src/views/registrar.php");
    }

    // Insere o novo usuário no DB
    $sql = "INSERT INTO `usuarios` (email, senha) VALUES ('{$email}','{$senha}')";
    // res true or false
    $res = $conn->query($sql);

    // Fecha a conexao com o db
    $conn->close();

    // Adicao do 'header' evita que ocorra duplicidade de envio de dados ao dar Refresh na pagina
    if ($res === TRUE) {
        $_SESSION['email'] = $email;
        // Seta o cookie para manter logado na index
        // setcookie("mailCookie", $email, time() + 3600);
        header("Location: /web-serv/src/views/perfil.php?success=true");
        exit;
    } else {
        header("Location: /web-serv/src/index.php?error=true");
        exit;
    }
}

// // Exibe uma mensagem de sucesso após o redirecionamento, se houver
// if (isset($_GET['success']) && $_GET['success'] == 'true') {
//     echo "Cadastro efetuado com sucesso!";
// }
