<?php
session_start();

include 'class/CategoriaControle.class.php';

if(isset($_POST['nome'])){    
    
    //////////
    if(!empty($_FILES)){
        $random = rand(0, 200) . rand(0, 400) . rand(0,8);
        $destino = 'img_produtos/' . $random . $_FILES['foto']['name'];
        $arquivo_tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file( $arquivo_tmp, $destino  );
    }
    //////////
    
    
    $c2 = new Categoria();
    $c2->setId($_POST['categoria']);
    
    $p = new Produto();    
    $p->setCategoria($c2);
    $p->setNome($_POST['nome']);
    $p->setPreco($_POST['preco']);
    $p->setDescricao($_POST['descricao']);
    if(!empty($_FILES)){
        $p->setFoto($destino);
    }
    
    $pp = new ProdutoControle();

    $idpp = $pp->inserir($p);
    
    if($idpp){
        echo "#$idpp inserido com sucesso";
    }
    
}


$c = new Categoria();
$cc = new CategoriaControle();




?>

<form method="post" action="novoproduto.php" enctype="multipart/form-data">
    Nome <input type="text" name="nome"><br /><br />
    Preço <input type="number" name="preco"><br /><br />
    Descricao <input type="text" name="descricao"><br /><br />
    Categoria <select name="categoria">
        <?php foreach($cc->listaTodos() as $cat){
            echo '<option value="'. $cat->getId() .'">'.$cat->getNome().'</option>';
        }
?>
    </select><br /><br /><br /><br />
    
    <input type="file" name="foto">
    <br /><br /><br /><br />
    <input type="submit">
</form>