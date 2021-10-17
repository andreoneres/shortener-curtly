<?php

namespace App\Controller;

use App\Controller\Links;
use App\Utils\AppException;
use App\Utils\Session;


class Home extends Page
{

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getHome($request)
    {
        $post = $request->getPostVars();
        $params = $request->getQueryParams();
        
        $user = Session::getUser();
        $links = Links::getLinksByUser($user['ID_USER'], $post);

        foreach($links['links'] as $key => $value){
            $links['links'][$key]['CREATE_DATE'] = date("d-m-Y H:i:s", strtotime($links['links'][$key]['CREATE_DATE']));
        }
       
        if(!is_null($post)) {
            $link = Links::getLinkById($post->idlink);
            $link['CREATE_DATE'] = date("d-m-Y H:i:s", strtotime($link['CREATE_DATE']));
            
            if(is_null($link['SHORTENED'])) {
                $link['SHORTENED'] = $link['CUSTOM'];
            }
        }

        try {
            if(!empty($params)) {
                $links = Links::searchLink($request);
            }
        } catch (AppException $e) {
            $links = null;
        }

        //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPage('manager/home', ['user' => $user, 'links' => $links, 'details' => $link, 'post' => $post, 'params' => $params]);
    }
}
