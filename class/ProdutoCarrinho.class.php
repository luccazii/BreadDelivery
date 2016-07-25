<?php

class ProdutoCarrinho{
    private $quantidade;
    private $produto;
    
    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }


}