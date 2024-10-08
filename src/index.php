<?php
include './database/config.php';

// Para nao haver duplicidade na entrada de dados para o db
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = "INSERT INTO `usuarios` (email, senha) VALUES ('{$email}','{$senha}')";
    $res = $conn->query($sql);

    // Adicao do 'header' evita que ocorra duplicidade de envio de dados ao dar Refresh na pagina
    if ($res === TRUE) {
        header("Location: /web-serv/src/views/perfil.php?success=true");
        exit;
    } else {
        echo "Error:";
    }
}

// Exibe uma mensagem de sucesso após o redirecionamento, se houver
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo "Cadastro efetuado com sucesso!";
}

// Fecha a conexao com o db
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>
    <title>Projeto Web - Servidor</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#home" aria-selected="true" role="tab">Home</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#profile" aria-selected="false" tabindex="-1" role="tab">Perfil</a>
        </li>
    </ul>
    <div class="container text-center flex-grow-1">
        <h1 class="text-primary-emphasis">LOGIN</h1>
        <form id="emailForm" action="index.php" method="POST">
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
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
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