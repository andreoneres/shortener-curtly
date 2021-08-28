<?php

namespace App\Controller;

use App\Models\Entities as Model;

class User{

    /**
    * Método responsável por criar um novo usuário
    * @param array
    * @return array
    */
    public static function createUser($post){
    
        if(strlen($post->senha) && strlen($post->confirmsenha)){
            if($post->confirmsenha == $post->senha){
                $post->senha = password_hash($post->senha, PASSWORD_DEFAULT);
            }else{
                throw new \Exception('A senha definida não é a mesma!', 200);
            }
        } else {
            throw new \Exception('Dados não preenchidos corretamente!', 200);
        }

        if(strlen($post->nome) || strlen($post->login) || strlen($post->grupo) || strlen($post->permissoes)){
            
            return (new Model\User($post))->createUser();
            
        }else{
            throw new \Exception('Dados não preenchidos corretamente!', 200);
        }   
    }

    /**
    * Método responsável por atualizar um usuário
    * @param array
    * @return array
    */
    public static function updateUser($post){

        if(strlen($post->cod) || strlen($post->nome) || strlen($post->login) || strlen($post->grupo) || strlen($post->ativo) || strlen($post->permissoes)) {

            $cod = $post->cod;
            unset($post->cod);
            return (new Model\User($post))->updateUser($cod);

        }else{
            throw new \Exception('Dados não preenchidos corretamente!', 200);
        } 
        
    
    }

    /**
    * Método responsável por retornar todos os usuários
    * @return array
    */
    public static function getAll(){

        return Model\User::getAll();

    }

    /**
    * Método responsável por retornar um usuário especifico
    * @return array
    */
    public static function getOne($cod){
        return Model\User::getOne($cod);

    }

}