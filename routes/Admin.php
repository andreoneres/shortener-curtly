<?php

use App\Http\Response;
use App\Controller as Controll;

//ROTA HOME 
$obRouter->get('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function() {
        return new Response(200,Controll\Home::getHome(), 'text/html');
    }
]);

//ROTA HOME 
$obRouter->post('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Home::getHome($post), 'text/html');
    }
]);

//ROTA HOME 
$obRouter->post('/criarlink',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Links::createLink($post), 'application/json');
    }
]);

//ROTA HOME 
$obRouter->post('/editarlink',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Links::updateLink($post), 'application/json');
    }
]);

//ROTA HOME 
$obRouter->post('/deletarlink',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Links::deleteLink($post), 'application/json');
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