<?php

include 'class/AdministradorUsuarioControle.class.php';

$usuario = new Usuario();
$usuario->setId(1);

$uc = new UsuarioControle();
echo "oi " . $uc->isAdministrador($usuario);