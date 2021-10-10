<?php

use App\Http\Response;
use App\Controller as Controll;

//ROTA HOME 
$obRouter->get('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function() {
        return new Response(200,Controll\Home::getHome());
    }
]);

//ROTA HOME 
$obRouter->post('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Home::getHome($post));
    }
]);