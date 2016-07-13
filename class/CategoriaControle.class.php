<?php

require_once 'Categoria.class.php';
require_once 'ProdutoControle.class.php';

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
        $result = $this->db->select("categoria", ["id", "nome"], ["id[=]" => $categoria->getId()]);
        if($result){
            $c = new Categoria();
            $c->setId($result[0]['id']);
            $c->setNome($result[0]['nome']);
            return $c;
        }
        return 0;
    }    
    
    public function listaProdutos($categoria){
        $result = $this->db->select("produto", ["id", "nome", "preco", "caminho_foto", "descricao"], ["idcategoria[=]" => $categoria->getId()]);
        $listaDeProdutos = [];
        foreach($result as $r){
            $p = new Produto();
            $p->setId($r["id"]);
            $p->setNome($r["nome"]);
            $p->setPreco($r["preco"]);
            $p->setFoto($r["caminho_foto"]);
            $p->setCategoria($categoria);
            $listaDeProdutos[] = $p;
        }
        return $listaDeProdutos;
    }
    
    public function inserir($categoria){
        return $this->db->insert("categoria", [
	"nome" => $categoria->getNome()
        ]);
    }
    
  
}


