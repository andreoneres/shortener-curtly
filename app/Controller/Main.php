<?php

namespace App\Controller;

use App\Controller\Page;
use App\Models\Links;
use App\Utils\Utils;

class Main extends Page {

    /**
     *  Método responsável por retornar o conteúdo (view) da home.
     *  @return string
     */
    public static function getMain($post = null) { 
        //VERIFICA SE A VARIÁVEL GLOBAL $_POST ESTÁ SETADA
        if (count($_POST) > 0) {
            //FILTROS 
            $linkoriginal = filter_var($post['originalink'], FILTER_SANITIZE_URL);
            $linkpersonalizado = filter_var($post['customlink'], FILTER_SANITIZE_STRING);

            if ($linkoriginal !== "") {
                if (strpos($linkoriginal, '.')) {
                    $linkoriginal = Utils::formatLink($linkoriginal);
                    if ($linkpersonalizado === "") {
                        $dados = Links::randomlink($linkoriginal);
                    } else {
                        $dados = Links::customlink($linkoriginal, $linkpersonalizado);
                    }
                } else {
                    $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
                }
            } else {
                $error = "Link inválido. Verifique a URL digitada ou se o site está online.";
            }
        }

        if(isset($error)) {
            $dados = [
                'error' => $error
            ];
        }
       //RETORNA A VIEW COM OS DADOS RECEBIDOS DO MODEL
        return parent::getPage('pages/main', ['data' => $dados]);
    }
}