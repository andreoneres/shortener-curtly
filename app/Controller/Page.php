<?php

namespace App\Controller;

use App\Utils\View;

class Page {
    /**
     *  Método responsável por retornar o conteúdo (view) da página.
     *  @return string
     */
    public static function getPageTemplate($view, $params = []){
        View::renderTemplate($view, $params);
    }
    /**
     *  Método responsável por retornar o conteúdo (view) da página.
     *  @return string
     */
    public static function getPage($view, $params = []){
        View::render($view, $params);
    }
}