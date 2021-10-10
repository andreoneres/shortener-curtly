<?php

namespace App\Models;

use App\Database\Database;
use App\Utils\Utils;
use App\Database\Pagination;

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


        if(strlen($customlink)) {
            if (self::checkLinkExists($customlink) == 1) {
                return ["error" => "Este link personalizado já existe!"];
            } 
            if (preg_match('/[^a-zA-Z0-9_-]+/', $customlink)) {
                return ["error" => "Link personalizado inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos."];
            }
            $customlink = str_replace(" ", "", trim($customlink));
        } 

        if (!preg_match('/[^a-zA-Z0-9_-]+/', $originallink)) {
            return ["error" => "Link inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos."];
        }
        
        $originallink = Utils::formatLink($originallink);
            // VERIFICA SE A URL A SER ENCURTADA É VÁLIDA
            if (Utils::validateUrl($originallink) == 1) {
                //VERIFICA SE JÁ EXISTE UM LINK ENCURTADO PARA A URL DIGITADA, CASO NÃO JÁ CRIA UM PARA O LINK
                if (self::checkLinkExists($originallink) == 1 && !strlen($customlink)) {
                    $shortenedlink = self::getShortenedLink($originallink);
                } else {
                    $shortenedlink = Utils::generateRandomString();
                    $values = [
                        'ID_USER' => $iduser, 
                        'TITLE' => $title, 
                        'ORIGINAL' => $originallink, 
                        'SHORTENED' => strlen($customlink) ? NULL : $shortenedlink, 
                        'CUSTOM' => !strlen($customlink) ? NULL : $customlink, 
                        'IP' => $ip, 
                        'CREATE_DATE' => $date];
                     //CHAMA O MÉTODO PARA INSERIR NO BANCO DE DADOS
                    $insert = (new Database("LINKS"))->insert($values);
                }
                if ($insert !== 0) {
                    $message = "Link encurtado com sucesso!";
                } else {
                    $error = "Ocorreu algum erro ao cadastrar. Contate algum administrador.";
                
                }
            } else {
                $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
            }
        
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
    public static function getLinksByUser($iduser, $post) {
        $links = (new Database("LINKS"))->select("*", "ID_USER = '{$iduser}'");

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