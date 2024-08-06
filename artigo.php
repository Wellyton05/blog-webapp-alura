<?php 

require 'config.php';

require 'src/artigo.php';
//instanciar a classe artigo passando os dados do mysql como param para o construtor da classe
$obj_artigo = new Artigo($mysql); 
//obter qual o artigo de acordo com o id a partir do método 
$artigo = $obj_artigo->encontrarPorId($_GET['id']);

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
        <h1>
            <?php echo $artigo ['titulo']; ?>
        </h1>
        <p>
            <?php echo nl2br($artigo ['conteudo']);?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>