<?php

namespace App\Controller;

use App\Controller\Page;
use App\Controller\Links;
use App\Utils\Utils;

class Redirect extends Page {

    /**
     *  Método responsável por tratar as rotas que não estejam definidas no routes.
     *  @return string
     */
    public static function getLink($uri) {
        
        $url = explode("/", $uri);
        $link = $url[3];
        //VERIFICA SE O LINK EXISTE NO BANCO, CASO EXISTA, REDIRECIONA PARA O SITE
        if(Links::checkLinkExists($link) == 1) {
            $expiration = Links::getExpirationLink($link);
            if(!is_null($expiration) && $expiration < Date('Y-m-d')) {
                header('Location: /');
                exit;
            }
            $originallink = Links::getOriginalLink($link);
            Links::insertClick($link);
            header('Location: ' . Utils::formatLink($originallink));
            die();
        } else {
            //RETORNA A VIEW DA PÁGINA DE ERRO 404
            return parent::getPageTemplate('pages/404');
        }
    }
} 