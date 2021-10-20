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
    <script src="/assets/js/session.js"></script>
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
                                <li><a class="active-color" id="menu-tab-select"><img src="/assets/svg/menu.svg" alt=""></a></li>
                                <li><a id="account-tab-select"><img src="/assets/svg/usuario.svg" alt=""></a></li>
                                <li><a id="close"><img src="/assets/svg/fecharmenu.svg" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="menu-tab active">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/#whys">Sobre</a></li>
                                <li><a href="mailto:encurtadorcurtly@gail.com">Contato</a></li>
                            </ul>
                        </div>
                        <div class="account-tab">
                            <form id="form-login" action="javascript:login()" method="post">
                                <div class="title-menu">
                                    <h3>ENTRAR</h3>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Senha" required>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="">Lembrar login</label>
                                </div>
                                <button type="submit" id="btn-login">Acessar</button>
                            </form>
                            <div class="redirect-register">
                                <a href="cadastro">Não possue conta? Cadastre-se!</a>
                            </div>
                        </div>
                    </nav>
                    <div class="complement">
                    </div>
                </div>
            </nav>
        </div>
    </header>