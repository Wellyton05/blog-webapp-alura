<?php

require '../config.php';
include '../src/artigo.php';
require '../src/redireciona.php';

    //só fazer se a requisição for via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //instanciar classe puxando os dados do banco
        $artigo = new Artigo($mysql);
        //executar método para editar os dados enviados via post
        $artigo->editarArtigo($_POST['id'], $_POST['titulo'], $_POST['conteudo']);

        redireciona('/blog/admin/index.php');
}   

$artigo = new Artigo($mysql);
//executar o método que pega o id do artigo para poder mostrar na tela
$art = $artigo->encontrarPorId($_GET['id']);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $art['titulo']; ?>" />
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo $art['titulo']; ?></textarea>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $art['id']?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>