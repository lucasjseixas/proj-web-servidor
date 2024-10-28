<?php

// Inicia session
if (!isset($SESSION)) {
    session_start();
}

// Salva a mensagem de logout em $_SESSION
$_SESSION['alert'] = "success";
$_SESSION['msg'] = "Logout realizado com sucesso!";

// Abordagem sem session_destroy();, o que seria o certo, mas não consegui implementar junto com um aviso em JS
// Unseta as variaveis da $_SESSION
unset($_SESSION['email']);

// Relocaliza o usuário para a index.php
header("Location: /web-serv/src/index.php");
exit;
