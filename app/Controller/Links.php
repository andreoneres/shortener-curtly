<?php

namespace App\Controller;

use App\Controller\Page;
use App\Utils\Utils;

class Links extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getView($post = null) { 
        
      
       //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPageTemplate('manager/links', $_SESSION['USER']);
    }
}