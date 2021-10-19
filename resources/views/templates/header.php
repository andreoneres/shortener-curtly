<?php
$server = URL
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200&family=Roboto:wght@300&family=Roboto:wght@400&family=Roboto:wght@500&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/404.css">
    <script src="assets/js/app.js"></script>
    <script src="assets/js/events.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <title>Curtly - Encurtador de URLs</title>
</head>

<body class="body">
    <header>
        <div class="contain">
            <div class="topbar">
                <div class="map">
                    <ul class="noselect">
                        <li><a href="#main">Ir para o conteúdo [1]</a></li>
                        <li><a href="#menu">Ir para o menu [2]</a></li>
                        <li><a href="#footer">Ir para o rodapé [3]</a></li>
                    </ul>
                </div>
                <div class="accessibility">
                    <ul class="noselect">
                        <li><a href="">ACESSIBILIDADE</a></li>
                        <li>CONTRASTE</li>
                        <li id="white"></li>
                        <li id="black"></li>
                        <li id="increase"><a>A+</a></li>
                        <li id="decrease"><a>A-</a></li>
                    </ul>
                </div>
            </div>
            <nav class="menu" id="menu">
                <div class="menu-bar">
                    <div class="logo">
                    </div>
                    <div class="links">
                        <ul class="noselect">
                            <li><a href="/">Home</a></li>
                            <li><a href="/#whys">Sobre</a></li>
                            <li><a href="mailto:encurtadorcurtly@gmail.com">Contato</a></li>
                            <li><a id="btn-login" href="login">Login</a></li>
                        </ul>
                    </div>
                    <div class="menu-icon">
                        <div class="menu-mm"></div>
                        <div class="menu-mm"></div>
                        <div class="menu-mm"></div>
                    </div>
                    <nav class="menu-mobile">
                        <div class="topmenu">
                            <ul>
                                <li><a><img src="<?= $server ?>/assets/svg/menu.svg" alt=""></a></li>
                                <li><a><img src="<?= $server ?>/assets/svg/usuario.svg" alt=""></a></li>
                                <li><a id="close"><img src="<?= $server ?>/assets/svg/fecharmenu.svg" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="menu-tab">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/#whys">Sobre</a></li>
                                <li><a href="mailto:encurtadorcurtly@gail.com">Contato</a></li>
                            </ul>
                        </div>
                        <div class="account-tab">

                        </div>
                    </nav>
                    <div class="complement">
                    </div>
                </div>
            </nav>
        </div>
    </header>