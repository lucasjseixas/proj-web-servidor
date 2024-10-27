<?php

// Inicia session
if (!isset($SESSION)) {
    session_start();
}
// Destroi as variaveis da $_SESSION
session_destroy();

// Relocaliza o usuário para a index.php
header("Location: /web-serv/src/index.php");
