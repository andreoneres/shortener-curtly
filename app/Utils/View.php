<?php

namespace App\Utils;

class View {

    /**
     * Váriaveis padrões da view
     * @var array
     */

    private static $vars;

    /**
     *  Método responsável por definir os dados iniciais da classe
     * @param array $vars
     */
    public static function init($vars = []){
        self::$vars = $vars;
    }
    /**
     *  Método responsável por retornar o conteúdo de uma view
     * @param string $view
     * @return string
     */
    private static function getContentView($view){
        $file = __DIR__.'/../../resources/views/'. $view .'.php';
        return file_exists($file) ? $file : '';
    }

    /**
     *      Método responsável por retornar o conteúdo renderizado de uma view.
     * @param string $view
     * @param array $params 
     * @return string
     */

    public static function render($view, $params = []){
        // CONTEUDO DA VIEW
        $contentView = self::getContentView($view);
        
        //Merge de váriaveis da view
        $vars = array_merge(self::$vars, $params);

        // Pega o array e tranforma em variaveis
        if(count($params) > 0) {
            foreach($params as $key => $value) {
                if(strlen($key) > 0) {
                    ${$key} = $value;
                }
            }
        }

        //Retorna Conteúdo Renderizado
        require_once($contentView);
    }

    public static function renderTemplate($view, $params = []){
        // CONTEUDO DA VIEW
        $contentView = self::getContentView($view);
        
        // Pega o array e tranforma em variaveis
        if(count($params) > 0) {
            foreach($params['data'] as $key => $value) {
                if(strlen($key) > 0) {
                    ${$key} = $value;
                }
            }
        }

        //Retorna Conteúdo Renderizado
        require_once(TEMPLATE_PATH. '/header.php');
        require_once($contentView);
        require_once(TEMPLATE_PATH. '/footer.php');
    }
}