<?php

$filename = $_POST['docName'] . ".txt";

/*
 * Verifica se o conteúdo da textarea name=`textArea` foi enviado
 * Essa condição irá evitar erros
 */

if (isset($_POST["textArea"])) {

    /* Captura o conteúdo enviado */
    $ccs = $_POST["textArea"];

    /*
     * Abre o arquivo com o modo a+
     * Esse modo permite abrir o arquivo
     * tanto para o modo de leitura, quanto
     * para o modo de escrita, além de colocar
     * o ponteiro no final do arquivo.
     */
    $file = fopen($filename, "w");

    /*
     * Escreve o conteúdo enviado e adiciona
     * uma quebra de linha no arquivo.
     */
    fwrite($file, $ccs);
    fwrite($file, PHP_EOL);

    /**
     * Fecha o arquivo
     */
    fclose($file);

    /**
     * Volta para a página index.html
     */
    header("Location: ./perfil.php");
}

/* TODO baseado na aula de 17/10/24 */

//  Isso para apagar os arquivos
//  Para apagar o arquivo, usar UNLINK (delete)
//  File_exists checa se o arquivo existe
//  Botao de excluir precisa der <a></a> e no href="localhost?File='nome_do_arquivo'"
//  $_GET['File']
//  Clicar em link = $_GET

// Editar é usar o <a href='localhost?'></a>
// TinyMCE
// localhost/editar.php?file=_____&op=_____
// <? if( ) :? rightarrow

// <? endif; ? rightarrow
// <?php echo 'lalala ====> <?=  é equivalente a echo
// file_get_contents
// <textarea><?=$conteudo?
