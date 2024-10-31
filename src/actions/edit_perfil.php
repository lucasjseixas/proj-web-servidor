<?php

include '../validator/sessao.php';

if (isset($_GET['op']) && $_GET['op'] == 'edit') {

    // Inclui a conexao para o DB
    include '../database/config.php';

    // Recebe o email pela session
    $email = $_SESSION['email'];

    // Recebe o novo email da requisição POST
    $novoemail = htmlspecialchars($_POST['email']);

    // Procura no DB se o email do usuário existe
    $sql = "SELECT * from `usuarios` WHERE email='$novoemail' AND email != '$email'";
    $res = $conn->query($sql);

    // Caso o resultado seja negativo, executa o procedimento de inserção no DB
    if ($res->num_rows === 0) {
        // Query para o DB com UPDATE onde o WHERE é igual ao email
        $sql = "UPDATE `usuarios` SET email='$novoemail' WHERE email='$email'";
        $res = $conn->query($sql);
        // Caso bem sucedido, redireciona o usuario de volta ao perfil e atualiza a session
        if ($res === true) {
            $_SESSION['email'] = $novoemail;
            $_SESSION['alert'] = 'success';
            $_SESSION['msg'] = 'Email alterado com sucesso!';

            header("Location: /web-serv/src/views/perfil.php");
        } else {
            // Caso ocorra um erro, define uma mensagem de erro
            $_SESSION['alert'] = 'error';
            $_SESSION['msg'] = 'Erro ao atualizar o email!';
            header("Location: /web-serv/src/views/perfil.php");
        }
    } else {
        $_SESSION['alert'] = 'error';
        $_SESSION['msg'] = 'Email já existente!';
        header("Location: /web-serv/src/views/perfil.php");
    }

    // Fecha conexao com o DB e finaliza o script
    $conn->close();
    exit;
}
