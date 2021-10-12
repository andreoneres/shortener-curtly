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
        $post->originallink = Utils::formatLink($post->originallink);

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

        if ($post->originallink != "" || strpos($post->originallink, '.') || Utils::validateUrl($post->originallink) == 1) {
                $data = 1;
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

    public static function createLink($request) {
        $post = $request->getPostVars();
        $validate = self::validateLink($post);

        if($validate == 1) {
            $data = Link::createLink($post);
        }

        return $data;
    }

    public static function updateLink($request) {
        $post = $request->getPostVars();

        if(strlen($post->customlink)) {
            if (preg_match('/[^a-zA-Z0-9_-]+/', $post->customlink)) {
                return ["error" => "Link personalizado inválido. Apenas caracteres de <b>a</b> a <b>z</b>, <b>0</b> a <b>9</b>, e <b>-</b> são permitidos."];
            }

            $post->customlink = str_replace(" ", "", trim($post->customlink));
        } 
        
        $data = Link::updateLink($post);

        return $data;
    }

    public static function deleteLink($request) {
        $post = $request->getPostVars();

        $iduser = $post->iduser;
        $idlink = $post->idlink;
        $data = Link::deleteLink($idlink, $iduser);

        return $data;
    }

    public static function insertClick($link) {

        $data = Link::insertClick($link);
    }

    public static function searchLink($request) {
        $params = $request->getQueryParams();
        $post = $request->getPostVars();

        $data = Link::searchLink($post, $params['search']);

        return $data;
    }

    public static function getLinkById($idlink) {
        $result = Link::getLinkById($idlink);
        return $result;
    }
}