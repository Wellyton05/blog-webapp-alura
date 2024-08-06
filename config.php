<?php

    //conexão com o banco de dados (via phpmyadmin pois é local)
    $mysql = new mysqli('localhost', 'root', 'wvinter123', 'blog'); 
    $mysql->set_charset('utf8');

    //$mysql->query('SELECT id, titulo, conteudo FROM artigos');

    //condição para exibir um erro caso a conexão com o bd falhe
    if ($mysql == FALSE) {echo 'Erro na conexão! ';};

?>