<?php

class Carrinho{
    private $id; 
    private $valorTotal;
    private $produtosPedido;
    private $cliente;
    
    public function getId() {
        return $this->id;
    }

    public function getValorTotal() {
        return $this->valorTotal;
    }

    public function getProdutosPedido() {
        return $this->produtosPedido;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setValorTotal($valorTotal) {
        $this->valorTotal = $valorTotal;
    }

    public function setProdutosPedido($produtosPedido) {
        $this->produtosPedido = $produtosPedido;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }


}