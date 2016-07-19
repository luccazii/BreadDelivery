<?php

class Produto{
    private $nome;
    private $categoria;
    private $preco;
    
    public function getNome() {
        return $this->nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

   
}