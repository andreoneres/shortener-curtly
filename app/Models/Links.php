<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Utils;
use App\Database\Pagination;
use App\Utils\Session;

class Links {

    /**
     *  Método responsável por inserir o link personalizado no banco.
     *  @return array
     */
    public static function createLink($post) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = Date('Y-m-d H:i:s');

        $iduser = $post->iduser ?? NULL;
        $title = $post->title ?? NULL;
        $originallink = $post->originallink;
        $customlink = $post->customlink;

        $validate_exist_in_user = self::checkLinkExistsInUser($originallink);
        $validate_not_exist_in_user = self::checkLinkExistsNotInUser($originallink);
        $validate_exist = self::checkLinkExists($originallink);
            
                if ($validate_exist_in_user == 0 && $validate_exist == 1 && !strlen($customlink) && is_null($iduser)) {
                    $shortenedlink = self::getShortenedLinkNotUser($originallink);
                    $message = "Link encurtado com sucesso!";
                } else if($validate_exist_in_user == 1 && $validate_not_exist_in_user == 1 && !strlen($customlink) && is_null($iduser)) {
                    $shortenedlink = self::getShortenedLinkNotUser($originallink);
                    $message = "Link encurtado com sucesso!";
                } else {
                    $shortenedlink = Utils::generateRandomString();

                    $shortened = self::getShortenedLinkNotUser($originallink);
                    if(!is_null($shortened) && is_null($iduser)) {
                        $shortenedlink = NULL;
                    }
                    $values = [
                        'ID_USER' => $iduser, 
                        'TITLE' => $title, 
                        'ORIGINAL' => $originallink, 
                        'SHORTENED' => $shortenedlink, 
                        'CUSTOM' => !strlen($customlink) ? NULL : $customlink, 
                        'IP' => $ip, 
                        'CREATE_DATE' => $date];
                     //CHAMA O MÉTODO PARA INSERIR NO BANCO DE DADOS
                    $insert = (new Database("LINKS"))->insert($values);
        
                    if ($insert == 'Dados registrados com sucesso!') {
                        $message = "Link encurtado com sucesso!";
                    } else {
                        $error = "Ocorreu algum erro ao cadastrar. Contate algum administrador.";
                    
                    }
                }
            
                $log = Database::logs($iduser, 'Criou um link');

            $dados = [
                'originallink' => $originallink,
                'linkshortened' => $shortenedlink,
                'message' => $message,
                'error' => $error
            ];

        if(strlen($customlink)) {
            $dados['linkshortened'] = $customlink;
        }

