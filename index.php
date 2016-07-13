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

if(isset($_GET['logar'])){
    if($_GET['logar']){
        echo '<span style="color: green">Logado com sucesso</span>';
    }
    elseif(!$_GET['logar']){
        echo '<span style="color: red">Erro no Login</span> ';
        echo '<a href="entrar.php">Tente novamente</a>';
    }
}
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
        <h1>Listar todos as categorias</h1>
        <table border="3" width="100%">
            <tr>
                <th>ID</th>
                <th>Categoria</th>
            </tr>
        <?php
            $cc = new CategoriaControle();
            
            foreach($cc->listaTodos() as $c){
                $id = $c->getId();
                $nome = $c->getNome();
                ?>
                <tr onclick="location.href = 'categoria.php?id=<?php echo $id; ?>'">
                <?php
                echo "  <th>#$id</th>";
                echo "  <th>$nome</th>";
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
