<?php

namespace App\Controller;

use App\Controller\Page;
use App\Controller\Links;
use App\Utils\Utils;

class Main extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getMain($post = null) { 
        
       $data = Links::validateLink($post);
       //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPage('pages/main', $data);
    }
}