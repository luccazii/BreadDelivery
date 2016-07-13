<?php
session_start();

include 'class/CategoriaControle.class.php';
include 'class/UsuarioControle.class.php';

$uc = new UsuarioControle();

$logado = false;

if(isset($_SESSION['usuario'])){
    $logado = true;
    $user = new Usuario();
    $user->setId($_SESSION['usuario']);
}

$categoria = new Categoria();
$categoria->setId($_GET['id']);

$cc = new CategoriaControle();
$categoria = $cc->listaUm($categoria);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Todos nossa oferta de <?php echo $categoria->getNome(); ?></h1>
        <table border="3" width="100%">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações:</th>
            </tr>
        <?php
            $cc = new CategoriaControle();
            
            foreach($cc->listaProdutos($categoria) as $c){
                $id = $c->getId();
                $nome = $c->getNome();
                ?>
                <tr onclick="location.href = 'produto.php?id=<?php echo $id; ?>'">
                <?php
                echo "  <th>$id</th>";
                echo "  <th>$nome</th>";
                if($logado && $uc->isAdministrador($user)){
                    echo '<th><a href="alterarproduto.php?id='.$id.'">Editar</a> || <a href="excluirproduto.php?id='.$id.'">Excluir</a> </th>';
                }
                echo "</tr>";
            }
        ?>
        </table>
        <?php
        if($logado && $uc->isAdministrador($user)){
            echo '<br /><br /><br /><br /><h2> Administrador Options: <br /><br />';
            echo '<a href="novoproduto.php"><button>Criar novo produto</button></a>';
        }?>
    </body>
</html>
