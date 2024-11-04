<?php

// include './validator/sessao.php';

// include './validator/validation.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'];

//     // Verifica se a checkbox "Lembrar-me" foi marcada
//     if (isset($_POST['lembreme'])) {
//         // Define um cookie com o email do usuário que dura 30 dias
//         setcookie('email_usuario', $email, time() + (30 * 24 * 60 * 60), "/");
//     } else {
//         // Se a checkbox não estiver marcada, o cookie é removido
//         if (isset($_COOKIE['user_email'])) {
//             setcookie('email_usuario', '', time() - 3600, "/");
//         }
//     }
// }
// // Se o cookie existir, preencha automaticamente o campo de email
// $emailSalvo = isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : '';


// Inicia sessão
session_start();



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <title>Projeto Web - Servidor - Home</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#home">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-secondary-emphasis" href="./views/perfil.php">Perfil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['email'])): ?>
                    <form name="logout" action="./validator/logout.php" method="POST" class="d-flex">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                <?php endif; ?>
                <!-- <form name="logout" action="./validator/logout.php" method="POST" class="d-flex">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container text-center flex-grow-1">
        <h1 class="text-primary-emphasis mt-5">LOGIN</h1>
        <form id="emailForm" action="./validator/validation.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <!-- <label for="email" class="form-label">Endereço de E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" autocomplete="false" required> -->
                    <label for="email" class="form-label">Endereço de E-mail</label>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="email" placeholder="Digite seu e-mail" autocomplete="false" required>
                        <label for="floatingInput">E-mail</label>
                    </div>
                    <div id="emailFeedback" class="invalid-feedback" style="display: none;">
                        Por favor, insira um e-mail válido.
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <div class="form-floating mb-3">
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" required>
                        <label for="floatingInput">Senha</label>
                    </div>
                    <div id="senhaFeedback" class="invalid-feedback" style="display: none;">
                        A senha deve conter apenas 3 dígitos.
                    </div>
                </div>
                <!-- <input name="algo[]" value="A"> 
                    <input name="algo[]" value="B">
                    para diversos valores diferentes em caso de uso de checkbox do usuario 
                -->
            </div>
            <input name="lembreme" class="form-check-input mt-1" type="checkbox" value="1" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault"> Lembrar-me
            </label>
            <div class="mt-2">
                <span>
                    <p>Ainda não tem login? <a href="./views/registrar.php" class="text-secondary">REGISTRE-SE</a></p>
                </span>
            </div>
            <div class=" row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <button name="login" type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                </div>
            </div>
            <div class=" row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <p></p>
                </div>
            </div>
        </form>
    </div>

    <!-- Necessidade de criar a lógica após a validação do usuário ou cadastro do usuário -->

    <!-- <div id="cadastroSucesso" class="alert alert-dismissible alert-success text-center" style="display:none;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Oba! Usuário CADASTRADO com sucesso!</strong> <a href="#" class="alert-link"></a>.
    </div>

    <div id="loginSucesso" class="alert alert-dismissible alert-success text-center" style="display:none;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Opa! Usuário LOGADO com sucesso!</strong> <a href="#" class="alert-link"></a>.
    </div>

    <div id="erro" class="alert alert-dismissible alert-danger text-center" style="display:none;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Epa! Usuário NÃO encontrado ou não cadastrado</strong> <a href="#" class="alert-link">
    </div> -->
    <footer class="py-3 mt-auto">
        <div class="progress" style="height:5px">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
        </div>
        <p class="text-center text-muted mt-3">© 2024 - L.J.A.S.</p>
    </footer>
    <script src="index.js"></script>
    <script src="/web-serv/src/js/sweetalert.js"></script>
    <!-- Script de alerta de eventos: sucesso, erro ou avisos, todos dependentes das mensagens armazenadas em $_SESSION -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($_SESSION['alert']) && isset($_SESSION['msg'])): ?>
                Swal.fire({
                    icon: "<?php echo $_SESSION['alert']; ?>",
                    title: "<?php echo $_SESSION['msg']; ?>",
                    timer: 3000,
                    showConfirmButton: true
                });
                <?php unset($_SESSION['alert'], $_SESSION['msg']); ?>
            <?php endif; ?>
        });
    </script>
</body>

</html>

<!-- pelo menos um formato de 3 sequencias de validacao que é: login -> validar -> acesso a App  -->