<?php

namespace App\Controller;

use App\Models\Entities as Model;
use App\Controller\Login;
use App\Utils\AppException;
use App\Utils\Session;

class User extends Page{

    /**
    * Método responsável por criar um novo usuário.
    * @param array
    * @return array
    */
    public static function createUser($request){
        
        $post = $request->getPostVars();
        
        if(strlen($post->name) > 20) {
            throw new AppException('Nome muito longo. Ele deve ter no máximo 20 caracteres', 200);
        }

        if(strlen($post->password) && strlen($post->confirmpassword)){
            if(strlen($post->password) < 6) {
                throw new AppException('Senha muito curta! Ela deve ser composta por pelo menos 6 caracteres.', 200);
            } else if($post->confirmpassword == $post->password){
                $post->password = password_hash($post->password, PASSWORD_DEFAULT);
            }else {
                throw new AppException('A senha definida não é a mesma!', 200);
            }
        } else {
            throw new AppException('Dados não preenchidos corretamente!', 200);
        }


        if(strlen($post->nome) || strlen($post->email)){
            
            $user = (new Model\User($post))->createUser();
            
            return $user;
        }else{
            throw new AppException('Dados não preenchidos corretamente!', 200);
        }   
    }

    /**
    * Método responsável por atualizar um usuário.
    * @param array
    * @return array
    */
    public static function updateUser($request){
        $user = Session::getUser();
        $post = $request->getPostVars();

        if(strlen($post->name) > 20) {
            throw new AppException('Nome muito longo. Ele deve ter no máximo 20 caracteres', 200);
        }

        if(strlen($post->newpassword) && strlen($post->confirmpassword)){
            if(strlen($post->newpassword) < 6) {
                throw new AppException('Nova senha muito curta! Ela deve ser composta por pelo menos 6 caracteres.', 200);
            } else if($post->confirmpassword == $post->newpassword){
                $post->newpassword = password_hash($post->newpassword, PASSWORD_DEFAULT);
            } else {
                throw new AppException('A nova senha definida não é a mesma!', 200);
            }
        }

        if(!password_verify($post->password, $user['PASSWORD'])){
            throw new AppException('Senha atual incorreta!', 200);
        }


        if(strlen($post->name) && strlen($post->email) && strlen($post->password)) {
            return (new Model\User($post))->updateUser($user['ID_USER']);

        }else{
            throw new AppException('Dados não preenchidos corretamente!', 200);
        } 
        
    
    }

    /**
    * Método responsável por retornar todos os usuários.
    * @return array
    */
    public static function getAll(){

        return Model\User::getAll();

    }

    /**
    * Método responsável por retornar um usuário especifico.
    * @return array
    */
    public static function getOne($cod){
        return Model\User::getOne($cod);

    }
}