<?php

require 'AdministradorUsuario.class.php';
include 'config.php';

class AdministradorUsuarioControle{
    
    private $db;
    
    public function __construct() {
        $cf = new config();
        $this->db = $cf->mysqlConnect();
    }
    
    public function listaTodos(){
        $result = $this->db->select("usuario", ["id", "nome", "sobrenome", "telefone", "cpf", "email"], ["administrador[=]" => 1]);
        $listaDeAdministradores = [];
        foreach($result as $r){
            $u = new AdminstradorUsuario();
            $u->setId($r["id"]);
            $u->setNome($r["nome"]);
            $u->setSobrenome($r["sobrenome"]);
            $u->setTelefone($r["telefone"]);
            $u->setCpf($r["cpf"]);
            $u->setEmail($r["email"]);
        }
    }
}
