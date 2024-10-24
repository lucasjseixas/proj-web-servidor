<?php
include "./salvar.php";

$conteudo = ""; // Inicializa como vazio
$isEditing = false; // Flag para verificar se estamos editando um arquivo

// Verifica se o botão de editar foi pressionado
if (isset($_GET['op']) && $_GET['op'] == 'edit' && isset($_GET['filename'])) {
    $filename = basename($_GET['filename']); // basename evita injeção de caminho

    // Verifica se o arquivo possui extensão .txt
    if (pathinfo($filename, PATHINFO_EXTENSION) == 'txt') {
        // Verifica se o arquivo existe
        if (file_exists($filename)) {
            $conteudo = file_get_contents($filename); // Carrega o conteúdo do arquivo
            $isEditing = true; // Define a flag como true, indicando que estamos editando
        } else {
            echo "Arquivo não encontrado para edição";
        }
    } else {
        echo "Operação não permitida. Apenas arquivos .txt podem ser EDITADOS";
    }
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
    <title>Projeto Web - Arquivo</title>
    </title>
</head>

<body>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" href="../index.php" aria-selected="true" role="tab">Home</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" href="./perfil.php" aria-selected="false" tabindex="-1" role="tab">Perfil</a>
        </li>
    </ul>
    <form id="formDocument" action="salvar.php" method="POST">
        <div>
            <div>
                <label for="docName" class="form-label mt-4">Nome do documento</label>
                <input type=" text" class="form-control" name="docName" placeholder="Nome do documento" value="<?php echo isset($filename) ? htmlspecialchars($filename) : ''; ?>" <?php echo $isEditing ? 'readonly' : ''; ?>" required>
            </div>
            <label for="textArea" class="form-label mt-4">Documento</label>
            <textarea class="form-control" name="textArea" id="textArea" rows="15" placeholder="Digite seu texto aqui" type="text" value="<?php echo htmlspecialchars($content); ?>"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg mt-3">Salvar </button>
    </form>
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