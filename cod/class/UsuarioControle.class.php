<?php

include_once 'config.php';
include_once 'Usuario.class.php';

class UsuarioControle{
    
    private $db;
    
    public function __construct() {
        $cf = new config();
        $this->db = $cf->mysqlConnect();
    }
    
    public function listaUm($usuario){
        $result = $this->db->select("usuario", ["id", "nome", "cpf", "email", "telefone", "senha"], ["id[=]" => $usuario->getId()]);
        if($result){
            $p = new Usuario();
            $p->setId($result[0]['id']);
            $p->setNome($result[0]['nome']);
            $p->setNome($result[0]['cpf']);
            $p->setNome($result[0]['email']);
            $p->setNome($result[0]['telefone']);
            $p->setNome($result[0]['senha']);            
            return $p;
        }
        return 0;
    }
    
    public function inserir($usuario){
        return $this->db->insert("usuario", [
            "nome" => $usuario->getNome(),
            "sobrenome" => $usuario->getSobrenome(),
            "cpf" => $usuario->getCpf(),
            "email" => $usuario->getEmail(),
            "telefone" => $usuario->getTelefone(),
            "senha" => $usuario->getSenha()
        ]);
    }
    
    public function validarLogin($usuario){
    $result = $this->db->select("usuario", ["1"], ['AND' => ["email[=]" => $usuario->getEmail(), "senha[=]" => $usuario->getSenha()]]);
        return $result;
    }
    
    public function isAdministrador($usuario){
        $result = $this->db->select("usuario", ["administrador"], ["id[=]" => $usuario->getId()]);
        return $result[0]['administrador'];
    }
    
    public function setAdmin($usuario){
        return $usuario;
    }
    
}
