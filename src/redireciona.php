<?php

//função para redirecionar para alguma página passando a URL por parâmetro
function redireciona(string $url) {

    header("Location: $url");
    die();
}