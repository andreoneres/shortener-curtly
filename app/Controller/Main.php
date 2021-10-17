<?php

namespace App\Controller;

use App\Controller\Page;
use App\Controller\Links;
use App\Utils\Utils;
use App\Utils\AppException;

class Main extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getMain($request) { 

       //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPageTemplate('pages/main');
    }
}