<?php

// Inicia sessao
if (!isset($_SESSION)) {
    session_start();
}

// Caso sessao nao esteja definida indica botao para index
if (!isset($_SESSION['email'])) {
    die("<head><link rel='stylesheet' href='../css/bootstrap.min.css'><link rel='stylesheet' href='../css/boostrap-icons/font/bootstrap-icons.css'></head>
    <body class='d-flex flex-column min-vh-100'><div class='container text-center'><h1>Você não está logado! Por favor, faça o login ou registre-se<br><a class='btn btn-primary mt-5' href=\"\web-serv\src\index.php\">Retornar<br><i class='bi bi-arrow-return-left'></i></a></h1></div><footer class='py-3 mt-auto'>
        <div class='progress' style='height:5px'>
            <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='95' aria-valuemin='0' aria-valuemax='100' style='width: 100%;''>
            </div>
        </div>
        <p class='text-center text-muted mt-3'>© 2024 - L.J.A.S.</p>
    </footer></body>");
}

if (isset($_SESSION['email']) && basename($_SERVER['PHP_SELF']) == 'registrar.php') {
    $_SESSION['alert'] = 'error';
    $_SESSION['msg'] = 'Você não pode registrar estando logado, rapaz!';
    header("Location: /web-serv/src/index.php");
    exit;
}
