<?php

namespace App\Controller;

use App\Models\Links as Link;
use App\Controller\Page;
use App\Utils\Utils;

class Links extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function validateLink($post) { 

        if(isset($post->iduser)) {
            if(Link::checkLinkExistsByUser($post) == 1) {
                return ["error" => "Este link já se encontra encurtado em sua conta!"];
            }
        }

        if(strlen($post->customlink)) {
            if (Link::checkLinkExists($post->customlink) == 1) {
                return ["error" => "Este link personalizado já existe!"];
            } 
            if (preg_match('/[^a-zA-Z0-9_-]+/', $post->customlink)) {
                return ["error" => "Link personalizado inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos."];
            }

            $post->customlink = str_replace(" ", "", trim($post->customlink));
        } 

        if (!preg_match('/[^a-zA-Z0-9_-]+/', $post->originallink)) {
            return ["error" => "Link inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos."];
        }

        if ($post->originallink != "") {
            if (strpos($post->originallink, '.')) {
                $post->originallink = Utils::formatLink($post->originallink);
                if (Utils::validateUrl($post->originallink) == 1) {
                    $data = 1;
                } else {
                    $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
                }
            } else {
                $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
            }
        } else {
            $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
        }

        if(isset($error)) {
            $data = [
                'error' => $error
            ];
        }  
    
        return $data;
    }

    public static function createLink($post) {
        $validate = self::validateLink($post);

        if($validate == 1) {
            $data = Link::createLink($post);
        }

        return $data;
    }

    public static function updateLink($post) {

        if(strlen($post->customlink)) {
            if (Link::checkLinkExists($post->customlink) == 1) {
                return ["error" => "Este link personalizado já existe!"];
            } 
            if (preg_match('/[^a-zA-Z0-9_-]+/', $post->customlink)) {
                return ["error" => "Link personalizado inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos."];
            }

            $post->customlink = str_replace(" ", "", trim($post->customlink));
        } 
        
        $data = Link::updateLink($post);

        return $data;
    }

    public static function deleteLink($post) {
        $iduser = $post->iduser;
        $idlink = $post->idlink;
        $data = Link::deleteLink($idlink, $iduser);

        return $data;
    }

    public static function getLinkById($idlink) {
        $result = Link::getLinkById($idlink);
        return $result;
    }
}