<?php

namespace App\Controller;

class Logout {

    public static function logout(){
        session_destroy();
        header('Location: ' . URL);
        exit();
    }
}