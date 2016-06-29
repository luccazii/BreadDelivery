<?php

require 'Categoria.class.php';
require 'ProdutoControle.class.php';

class CategoriaControle{
    
    private $db;
    
    public function __construct() {
        $cf = new config();
        $this->db = $cf->mysqlConnect();
    }
    
    public function listaTodos(){
        $result = $this->db->select("categoria", ["id", "nome"]);
        $listaDeCategorias = [];
        foreach($result as $r){
            $u = new Categoria();
            $u->setId($r["id"]);
            $u->setNome($r["nome"]);
            $listaDeCategorias[] = $u;
        }
        return $listaDeCategorias;
    }    
    
    public function listaUm($categoria){
        $result = $this->db->select("categoria", ["id", "nome"], ["categoria[=]" => $categoria->getId()]);
        if($result){
            $c = new Categoria();
            $c->setId($result['id']);
            $c->setNome($result['nome']);
            return $c;
        }
        return 0;
    }    
    
    public function listaProdutos($categoria){
        $result = $this->db->select("produto", ["id", "nome", "preco"], ["categoria[=]" => $categoria->getId()]);
        $listaDeProdutos = [];
        foreach($result as $r){
            $p = new Produto();
            $p->setId($r["id"]);
            $p->setNome($r["nome"]);
            $p->setPreco(["preco"]);
            $p->setCategoria($categoria);
            $listaDeProdutos[] = $p;
        }
        return $listaDeProdutos;
    }
    
    
  
}


