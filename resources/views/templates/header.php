<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200&family=Roboto:wght@300&family=Roboto:wght@400&family=Roboto:wght@500&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.js" integrity="sha512-XcsV/45eM/syxTudkE8AoKK1OfxTrlFpOltc9NmHXh3HF+0ZA917G9iG6Fm7B6AzP+UeEzV8pLwnbRNPxdUpfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" href="assets/imgs/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/css/admin.css">
    <script src="assets/js/app.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <title>Gerenciador - Curtly</title>
</head>

<body class="body">

    <header class="header">
        <div class="containertop">
            <div class="topbar_arealeft">
                <div class="logo">
                </div>
                <div class="title-page">
                    <h1>Curtly - Painel</h1>
                </div>
            </div>
            <div class="topbar_arearight">
                <button class="create-link">CRIAR LINK</button>
                <!-- ÍCONE DO USUÁRIO -->
                <div class="icon_user">
                    <img src="assets/img/semfoto.jpg" alt="">
                </div>
                <div class="username">
                    <h3><?= USER['NAME'] ?></h3>
                </div>
                <div class="conf_area">
                    <!-- ÍCONE DE CONFIGURAÇÃO -->
                    <div class="icon_conf">
                    </div>
                    <ul class="conf_open">
                        <!-- <li class="conf_items">
                            <a href="#">
                                <img src="assets/svg/perfil.svg" alt="">Perfil
                            </a>
                        </li> -->
                        <li class="conf_items">
                            <a id="logout" onclick="logout()">
                                <img src="assets/svg/sair.svg" alt="">Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>