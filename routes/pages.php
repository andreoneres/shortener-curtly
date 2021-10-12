<?php

use App\Http\Response;
use App\Controller as Controll;

include('Admin.php');
include('Main.php');

//ROTA DINÂMICA
$obRouter->get('/page/{idPage}/{action}',[
    function($idPage, $action){
        return new Response(200, 'Page' . $idPage. ' - ' . $action);
    }
]);