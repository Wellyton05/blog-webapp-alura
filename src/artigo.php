<?php

class Artigo  {

    //atribuir o mysql em uma variável privada
    private $mysql;
    
    public function __construct(mysqli $mysql) {
        //função construtora para conseguir acessar o bd por essa classe
        $this->mysql = $mysql; 
    } 

    public function exibirTodos(): array {

        $resultado = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');

        //uso do método 'fecth_all(MYSQL_ASSOC)) para retornar em um array associativo e não em mysqli result
        //documentação com os métodos da classe mysqli: https://www.php.net/manual/pt_BR/class.mysqli-result.php
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC); 
        
        //retorna um array associativo
        return $artigos;
    }

    public function encontrarPorId(string $id): array {

        //consultas "preparadas" para selecionar as colunas de uma tabela e filtrar pelo ID
        $selecionaArtigo = $this->mysql->prepare('SELECT id, titulo, conteudo FROM artigos WHERE id=?'); 
        //método que vincula o 'id' com o '?'
        $selecionaArtigo->bind_param('s', $id); 
        $selecionaArtigo->execute(); //executa
        //uso dos métodos get_result(pegar o resultado da exec) e fetch_assoc(retornar um array associativo do result)
        //armazena o artigo selecionado em um array associativo para retornar
        $artigo = $selecionaArtigo->get_result()->fetch_assoc(); 

        //retorna um array associativo
        return $artigo; 
    }

    public function adicionarArtigo(string $titulo, string $conteudo) :void {
        
        //consultas "preparadas" para interir valores em uma tabela nas respectivas colunas
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?)');
        //método que vincula os valores em "?, ?" nas colunas
        $insereArtigo->bind_param('ss', $titulo, $conteudo);
        $insereArtigo->execute();
    }

    public function excluirArtigo(string $id): void {

        //consultas preparadas para deletar o conteúdo de acordo com o id
        $excluiArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        //método para vincular o "?" com o id
        $excluiArtigo->bind_param('s', $id);
        $excluiArtigo->execute();
    }

    
    public function editarArtigo(string $id, string $titulo, string $conteudo): void {
        
        //consultas preparadas para atualizar o conteúdo de uma tabela de acordo com o id
        $insereNovoArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ?
        WHERE id = ?');
        //método para vincular as atualizações em "?" nas respectivas colunas
        $insereNovoArtigo->bind_param('sss', $titulo, $conteudo, $id);
        $insereNovoArtigo->execute();
    }
}
?>