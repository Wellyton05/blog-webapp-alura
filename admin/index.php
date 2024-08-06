<?php

include '../config.php';
include '../src/artigo.php';

//instanciar classe puxando os dados do banco
$artigo = new Artigo($mysql);
//executar método que pega todos os artigos do banco
$artigos = $artigo->exibirTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
    <div id="container">
        <h1>Página Administrativa</h1>
        <?php foreach ($artigos as $art) : ?>
        <div>
            <div id="artigo-admin">
                <p> <?php echo $art['titulo']?></p>
                <nav>
                    <a class="botao" href="editar-artigo.php?id=<?php echo $art['id']; //editar o artigo de acordo com o id?>">Editar</a>
                    <a class="botao" href="excluir-artigo.php?id=<?php echo $art['id']; //excluir o artigo de acordo com o id?>">Excluir</a>
                </nav>
            </div>
        <?php endforeach ?>
        <a class="botao botao-block" href="adicionar-artigo.php">Adicionar Artigo</a>
    </div>
</body>

</html>