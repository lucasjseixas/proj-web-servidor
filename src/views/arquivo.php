<?php
include '../validator/sessao.php';
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

<!-- Inclusao do TinyMCE atráves do <script></script> deles, junto com a API KEY -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/boostrap-icons/font/bootstrap-icons.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/r1itgi8jcrc4gtuwz2nk31vl95mr1jbyoyl1wuxv0xaj4zu6/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                // Core editing features
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                // Your account includes a free trial of TinyMCE premium features
                // Try the most popular premium features until Nov 10, 2024:
                'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
                // Early access to document converters
                'importword', 'exportword', 'exportpdf'
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
            exportpdf_converter_options: {
                'format': 'Letter',
                'margin_top': '1in',
                'margin_right': '1in',
                'margin_bottom': '1in',
                'margin_left': '1in'
            },
            exportword_converter_options: {
                'document': {
                    'size': 'Letter'
                }
            },
            importword_converter_options: {
                'formatting': {
                    'styles': 'inline',
                    'resets': 'inline',
                    'defaults': 'inline',
                }
            },
        });
    </script>
    <title>Projeto Web - Arquivo</title>
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../src/index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="perfil.php">Perfil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                </ul>
                <form name="logout" action="/web-serv/src/validator/logout.php" method="POST" class="d-flex">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <form id="formDocument" action="salvar.php" method="POST">
        <div>
            <div>
                <label for="docName" class="form-label mt-4">Nome do documento</label>
                <input type=" text" class="form-control" name="docName" placeholder="Nome do documento" value="<?php echo isset($filename) ? htmlspecialchars($filename) : ''; ?>" <?php echo $isEditing ? 'readonly' : ''; ?>" required>
            </div>
            <label for="textArea" class="form-label mt-4">Documento</label>
            <textarea class="form-control" name="textArea" id="textArea" rows="15" placeholder="Digite seu texto aqui" type="text" value="<?php echo htmlspecialchars($content); ?>"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-lg mt-3 justify-content-center">Salvar </button>
        </div>
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