        return $dados;
    }

    /**
     *  Método responsável por inserir o link personalizado no banco.
     *  @return array
     */
    public static function updateLink($post) {

        $iduser = $post->iduser;
        $idlink = $post->idlink;
        $title = $post->title;
        $originallink = $post->originallink;
        $customlink = $post->customlink;

        //VERIFICA SE CPF JÁ EXISTE NO BANCO
        $custom = (new Database("LINKS"))->select(
            'CUSTOM',
            "CUSTOM = {$idlink} AND ID_USER <> " . $iduser
        );

        if ($custom) {
            return ["error" => "Esse link personalizado já existe!"];
        }
                
        $values = [
            'TITLE' => $title, 
            'CUSTOM' => $customlink, 
            'EXPIRATION' => $post->expiration
        ];

        $where = "ID_LINK = {$idlink} AND ID_USER = '{$iduser}'";
                    
        $update = (new Database("LINKS"))->update($values, $where);
                
        if ($update !== 0) {
            $message = "Link editado com sucesso!";
        } else {
            $error = "Ocorreu algum erro ao editar. Contate algum administrador.";
                
        }

        $log = Database::logs($iduser, 'Alterou o link ' . $idlink);
        
            $dados = [
                'originallink' => $originallink,
                'message' => $message,
                'error' => $error
            ];

        return $dados;
    }

    public static function insertClick($link) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = Date('Y-m-d H:i:s');

        $where = "SHORTENED = '{$link}' OR CUSTOM = '{$link}'";
        $select = (new Database('LINKS'))->select('ID_LINK, CLICKS', $where)[0];

        $values = [
            'CLICKS' => $select['CLICKS'] + 1
        ];
        $update = (new Database('LINKS'))->update($values, $where);

        $values = [
            'ID_LINK' => $select['ID_LINK'],
            'IP' => $ip,
            'DATE' => $date
        ];
        $insert = (new Database('LINKS_CLICK'))->insert($values);

        return $insert;

    }

    public static function deleteLink($idlink, $iduser) {
        $where = "ID_LINK = {$idlink} AND ID_USER = {$iduser}";
        $delete = (new Database("LINKS"))->delete($where);
        $log = Database::logs($iduser, 'Deletou o link ' . $idlink);

        return $log;
    }

    public static function searchLink($post, $search) {
        $id = USER['ID_USER'];
        $where = "ID_USER = {$id} AND TITLE LIKE '%{$search}%' OR ORIGINAL LIKE '%{$search}%' OR SHORTENED LIKE '%{$search}%' OR CUSTOM LIKE '%{$search}%'";
        $links = (new Database("LINKS"))->select('*', $where);
        $result = self::generatePagination($post, $pagination, $links);
        var_dump($where);exit;
        return $result;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function checkLinkExists($link) {
        $fields = '*';
        $where = "ORIGINAL = '{$link}' OR SHORTENED = '{$link}' OR CUSTOM = '{$link}'";
        $result = (new Database("LINKS"))->select($fields, $where);
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function checkLinkExistsInUser($link) {
        $fields = '*';
        $where = "(ORIGINAL = '{$link}' OR SHORTENED = '{$link}' OR CUSTOM = '{$link}') AND ID_USER IS NOT NULL";
        $result = (new Database("LINKS"))->select($fields, $where);
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function checkLinkExistsNotInUser($link) {
        $fields = '*';
        $where = "(ORIGINAL = '{$link}' OR SHORTENED = '{$link}' OR CUSTOM = '{$link}') AND ID_USER IS NULL";
        $result = (new Database("LINKS"))->select($fields, $where);
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function checkLinkExistsByUser($post) {
        $fields = '*';
        $where = "ORIGINAL = '{$post->originallink}' AND ID_USER = '{$post->iduser}'";
        $result = (new Database("LINKS"))->select($fields, $where);
        return $result ? 1 : 0;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function getLinksByUser($iduser, $post) {
        $links = (new Database("LINKS"))->select("*", "ID_USER = '{$iduser}'", null, 'CREATE_DATE DESC');

        $result = self::generatePagination($post, $pagination, $links);
        return $result;
    }

    /**
     *  Método responsável por verificar se o link original recebido existe.
     *  @return int
     */
    public static function getLinkById($idlink) {
        $result = (new Database("LINKS"))->select("*", "ID_LINK = '{$idlink}'");
        return $result[0];
    }

    /**
     *  Método responsável por retornar o link original a partir do link encurtado ou personalizado.
     *  @return int
     */
    public static function getOriginalLink($link) {
        $result = (new Database("LINKS"))->select("ORIGINAL", "SHORTENED = '{$link}' OR CUSTOM = '{$link}'");
        return $result[0]["ORIGINAL"];
    }

    /**
     *  Método responsável por retornar o link encurtado a partir do link original.
     *  @return int
     */
    public static function getShortenedLink($link) {
        $result = (new Database("LINKS"))->select("SHORTENED", "ORIGINAL = '{$link}'");
        return $result[0]["SHORTENED"];
    }

    /**
     *  Método responsável por retornar o link encurtado a partir do link original.
     *  @return int
     */
    public static function getShortenedLinkNotUser($link) {
        $result = (new Database("LINKS"))->select("SHORTENED", "ORIGINAL = '{$link}' AND ID_USER IS NULL");
        return $result[0]["SHORTENED"];
    }

    /**
     *  Método responsável por retornar o link personalizado a partir do link original.
     *  @return int
     */
    public static function getCustomLink($link) {
        $result = (new Database("LINKS"))->select("CUSTOM", "ORIGINAL = '{$link}'");
        return $result[0]["CUSTOM"];
    }

    public static function generatePagination($post, &$pagination, $links)
    {
        $currentPage = $post->pagina ?? 1;

        $count = count($links);

        $pagination = new Pagination($count, $currentPage, 3);
        $limit = $pagination->getLimit(); // responsavel por pegar os items corretos das paginas
        $limite = explode(',', $limit);

        for($i = $limite[0]; $i < $limite[1] + $limite[0]; $i++ ){
            if(!is_null($links[$i])) {
                $result[] = $links[$i];
            }
        }

        return [
            'links' => $result,
            'pagination' => $pagination->getCurrentPage(),
            'totalPages' => $pagination->getTotalPage()
        ];
    }
}