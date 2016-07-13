<?php
session_start();

include 'class/ProdutoControle.class.php';

if(isset($_POST['nome'])){  
//    print_r($_FILES); die;
    //////////
    if(!$_FILES['foto']['error']){
        $random = rand(0, 200) . rand(0, 400) . rand(0,8);
        $destino = 'img_produtos/' . $random . $_FILES['foto']['name'];
        $arquivo_tmp = $_FILES['foto']['tmp_name'];
        move_uploaded_file( $arquivo_tmp, $destino  );
    }
    //////////
      
    $p = new Produto();
    $p->setId($_POST['id']);
    $p->setNome($_POST['nome']);
    $p->setPreco($_POST['preco']);
    $p->setDescricao($_POST['descricao']);
    if(!$_FILES['foto']['error']){
        $p->setFoto($destino);
    }else{
        $p2 = new Produto();
        $p2->setId($_POST['id']);
        $pc2 = new ProdutoControle();
        $p3 = $pc2->listaUm($p2);
        $p->setFoto($p3->getFoto());
    }
    
    $pp = new ProdutoControle();

    $idpp = $pp->alterar($p);
    
    if($idpp){
        echo "#$idpp alterado com sucesso";
    }
    
}

$p = new Produto();
$p->setId($_GET['id']);
$pc = new ProdutoControle();
$p = $pc->listaUm($p);
?>

<form method="post" action="alterarproduto.php?id=<?php echo $p->getId(); ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $p->getId();  ?>"><br /><br />
    Nome <input type="text" name="nome" value="<?php echo $p->getNome();  ?>"><br /><br />
    Preço <input type="number" name="preco" value="<?php echo $p->getPreco();  ?>"><br /><br />
    Descricao <input type="text" name="descricao" value="<?php echo $p->getDescricao();  ?>"><br /><br />
<!--    Categoria <select name="categoria">
        <?php
//        foreach($cc->listaTodos() as $cat){
//            echo '<option value="'. $cat->getId() .'">'.$cat->getNome().'</option>';
//        }
?>
    </select>-->
    <br /><br /><br /><br />
    
    <input type="file" name="foto">
    <br /><br /><br /><br />
    <input type="submit">
</form>