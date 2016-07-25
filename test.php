<?php

//include 'class/AdministradorUsuarioControle.class.php';
//
//$usuario = new Usuario();
//$usuario->setId(1);
//
//$uc = new UsuarioControle();
//echo "oi " . $uc->isAdministrador($usuario);

include 'class/CarrinhoControle.class.php';
include 'class/ProdutoControle.class.php';

$pc = new ProdutoControle();

$apple = new Produto();
$apple->setId(1);
$apple = $pc->listaUm($apple);

$banana = new Produto();
$banana->setId(2);
$banana = $pc->listaUm($banana);

$carrinho = new Carrinho();
$cc = new CarrinhoControle();

$produtoCarrinho = new ProdutoCarrinho();

$produtoCarrinho->setProduto($apple);
$produtoCarrinho->setQuantidade(3);

$carrinho = $cc->adicionarProdutoPedido($carrinho, $produtoCarrinho);

$produtoCarrinho->setProduto($banana);
$produtoCarrinho->setQuantidade(2);


$carrinho = $cc->adicionarProdutoPedido($carrinho, $produtoCarrinho);
echo '<pre>';
print_r($carrinho);