<?php

namespace App\Controller;

class Logout {

    /**
     *  Método responsável por encerrar a sessão do usuário.
     *  @return string
     */
    public static function logout(){
        session_destroy();
        header('Location: ' . URL . '/login');
        exit();
    }
}