<?php
// include '../database/config.php';


// // Para nao haver duplicidade na entrada de dados para o DB em caso de 'refresh' da página
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     $email = $_POST['email'];
//     $senha = $_POST['senha'];

//     // Checa se o usuário já existe no DB
//     $sql = "SELECT * FROM `usuarios` WHERE email='$email' AND senha='$senha'";
//     $res = $conn->query($sql);
//     if ($res->num_rows > 0) {
//         $_SESSION['email'] = $email;
//         header("Location: /web-serv/src/views/perfil.php");
//     } else {
//         header("Location: /web-serv/src/views/registrar.php");
//     }
// }

//     // Insere o novo usuário no DB
//     $sql = "INSERT INTO `usuarios` (email, senha) VALUES ('{$email}','{$senha}')";
//     // res true or false
//     $res = $conn->query($sql);

//     // Fecha a conexao com o db
//     $conn->close();

//     // Adicao do 'header' evita que ocorra duplicidade de envio de dados ao dar Refresh na pagina
//     if ($res === TRUE) {
//         $_SESSION['email'] = $email;
//         // Seta o cookie para manter logado na index
//         // setcookie("mailCookie", $email, time() + 3600);
//         header("Location: /web-serv/src/views/perfil.php?success=true");
//         exit;
//     } else {
//         header("Location: /web-serv/src/index.php?error=true");
//     }
// }

// // Exibe uma mensagem de sucesso após o redirecionamento, se houver
// if (isset($_GET['success']) && $_GET['success'] == 'true') {
//     echo "Cadastro efetuado com sucesso!";
// }

// // Inicia a session
// session_start();

// Inclui conexao para o DB
include '../database/config.php';

// Checa o method de envio do form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Hasheia a senha
    $senha_hashed = hash('sha256', $senha);

    // Valida o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, insira um e-mail válido.";
        exit;
    }

    // Se o botao pressionado for 'login' segue a logica, caso seja 'registrar' cai no elseif
    if (isset($_POST['login'])) {

        // Checa se o usuário existe no DB
        $sql = "SELECT * FROM `usuarios` WHERE email='$email' AND senha='$senha_hashed'";
        $res = $conn->query($sql);

        // Retorno de rows com o equivalente ao usuario/senha
        if ($res->num_rows > 0) {

            // Inicia a session e seta o email da $_SESSION 
            if (!isset($_SESSION)) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['alert'] = 'success';
                $_SESSION['msg'] = 'Login realizado com sucesso!';
            }
            header("Location: /web-serv/src/views/perfil.php");
        } else {
            $_SESSION['alert'] = 'error';
            $_SESSION['msg'] = 'Usuário não encontrado, por favor registre-se';
            header("Location: /web-serv/src/views/registrar.php");
        }
    } elseif (isset($_POST['registrar'])) {

        // Tentativa de registro
        $sql = "SELECT * FROM `usuarios` WHERE email='$email'";
        $res = $conn->query($sql);

        // Caso 'usuario' nao encontrado, insere na tabela do MySQL
        if ($res->num_rows == 0) {
            $sql = "INSERT INTO `usuarios` (email, senha) VALUES ('$email', '$senha_hashed')";
            $res = $conn->query($sql);

            // Sucesso de inserção
            if ($res === TRUE) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['alert'] = 'success';
                $_SESSION['msg'] = 'Cadastro realizado com sucesso!';
                header("Location: /web-serv/src/views/perfil.php");
                exit;
            } else {
                $_SESSION['alert'] = 'error';
                $_SESSION['msg'] = 'Erro ao cadastrar usuário!';
                $error_message = "Erro ao registrar. Tente novamente.";
            }
        } else {
            $error_message = "E-mail já registrado. Por favor, faça login.";
        }
    }
}
