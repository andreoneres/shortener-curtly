<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/main.js"></script>
    <link rel="shortcut icon" href="assets/imgs/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200&family=Roboto:wght@300&family=Roboto:wght@400&family=Roboto:wght@500&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <title>Gerenciador - Curtly</title>
</head>
<body class="body">

    <header class="header">
    <div class="containertop">
        <div class="topbar_arealeft">
            <!-- ÍCONE DO MENU -->
            <div class="topbar_icon">
                <div class="mm_menu"></div>
                <div class="mm_menu"></div>
                <div class="mm_menu"></div>
            </div>
            <div class="logo">
            </div>
        </div>
        <div class="topbar_arearight">
            <!-- ÍCONE DE NOTIFICAÇÃO -->
            <div class="icon_area">
                <div class="icon_not">
                </div>
                <ul class="not_open">
                    <li class="not_items">
                        <a href="">
                            Nenhuma notificação no momento
                        </a>
                    </li>
                </ul>
            </div>
            <!-- ÍCONE DO USUÁRIO -->
            <div class="icon_user">
                <img src="assets/img/semfoto.jpg" alt="">
            </div>
            <div class="username">
                <h3><?= $params['NAME']  ?></h3>
            </div>
            <div class="conf_area">
                <!-- ÍCONE DE CONFIGURAÇÃO -->
                <div class="icon_conf">
                </div>
                <ul class="conf_open">
                    <li class="conf_items">
                        <a href="#">
                            <img src="assets/svg/perfil.svg" alt="">Perfil
                        </a>
                    </li>
                    <li class="conf_items">
                        <a href="/logout">
                            <img src="assets/svg/sair.svg" alt="">Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </header>