<?php

namespace App\Controller;

use App\Controller\Page;
use App\Controller\Links;
use App\Utils\Utils;
use App\Utils\AppException;

class Main extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da main.
     *  @return string
     */
    public static function getMain($request) { 

        return parent::getPageTemplate('pages/main');
    }
}