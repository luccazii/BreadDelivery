<?php

session_start();

include 'class/UsuarioControle.class.php';

$uc = new UsuarioControle();

$user = new Usuario();
$user->setEmail($_POST['email']);
$user->setSenha($_POST['senha']);

$vl = $uc->validarLogin($user);

if($vl){
    $idUsuario = $vl;
    $_SESSION['usuario'] = $vl;
    header('Location: index.php?logar=1');
}
else{
    header('Location: index.php?logar=0');
}