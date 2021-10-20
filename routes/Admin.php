<?php

use App\Http\Response;
use App\Controller as Controll;

//ROTA HOME 
$obRouter->get('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        return new Response(200,Controll\Home::getHome($request), 'text/html');
    }
]);

//ROTA HOME 
$obRouter->post('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        return new Response(200,Controll\Home::getHome($request), 'text/html');
    }
]);

//ROTA CRIAR LINK
$obRouter->post('/criarlink',[
    function($request) {
        return new Response(200,Controll\Links::createLink($request), 'application/json');
    }
]);

//ROTA EDITAR LINK 
$obRouter->post('/editarlink',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        return new Response(200,Controll\Links::updateLink($request), 'application/json');
    }
]);

//ROTA EDITAR USUÁRIO
$obRouter->post('/editarusuario',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        return new Response(200,Controll\User::updateUser($request), 'application/json');
    }
]);

//ROTA DELETAR LINK
$obRouter->post('/deletarlink',[
    function($request) {
        return new Response(200,Controll\Links::deleteLink($request), 'application/json');
    }
]);

//ROTA PEGAR DADOS DE UM LINK
$obRouter->get('/link/{id}',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function(int $id) {
        return new Response(200,Controll\Links::getLinkById($id), 'application/json');
    }
]);