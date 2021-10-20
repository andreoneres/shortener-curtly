<?php

namespace App\Controller;

use App\Utils\Message;

class Register extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da página de registro.
     *  @return string
     */
    public static function getView(){ 
                   
        $message = Message::getMessage();
        
        return parent::getPage('pages/register', $message);
     
    }
}