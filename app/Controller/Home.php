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
        
        $session = Session::getUser();
        $user = User::getOne($session['ID_USER'])[0];

        $links = Links::getLinksByUser($post);

        foreach($links['links'] as $key => $value){
            $links['links'][$key]['CREATE_DATE'] = date("d-m-Y H:i:s", strtotime($links['links'][$key]['CREATE_DATE']));
        }
       
        if(isset($post->idlink)) {
            $link = Links::getLinkById($post->idlink);
            $link['CREATE_DATE'] = date("d-m-Y H:i:s", strtotime($link['CREATE_DATE']));
            
            if(is_null($link['SHORTENED'])) {
                $link['SHORTENED'] = $link['CUSTOM'];
            }
        }

        if(!empty($params['search'])) {
            try {
                $links = Links::searchLink($request);
            } catch (AppException $e) {
                $links = null;
            }
        }

        //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPage('manager/home', ['user' => $user, 'links' => $links, 'details' => $link, 'post' => $post, 'params' => $params]);
    }
}
