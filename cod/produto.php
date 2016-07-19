<?php

include 'class/ProdutoControle.class.php';
include 'class/UsuarioControle.class.php';

$produto = new Produto();
$produto->setId($_GET['id']);

$pc = new ProdutoControle();

$produto = $pc->listaUm($produto);

$uc = new UsuarioControle();

$logado = false;

if(isset($_SESSION['usuario'])){
    $logado = true;
    $user = new Usuario();
    $user->setId($_SESSION['usuario']);
}
?>
<center>
    <table border="2">
        <tr>
            <td><h1><center><?php echo $produto->getNome(); ?></center></h1></td>
        </tr>
        <tr>
            <td width="300px" height="300px"><img src="<?php echo $produto->getFoto();?>"</td>
        </tr
        <tr>
            <td><center>R$ <?php echo $produto->getPreco(); ?></center></td>
        </tr>
        <tr>
            <td><center><?php echo $produto->getDescricao(); ?></center></td>
        </tr>

    </table>
</center>