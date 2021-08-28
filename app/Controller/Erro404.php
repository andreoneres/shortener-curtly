<?php

namespace App\Controller;

use App\Controller\Page;

class Erro404 extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da página de erro 404.
     *  @return string
     */
    public static function get404() { 
       //RETORNA A VIEW
        return parent::getPageTemplate('pages/404');
    }
}