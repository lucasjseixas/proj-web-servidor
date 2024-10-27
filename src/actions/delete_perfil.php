<?php

include '../validator/sessao.php';

// Caso o pedido venha via GET precisa do parametro delete_perfil
if (isset($_GET['op']) && $_GET['op'] == 'delete') {

    // Inclui a conexao para o DB
    include '../database/config.php';

    // Recebe o email pela session
    $email = $_SESSION['email'];

    // Query para o DB com o pedido de delete
    $sql = "DELETE FROM `usuarios` WHERE email='$email'";
    $res = $conn->query($sql);
    // Caso bem sucedido, redireciona o usuario para index e destroi a session
    if ($res === true) {
        session_destroy();
        header("Location: /web-serv/src/index.php");
    }
    // Fecha conexao com o DB e finaliza o script
    $conn->close();
    exit;
}
