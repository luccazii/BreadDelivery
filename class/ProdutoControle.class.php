<?php

require 'Produto.class.php';
include 'CategoriaControle.class.php';
include_once 'config.php';

class ProdutoControle{
    
    private $db;
    
    public function __construct() {
        $cf = new config();
        $this->db = $cf->mysqlConnect();
    }
    
    public function listaUm($produto){
        $result = $this->db->select("produto", ["id", "nome", "preco", "idcategoria"], ["id[=]" => $produto->getId()]);
        if($result){
            $p = new Produto();
            $p->setId($result['id']);
            $p->setNome($result['nome']);
            $p->setPreco($result['preco']);
            if($result['idcategoria']){
                $c = new Categoria();
                $c->setId($result['idcategoria']);
                $cc = new CategoriaControle();
                $categoria = $cc->listaUm($c);
                $p->setCategoria($categoria);
            }        
            return $p;
        }
        return 0;
    }
    
    public function inserir($produto){
//        $last_user_id = $database->insert("account", [
//	"user_name" => "foo",
//	"email" => "foo@bar.com",
//	"age" => 25
//        ]);
    }
  
}