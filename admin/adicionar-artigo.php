<?php

require '../config.php';
require '../src/artigo.php';
include '../src/redireciona.php';

//só fazer se a requisição for via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //instanciar classe pegando os dados do banco
    $artigo = new Artigo($mysql);
    //executar método que adiciona o que for enviado via post
    $artigo->adicionarArtigo($_POST['titulo'], $_POST['conteudo']);

    redireciona('\blog\admin\index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post"> 
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>