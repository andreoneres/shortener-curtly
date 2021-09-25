<?php

use App\Http\Response;
use App\Controller as Controll;

//ROTA HOME 
$obRouter->get('/',[
    function() {
        return new Response(200,Controll\Main::getMain());
    }
]);

//ROTA HOME 
$obRouter->post('/',[
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Main::getMain($post));
    }
]);

//ROTA HOME 
$obRouter->get('/404',[
    function() {
        return new Response(200,Controll\Erro404::get404());
    }
]);

//ROTA HOME 
$obRouter->get('/home',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function() {
        return new Response(200,Controll\Home::getHome());
    }
]);

// ROTA LOGOUT
$obRouter->get('/logout',[
    function () {
        return new Response(200,Controll\Logout::logout());
    }
]);


//ROTA LINKS 
$obRouter->get('/links',[
    'middlewares' =>[
        'authenticatedUser',
    ],
    function() {
        return new Response(200,Controll\Links::getView());
    }
]);

//ROTA HOME 
$obRouter->post('/login',[
    function($request) {
        return new Response(200,Controll\Login::checkLogin($request));
    }
]);

//ROTA HOME 
$obRouter->get('/login',[
    function() {
        return new Response(200,Controll\Login::getView());
    }
]);


//ROTA DINÂMICA
$obRouter->get('/page/{idPage}/{action}',[
    function($idPage, $action){
        return new Response(200, 'Page' . $idPage. ' - ' . $action);
    }
]);