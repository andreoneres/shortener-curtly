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

        if ($post->originallink != "") {
            if (strpos($post->originallink, '.')) {
                $post->originallink = Utils::formatLink($post->originallink);
                    $data = Link::createLink($post);
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
}