<?php

include 'Carrinho.class.php';
include 'ProdutoCarrinho.class.php';

class CarrinhoControle{
     
    public function adicionarProdutoPedido($carrinho, $produtoCarrinho){
        
        $pp = $carrinho->getProdutosPedido();
        $pp[] = $produtoCarrinho;
        $carrinho->setProdutosPedido($pp);
        
        $pv = $carrinho->getValorTotal();
        $pv += $produtoCarrinho->getProduto()->getPreco() * $produtoCarrinho->getQuantidade();
        $carrinho->setValorTotal($pv);
        
        return $carrinho;
    } 
    
}