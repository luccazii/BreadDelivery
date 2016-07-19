<?php

require 'Usuario.class.php';

class AdminstradorUsuario extends Usuario{
    private $admin;
    
    public function __construct() {
        $this->admin = TRUE;
    }
    
    public function getAdmin() {
        return $this->admin;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }


}