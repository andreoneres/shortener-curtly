<?php

namespace App\Models\Entities;

use App\Database\Database;
use App\Utils\AppException;

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
     /**
     * atributo da entidade
     *
     * @var string
     */
    public $IP;

    public function __construct($post) { 
      $this->NAME = $post->name ?? null;
      $this->EMAIL = $post->email ?? null;
      $this->PASSWORD = $post->password ?? null;
      $this->IP = $_SERVER['REMOTE_ADDR'];
    }

    public function createUser() {
        $user = new Database('USERS');
  
        $email = $user->select(
          'EMAIL',"EMAIL = '". $this->EMAIL . "'");
        if($email){
          throw new AppException('E-mail já existe!', 409);
        }

        $ip = $user->select(
        "COUNT(*)", "IP = '{$this->IP}'")[0];
        if($ip['COUNT'] > 3) {
          throw new AppException('Já existem 3 (três) contas registradas com esse IP!', 409);
        }

        $result = $user->insert([
          'NAME' => $this->NAME,
          'EMAIL' => $this->EMAIL,
          'PASSWORD' => $this->PASSWORD,
          'LAST_LOGIN' => date('Y-m-d'),
          'IP' => $this->IP
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