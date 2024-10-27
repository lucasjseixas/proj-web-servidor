<?php

// Inicia checagem da sessao
include '../validator/sessao.php';
include './salvar.php';

$content = ""; // Inicializa como vazio
$isEditing = false; // Flag para verificar se estamos editando um arquivo

// Verifica se o botão de editar foi pressionado
if (isset($_GET['op']) && $_GET['op'] == 'edit' && isset($_GET['filename'])) {
    $filename = basename($_GET['filename']); // basename evita injeção de caminho

    // Verifica se o arquivo possui extensão .txt
    if (pathinfo($filename, PATHINFO_EXTENSION) == 'txt') {
        // Verifica se o arquivo existe
        if (file_exists($filename)) {
            $content = file_get_contents($filename); // Carrega o conteúdo do arquivo
            $isEditing = true; // Define a flag como true, indicando que estamos editando
        } else {
            echo "Arquivo não encontrado para edição";
            exit; // Encerra o script caso o arquivo não exista
        }
    } else {
        echo "Operação não permitida. Apenas arquivos .txt podem ser EDITADOS";
        exit; // Encerra o script caso a extensão não seja permitida
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons/font/bootstrap-icons.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Projeto Web - Editar Documento</title>
</head>

<body>
    <form id="formDocument" action="salvar.php" method="POST">
        <div>
            <label for="docName" class="form-label mt-4">Nome do documento</label>
            <input type="text" class="form-control" name="docName" id="docName" value="<?php echo isset($filename) ? $filename : ''; ?>" <?php echo $isEditing ? 'readonly' : ''; ?>>
        </div>
        <label for="textArea" class="form-label mt-4">Documento</label>
        <textarea class="form-control" name="textArea" id="textArea" rows="15" placeholder="Digite seu texto aqui"><?php echo htmlspecialchars($content); ?></textarea>
        <button type="submit" class="btn btn-primary btn-lg mt-3">Salvar</button>
    </form>
</body>

</html>