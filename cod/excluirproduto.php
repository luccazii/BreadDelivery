<?php

include 'class/ProdutoControle.class.php';

if(isset($_GET['id'])){
    $produto = new Produto();
    $produto->setId($_GET['id']);

    $pc = new ProdutoControle();
    $pc->excluir($produto);
    header("Location: index.php");
}