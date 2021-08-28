<?php

namespace App\Http;

class Request{

    /** 
     *  Método HTTP da requisição
     * @var string
     */
    private $httpMethod;

    /**
     *  URI da página
     * @var string
     */
    private $uri;
    
    /**
     *  Parâmetros da URL ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     *  Váriaveis recebidas no Método POST da página ($_POST)
     * @var array
     */
    private $postVars = [];

     /**
     *  Cabeçalho da requisição
     * @var array
     */
    private $headers = [];

    /**
     *  Router da página
     * @var array
     */
    private $router = [];

    /**
     *  Construtor da classe 
     */
    public function __construct($router){
        $this->router       = $router;
        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->setUri();
    }
    
    public function setUri(){
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        $xUri = explode('?', $uri); 
        $this->uri = $xUri[0];
    }
   
    /** 
     *  Método responsável por retornar o router
     *   @return object
     */
    public function getRouter(){
        return $this->router;
    }
    /** 
     *  Método responsável por retornar o metodo HTTP da requisição
     *   @return string
     */
    public function getHttpMethod(){
        return $this->httpMethod;
    }

    /** 
     *  Método responsável por retornar a uri da requisição
     *   @return string
     */
    public function getUri(){
        return $this->uri;
    }

    /** 
     *  Método responsável por retornar os Headers da requisição
     *   @return string
     */
    public function getHeaders(){
        return $this->headers;
    }

     /** 
     *  Método responsável por retornar os parâmetros da URL($_GET) da requisição
     *   @return array
     */
    public function getQueryParams(){
        return $this->queryParams;
    }

    /** 
     *  Método responsável por retornar os parãmetros POST($_POST) da requisição
     *   @return array
     */
    public function getPostVars(){
        return $this->sanitize();
    }
    

    /**
     * Método responsável por limpar os dados do post, evitando injection
     * @param   array
     */
    public function sanitize() {

            foreach($this->postVars as $key => $value) {
                
                $cleanValue = $value;
                if(isset($cleanValue)) {
                    $cleanValue = strip_tags(trim($cleanValue));
                    $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);
                    $cleanValue = html_entity_decode($cleanValue, ENT_NOQUOTES, 'UTF-8');
                }

                $this->postVars[$key] = $cleanValue;
        }
        return $this->postVars;
    }
}