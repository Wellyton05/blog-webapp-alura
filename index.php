<?php

//incluir o código do config.php aqui
require 'config.php';

//incluir o código do artigo.php aqui 
include 'src/artigo.php'; 
//instanciar classe 'artigo' passando como param para o construtor o valor de mysql (dados)
$artigo = new Artigo($mysql);
//obter o array com os dados a partir desse método 
$artigos = $artigo->exibirTodos(); 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo) : ?>
        <h2>
            <a href="artigo.php?id=<?php echo $artigo['id']; ?>">
                <?php echo $artigo ['titulo'];?>
            </a>
        </h2>
        <p>
            <?php echo nl2br($artigo ['conteudo']);?>
        </p>
        <?php endforeach ?>
    </div>
</body>

</html>