<?php
include '../validator/validation.php';
//include '../validator/sessao.php';

session_start();
if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
    // Exibe mensagem de erro e botão para retornar ao login
    die("<head><link rel='stylesheet' href='../css/bootstrap.min.css'><link rel='stylesheet' href='../css/boostrap-icons/font/bootstrap-icons.css'></head>
    <body class='d-flex flex-column min-vh-100'><div class='container text-center'><h1>Você não pode registrar estando logado, rapaz!<br><a class='btn btn-primary mt-5' href='/web-serv/src/views/perfil.php'>Retornar<br><i class='bi bi-arrow-return-left'></i></a></h1></div><footer class='py-3 mt-auto'>
        <div class='progress' style='height:5px'>
            <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='95' aria-valuemin='0' aria-valuemax='100' style='width: 100%;''>
            </div>
        </div>
        <p class='text-center text-muted mt-3'>© 2024 - L.J.A.S.</p>
    </footer></body>");
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Projeto Web - Servidor - Registrar</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/web-serv/src/index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-secondary-emphasis" href="/web-serv/src/views/perfil.php">Perfil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['email'])): ?>
                    <form name="logout" action="./validator/logout.php" method="POST" class="d-flex">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                <?php endif; ?>
                <!-- <form name="logout" class="d-flex">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container text-center flex-grow-1">
        <h1 class="text-primary-emphasis mt-5">REGISTRAR</h1>
        <form id="emailForm" action="../validator/validation.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <label for="email" class="form-label">Endereço de E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" autocomplete="false" required>
                    <div id="emailFeedback" class="invalid-feedback" style="display: none;">
                        Por favor, insira um e-mail válido.
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" required>
                    <div id="senhaFeedback" class="invalid-feedback" style="display: none;">
                        A senha deve conter pelo menos 3 números.
                    </div>
                </div>
                <!-- <input name="algo[]" value="A"> 
                    <input name="algo[]" value="B">
                    para diversos valores diferentes em caso de uso de checkbox do usuario 
                -->
            </div>
            <!-- <input name="lembreme" class="form-check-input mt-1" type="checkbox" value="1" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault"> Lembrar-me
            </label> -->
            <!-- <div class="mt-2">
                <span>
                    <p>Ainda não tem login? <a href="#" class="text-secondary">REGISTRE-SE</a></p>
                </span>
            </div> -->
            <div class=" row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <button name="registrar" type="submit" class="btn btn-primary w-100 mt-2">Registrar</button>
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

    <!-- <div class="alert alert-dismissible alert-success text-center" style="display:none;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Oba! Usuário CADASTRADO com sucesso!</strong> <a href="#" class="alert-link"></a>.
    </div>

    <div class="alert alert-dismissible alert-success text-center" style="display:none;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Opa! Usuário LOGADO com sucesso!</strong> <a href="#" class="alert-link"></a>.
    </div>

    <div class="alert alert-dismissible alert-danger text-center" style="display:none;">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Epa! Usuário NÃO encontrado ou não cadastrado</strong> <a href="#" class="alert-link">
    </div> -->
    <script src="/web-serv/src/js/sweetalert.js"></script>
    <!-- Script de alerta de eventos: sucesso, erro ou avisos, todos dependentes das mensagens armazenadas em $_SESSION -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($_SESSION['alert']) && isset($_SESSION['msg'])): ?>
                Swal.fire({
                    icon: "<?php echo $_SESSION['alert']; ?>",
                    title: "<?php echo $_SESSION['msg']; ?>",
                    timer: 1500,
                    showConfirmButton: true
                });
                <?php unset($_SESSION['alert'], $_SESSION['msg']); ?>
            <?php endif; ?>
        });
    </script>
    <footer class="py-3 mt-auto">
        <div class="progress" style="height:5px">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
        </div>
        <p class="text-center text-muted mt-3">© 2024 - L.J.A.S.</p>
    </footer>
    <script src="registrar.js"></script>
</body>

</html>

<!-- pelo menos um formato de 3 sequencias de validacao que é: login -> validar -> acesso a App  -->