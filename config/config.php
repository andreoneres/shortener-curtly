<?php

require_once(realpath(dirname(__FILE__, 2) . '/vendor/autoload.php'));

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");  

error_reporting(E_ALL);
ini_set('display_errors', 'Off');

define('TEMPLATE_PATH', realpath(dirname(__FILE__,2). '/resources/views/templates'));
define('USER', $_SESSION['USER']);

use App\Utils\Environment;
use App\Database\Database;

//CARREGA VÁRIAVEIS DE AMBIENTE
$envPath = realpath(dirname(__FILE__,2));
Environment::load($envPath);

define('URL','http://www.encurtador.com');

Database::config(
  getenv('DB_HOST'),
  getenv('DB_NAME'),
  getenv('DB_USER'),
  getenv('DB_PASSWORD'),
);


