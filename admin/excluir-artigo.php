<?php

include '../config.php';
include '../src/artigo.php';
include '../src/redireciona.php';

//só fazer se a requisição for via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //instanciar a classe passando como param os dados do mysql (construtora)
    $artigo = new Artigo($mysql);
    //executar o método passando como parâmetro o id enviado via POST
    $artigo->excluirArtigo($_POST['id']);

    redireciona('/blog/admin/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Excluir Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o artigo?</h1>
        <form method="post" action="excluir-artigo.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>