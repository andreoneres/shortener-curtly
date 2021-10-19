<?php

namespace App\Controller;

use App\Models as Model;
use App\Utils\Message;
use App\Utils\Session;

class Login extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) .
     *  @return string
     */
    public static function getView(){ 

        return parent::getPage('pages/login');
     
    }

    /**
    * Método responsável por checar os dados de login
    * @param array
    * @return array
    */
    public static function checkLogin($request){
        $post = $request->getPostVars();
        $user = Model\Login::validateData($post);

        if(is_array($user)) {
            Session::setUser($user);
            Message::setSuccess('Login Realizado!');
        } else {
            Message::setError($user);
        }
        return $user;
    }
}