<?php

include 'medoo.php';

class config{
    private $database;
    private $host;
    private $usuario;
    private $senha;
    private $mysqlDB;
    
    public function __construct(){
        $this->database = "aluno_bread";
        $this->host = "localhost";
        $this->usuario = "aluno";
        $this->senha = "aluno";
    }
    
    public function mysqlConnect(){
        $this->mysqlDB = new medoo([
            'database_type' => 'mysql',
            'database_name' => $this->database,
            'server' => $this->host,
            'username' => $this->usuario,
            'password' => $this->senha,
            'charset' => 'utf8'
        ]);
        return $this->mysqlDB;
    }
    
    
}