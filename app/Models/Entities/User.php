<?php

namespace App\Models\Entities;

use App\Database\Database;

class User {

    /**
     * atributo da entidade
     *
     * @var string
     */
    public $NOME;
    /**
     * atributo da entidade
     *
     * @var string
     */
    public $EMAIL;
    /**
     * atributo da entidade
     *
     * @var string
     */
    public $PASSWORD;

    public function __construct($post) { 
      $this->NAME = $post->name ?? null;
      $this->EMAIL = $post->email ?? null;
      $this->PASSWORD = $post->password ?? null;
    }

    public function createUser() {
        $user = new Database('USERS');
  
        $email = $user->select(
          'EMAIL',"EMAIL = '". $this->EMAIL . "'");
        if($email){
          throw new \Exception('E-mail já existe!', 200);
        }

        $result = $user->insert([
          'NAME' => $this->NAME,
          'EMAIL' => $this->EMAIL,
          'PASSWORD' => $this->PASSWORD,
          'LAST_LOGIN' => date('Y-m-d')
        ]);
        
        return $result;
    }

    public function updateUser($cod){
       
        $dbUser = new Database('USERS');
  
        $values = $this->getValues();
        
        $where = "ID_USER = " . $cod;

        $dbUser->update($values, $where);
        
        $fields = "*";
        $where = "ID_USER = ". $cod;
        return $dbUser->select($fields, $where)[0];
  
      }
  
      private function getValues() {
        $arr['NAME'] = $this->NOME;
        $arr['LOGIN'] = $this->LOGIN;
        if($this->PASSWORD != "") {
          $arr['PASSWORD'] = $this->PASSWORD;
        }

        if($arr['PASSWORD']){
          $arr['PASSWORD'] = password_hash($arr['PASSWORD'], PASSWORD_DEFAULT);
        }
      
        return $arr;
      }
  
      public static function getAll(){
        $fields = "ID_USER, NAME, EMAIL, PASSWORD, LAST_LOGIN";
        
        $users = (new Database('USERS'))->select($fields);
  
        return $users;
  
      }

      public static function getOne($id){
  
        $fields = "ID_USER, NAME, EMAIL, PASSWORD, LAST_LOGIN";
        $where = "ID_USER = '{$id}'";
        $user = (new Database('USERS'))->select($fields, $where);
  
        return $user;
  
      }
}