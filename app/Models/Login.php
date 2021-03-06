<?php

namespace App\Models;
use App\Database\Database;
use App\Utils\AppException;

class Login{

    /**
    * Método responsável por validar os dados de login
    * @param array
    * @return object
    */
    public static function validateData($post) {
        $fields = '*';
        $where = "EMAIL = '" . $post->email . "'";
        $user = (new Database('USERS'))->select($fields, $where)[0];
        
        if(!$user){
            throw new AppException('E-mail inexistente!', 200);
        } else if(!password_verify($post->password, $user['PASSWORD'])){
            throw new AppException('Senha incorreta!', 200);
        }

        self::logs($user);

        return $user;
    }
    
    public static function logs($user) {
        $values = [
            'LAST_LOGIN' => date('Y-m-d H:i:s')
        ];
        $where = "ID_USER = {$user['ID_USER']}";
        $resultado = (new Database('USERS'))->update($values, $where);

        $ip = $_SERVER['REMOTE_ADDR'];

        $values = [
            'IP' => $ip,
            'ID_USER' => $user['ID_USER'],
            'ACTION' => 'Iniciou sessão',
            'DATA' => date('Y-m-d H:i:s')
        ];
        $log = (new Database('LOGS'))->insert($values);
    }
}