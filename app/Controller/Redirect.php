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
        if(Links::checkLinkExists($url[3]) == 1) {
            $originallink = Links::getOriginalLink($url[3]);
            header('Location: ' . Utils::formatLink($originallink));
            die();
        } else {
            //RETORNA A VIEW DA PÁGINA DE ERRO 404
            return parent::getPageTemplate('pages/404');
        }
    }
} 