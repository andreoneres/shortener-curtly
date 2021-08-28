<?php

namespace App\Controller;

use App\Controller\Page;
use App\Models\Links;
use App\Utils\Utils;

class Redirect extends Page {

    /**
     *  Método responsável por tratar as rotas que não estejam definidas no routes.
     *  @return string
     */
    public static function getLink($uri) {
        
        $url = explode("/", $uri);
    
        //VERIFICA SE O LINK EXISTE NO BANCO, CASO EXISTA, REDIRECIONA PARA O SITE
        if(Links::checkShortenedLinkExists($url[1]) == 1) {
            $originallink = Links::getOriginalLink($url[1]);
            header('Location: ' . Utils::formatLink($originallink['original_link']));
            die();
        //VERIFICA SE O LINK EXISTE NO BANCO, CASO EXISTA, REDIRECIONA PARA O SITE
        } else if(Links::checkCustomLinkExists($url[1]) == 1) { 
            $originallink = Links::getOriginalLink($url[1]);
            header('Location: ' . Utils::formatLink($originallink['original_link']));
            die();
        //VERIFICA SE O PROTOCOLO É HTTP, CASO SEJA, REDIRECIONA PARA O HTTPS
        } else if ($_SERVER["REQUEST_SCHEME"] == "http") {
            header("Location:" .URL."{$uri}" );
            die();
        } else {
            //RETORNA A VIEW DA PÁGINA DE ERRO 404
            return parent::getPageTemplate('pages/404');
        }
    }
} 