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

//ROTA HOME 
$obRouter->post('/criarlink',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        return new Response(200,Controll\Links::createLink($request), 'application/json');
    }
]);

//ROTA HOME 
$obRouter->post('/editarlink',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        return new Response(200,Controll\Links::updateLink($request), 'application/json');
    }
]);

//ROTA HOME 
$obRouter->post('/deletarlink',[
    function($request) {
        return new Response(200,Controll\Links::deleteLink($request), 'application/json');
    }
]);

//ROTA HOME 
$obRouter->get('/link/{id}',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function(int $id) {
        return new Response(200,Controll\Links::getLinkById($id), 'application/json');
    }
]);