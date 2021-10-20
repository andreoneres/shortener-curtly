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
    public $NAME;
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
      $this->NEWPASSWORD = $post->newpassword ?? null;
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

        $email = $dbUser->select(
          'EMAIL',"EMAIL = '{$this->EMAIL}' AND ID_USER <> '{$cod}'");
        if($email){
          throw new AppException('E-mail já existe!', 409);
        }
  
        $values = $this->getValues();
        
        $where = "ID_USER = " . $cod;

        $update = $dbUser->update($values, $where);
        
        return $update;
  
      }
  
      private function getValues() {
        $arr['NAME'] = $this->NAME;
        $arr['EMAIL'] = $this->EMAIL;
        if($this->NEWPASSWORD != '') {
          $arr['PASSWORD'] = $this->NEWPASSWORD;
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