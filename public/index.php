<?php
session_start();
require_once(realpath(dirname(__FILE__,2) . '/config/config.php'));

use \App\Http\Router;
use \App\Http\Middleware\Queue as Middleware;
use \App\Utils\View;

//DEFINE O VALOR PADRÃO DAS VARIÁVEIS

View::init([
    'USER' => $_SESSION['USER']
]);

//MAPEAMENTO DOS MIDDLEWARES
Middleware::setMap([
    'authenticatedUser' => \App\Http\Middleware\AuthenticatedUser::class,
]);

//MIDDLEWARES PADRÕES (EXECUTADOS EM TODAS AS ROTAS)
Middleware::setDefault([
    
]);

// INICIA O ROUTER
$obRouter = new Router(URL);

//INCLUDE PARA AS ROTAS
include(realpath(dirname(__FILE__, 2) . '/routes/pages.php'));

// //IMPRIME O RESPONSE DA ROTA
$obRouter->run()
         ->sendResponse();

         