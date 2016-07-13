<?php

class Produto{
    private $id;
    private $nome;
    private $categoria;
    private $preco;
    private $descricao;
    private $foto;
    
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }



   
}