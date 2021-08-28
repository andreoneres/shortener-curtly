<?php

namespace App\Controller;

use App\Controller\Page;
use App\Models\Links;
use App\Utils\Utils;

class Home extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getHome($post = null) { 
        
      
       //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPageTemplate('manager/home', $_SESSION['USER']);
    }
}