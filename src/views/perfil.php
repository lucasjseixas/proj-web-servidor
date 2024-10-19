<?php
// Retoma a session iniciada em validation
session_start();

// Include de conexão com o DB
include '../database/config.php';

// Checa se existe a session iniciada e salva
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  // Query no DB para o email enviado
  $sql = "SELECT * FROM usuarios WHERE email='$email'";
  $res = $conn->query($sql);

  if ($res->num_rows > 0) {
    $row = $res->fetch_object();
    $userEmail = $row->email;
  } else {
    $userEmail = '';
  }
}

// Função para gerar a tabela
function gerarTabelaArquivos()
{
  // Define o caminho do diretório de arquivos
  $path = "E:/xampp/htdocs/web-serv/src/views/";
  $diretorio = dir($path);

  // Inicia a criação da tabela
  $tabela = "<div class='row justify-content-center'>";  // Adiciona uma div para centralizar a tabela
  $tabela .= "<div class='col-12 col-md-10 col-lg-8'>";  // Define uma largura máxima para a tabela
  $tabela .= "<table class='table table-hover mx-auto mt-4' style='width:100%'>";  // mx-auto centraliza a tabela
  $tabela .= "<thead><tr><th>Arquivo</th><th>Data de Modificação</th><th>Tamanho</th><th>Ações</th></tr></thead>";
  $tabela .= "<tbody>";

  // Loop de leitura do diretório de arquivos e geração das linhas da tabela
  while (false !== ($arquivo = $diretorio->read())) {
    if ($arquivo != "." && $arquivo != "..") {
      $filePath = $path . $arquivo;  // Caminho completo para o arquivo
      $relativePath = "/web-serv/src/views/" . $arquivo;  // Caminho relativo para o link

      // Obtém a data de modificação e o tamanho do arquivo
      $fileModificationTime = date("d/m/Y H:i:s", filemtime($filePath));  // Data de modificação formatada
      $fileSize = filesize($filePath);  // Tamanho do arquivo em bytes

      // Adiciona a linha à tabela
      $tabela .= "<tr class='table-primary'>";
      $tabela .= "<td><a href='" . $relativePath . "'>" . $arquivo . "</a></td>";
      $tabela .= "<td>" . $fileModificationTime . "</td>";
      $tabela .= "<td>" . number_format($fileSize / 1024, 2) . " KB</td>";  // Tamanho em KB com 2 casas decimais
      $tabela .= "<td><a href='editar.php?op=edit&filename=" . $arquivo . "' class='btn btn-warning btn-sm me-2'>EDITAR<i class='bi bi-pencil'></i></a><a href='remover.php?op=delete&filename=" . $arquivo . "' class='btn btn-danger btn-sm'>EXCLUIR<i class='bi bi-trash-fill'></td>";
      $tabela .= "</tr>";
    }
  }

  $tabela .= "</tbody></table></div></div>";

  // Fecha o diretório
  $diretorio->close();

  // Retorna a tabela gerada
  return $tabela;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/boostrap-icons/font/bootstrap-icons.css">
  <script src="../js/bootstrap.bundle.min.js"></script>
  <title>Projeto Web - Servidor - Pagina Perfil</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" href="../../src/index.php" aria-selected="true" role="tab">Home</a>
    </li>
  </ul>
  <div class="container text-center">
    <h1 class="text-primary-emphasis">PERFIL</h1>
    <form id="emailForm" action="perfil.php" method="POST">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
          <label for="email" class="form-label text-start w-100">Endereço de E-mail</label>
          <div class="d-flex align-items-center">
            <input type="email" name="email" class="form-control me-2" id="email" value="<?php print $userEmail; ?>" readonly>
            <!-- Printa no campo input o email recebido pela query no DB -->
            <button type="submit" class="btn btn-warning btn-sm me-2">EDITAR
              <i class="bi bi-pencil"></i>
            </button>
            <button type="submit" class="btn btn-danger btn-sm me-2">EXCLUIR
              <i class="bi bi-trash-fill"></i>
            </button>
          </div>
        </div>
      </div>
    </form>
    <h1 class="text-center text-primary">Serviços Oferecidos</h1>
    <div class="d-flex justify-content-center flex-wrap">
      <a href="./arquivo.php" class="btn btn-info btn-lg me-2 mt-2" style="height: 100px; width: auto; max-width: 300px; display: flex; justify-content: center; align-items: center; text-align: center;">DOCUMENT
        <i class=" bi bi-filetype-doc"></i>
      </a>
      <a href="#" class="btn btn-success btn-lg me-2 mt-2" style="height: 100px; width: auto; max-width: 300px; display: flex; justify-content: center; align-items: center; text-align: center;">SPREADSHEET
        <i class="bi bi-filetype-xls"></i>
      </a>
      <a href="#" class="btn btn-warning btn-lg me-2 mt-2" style="height: 100px; width: auto; max-width: 300px; display: flex; justify-content: center; align-items: center; text-align: center;">POWERPOINT
        <i class="bi bi-filetype-ppt"></i>
      </a>
    </div>

    <!-- Chama a função PHP para gerar a tabela e exibi-la -->
    <?php echo gerarTabelaArquivos(); ?>
  </div>

  <footer class="py-3 mt-auto">
    <div class="progress" style="height:5px">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
      </div>
    </div>
    <p class="text-center text-muted mt-3">© 2024 - L.J.A.S.</p>
  </footer>
  <script src="./perfil.js"></script>
</body>

</html>