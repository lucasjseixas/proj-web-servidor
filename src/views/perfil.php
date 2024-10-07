
<?php 
//include './database/config.php';

// Para nao haver duplicidade na entrada de dados para o db
//if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //$email = $_POST['email'];
    //$senha = md5($_POST['senha']);

    //$sql = "INSERT INTO `usuarios` (email, senha) VALUES ('{$email}','{$senha}')";
    //$res = $conn->query($sql);

    // Adicao do 'header' evita que ocorra duplicidade de envio de dados ao dar Refresh na pagina
    //if ($res === TRUE) {
        //header("Location: index.php?success=true");
        //exit;
    //} else {
      //  echo "Error:";
  //  }
//}

// Exibe uma mensagem de sucesso após o redirecionamento, se houver
//if (isset($_GET['success']) && $_GET['success'] == 'true') {
//    echo "Cadastro efetuado com sucesso!";
//}

// Fecha a conexao com o db
//$conn->close();
