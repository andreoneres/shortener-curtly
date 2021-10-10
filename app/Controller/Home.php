<?php

namespace App\Controller;

use App\Controller\Page;
use App\Models\Links;
use App\Database\Pagination;
use App\Utils\Session;


class Home extends Page
{

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getHome($post = null)
    {
        $user = Session::getUser();
        $links = Links::getLinksByUser($user['ID_USER'], $post);
       
        if(!is_null($post)) {
            $link = Links::getLinkById($post->idlink);
            if(is_null($link['SHORTENED'])) {
                $link['SHORTENED'] = $link['CUSTOM'];
            }
        }
  
        //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPageTemplate('manager/home', ['user' => $user, 'links' => $links, 'details' => $link, 'post' => $post]);
    }
}
