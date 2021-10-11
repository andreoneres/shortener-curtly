<?php

use App\Http\Response;
use App\Controller as Controll;

//ROTA HOME 
$obRouter->get('/',[
    function() {
        return new Response(200,Controll\Main::getMain(), 'text/html');
    }
]);

//ROTA HOME 
$obRouter->post('/',[
    function($request) {
        $post = $request->getPostVars();
        return new Response(200,Controll\Main::getMain($post), 'text/html');
    }
]);

//ROTA HOME 
$obRouter->get('/404',[
    function() {
        return new Response(200,Controll\Erro404::get404(), 'text/html');
    }
]);

// ROTA LOGOUT
$obRouter->get('/logout',[
    function () {
        return new Response(200,Controll\Logout::logout(), 'text/html');
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
        return new Response(200,Controll\Login::getView(), 'text/html');
    }
]);

//ROTA CADASTRO 
$obRouter->post('/cadastro',[
    function($request) {
        return new Response(200,Controll\User::createUser($request), 'text/html');
    }
]);

//ROTA CADASTRO 
$obRouter->get('/cadastro',[
    function() {
        return new Response(200,Controll\Register::getView(), 'text/html');
    }
]);