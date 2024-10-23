<?php

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
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" href="../index.php" aria-selected="true" role="tab">Home</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="./perfil.php" aria-selected="false" tabindex="-1" role="tab">Perfil</a>
        </li>
    </ul>
    <div class="container text-center flex-grow-1">
        <h1 class="text-primary-emphasis">REGISTRAR</h1>
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
                    <button type="submit" class="btn btn-primary w-100 mt-2">Registrar</button>
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

    <div class="alert alert-dismissible alert-success text-center" style="display:none;">
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
    </div>
    <footer class="py-3 mt-auto">
        <div class="progress" style="height:5px">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            </div>
        </div>
        <p class="text-center text-muted mt-3">© 2024 - L.J.A.S.</p>
    </footer>
    <script src="index.js"></script>
</body>

</html>

<!-- pelo menos um formato de 3 sequencias de validacao que é: login -> validar -> acesso a App  -->