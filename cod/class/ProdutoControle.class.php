<?php

require_once 'Produto.class.php';
include_once 'CategoriaControle.class.php';
include_once 'config.php';

class ProdutoControle{
    
    private $db;
    
    public function __construct() {
        $cf = new config();
        $this->db = $cf->mysqlConnect();
    }
    
    public function listaUm($produto){
        $result = $this->db->select("produto", ["id", "nome", "preco",  "descricao", "caminho_foto", "idcategoria"], ["id[=]" => $produto->getId()]);
        if($result){
            $p = new Produto();
            $p->setId($result[0]['id']);
            $p->setNome($result[0]['nome']);
            $p->setPreco($result[0]['preco']);
            $p->setDescricao($result[0]['descricao']);
            $p->setFoto($result[0]['caminho_foto']);
            if($result[0]['idcategoria']){
                $c = new Categoria();
                $c->setId($result[0]['idcategoria']);
                $cc = new CategoriaControle();
                $categoria = $cc->listaUm($c);
                $p->setCategoria($categoria);
            }        
            return $p;
        }
        return 0;
    }
    
    public function inserir($produto){
        return $this->db->insert("produto", [
	"nome" => $produto->getNome(),
	"preco" => $produto->getPreco(),
        "descricao" => $produto->getDescricao(),
        "caminho_foto" => $produto->getFoto(),    
	"idcategoria" => $produto->getCategoria()->getId()
        ]);
    }
    
    public function excluir($produto){
        return $this->db->delete("produto", ["id" => $produto->getId()]);
    }

    public function alterar($produto){
        return $this->db->update("produto", [
	"nome" => $produto->getNome(),
	"preco" => $produto->getPreco(),
        "descricao" => $produto->getDescricao(),
        "caminho_foto" => $produto->getFoto()    
//	"idcategoria" => $produto->getCategoria()->getId();
        ], [
        "id[=]" => $produto->getId()    
        ]);
    }    
  
}