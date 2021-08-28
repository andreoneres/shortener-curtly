<?php
$server = "http://localhost"
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/404.css">
    <script src="assets/js/main.js"></script>
    <link rel="shortcut icon" href="assets/imgs/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200&family=Roboto:wght@300&family=Roboto:wght@400&family=Roboto:wght@500&family=Roboto:wght@900&display=swap" rel="stylesheet">
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
                            <li><a href="login">Login</a></li>
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
    <section class="main" id="main">
        <div class="container">
            <div class="content-main">
                <div class="title">
                    <h1>Curtly - Encurtador<br> de URLs</h1>
                </div>
                <div class="description">
                    <p>Uma nova maneira de acessar seus links preferidos.<br>
                        Encurte e personalize o seu mundo digital como e quantas vezes quiser!</p>
                </div>
                <div class="form">
                    <form action="/" method="post">
                        <div class="form-single form-padd" id="form-1">
                            <div class="form-left">
                                <div class="icon-form"></div>
                                <input type="text" name="originalink" id="originallink" size="40" placeholder="Digite o seu link aqui..." value="<?= $originallink ?>" autocomplete="off" required>
                            </div>
                            <div class="form-right">
                                <button id="btn-1" type="submit">Encurtar</button>
                            </div>
                        </div>
                        <div class="form-single" id="form-2">
                            <div class="icon-form-perso"></div>
                            <input type="text" name="customlink" id="customlink" size="40" placeholder="Personalizar (Opcional)" autocomplete="off">
                        </div>
                        <button class="noselect" id="btn-2" type="submit">Encurtar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="whys" id="whys">
        <div class="container">
            <div class="content-whys">
                <div class="whys-title">
                    <h3>Por que usar o Curtly?</h3>
                </div>
                <div class="boxs">
                    <div class="boxs-single">
                        <div class="icon-easy">
                        </div>
                        <div class="title-box">
                            <h3>Fácil e Intuitivo</h3>
                        </div>
                        <div class="desc-box">
                            <p>Com um designer moderno e intuitivo você consegue encurtar qualquer link!</p>
                        </div>
                    </div>

                    <div class="boxs-single">
                        <div class="icon-security">
                        </div>
                        <div class="title-box">
                            <h3>Seguro</h3>
                        </div>
                        <div class="desc-box">
                            <p>Utilizamos o protocolo https com uma criptografia totalmente segura!</p>
                        </div>
                    </div>

                    <div class="boxs-single">
                        <div class="icon-free">
                        </div>
                        <div class="title-box">
                            <h3>Gratuito</h3>
                        </div>
                        <div class="desc-box">
                            <p>Você pode criar quantos links quiser sem qualquer custo!</p>
                        </div>
                    </div>

                    <div class="boxs-single">
                        <div class="icon-responsive">
                        </div>
                        <div class="title-box">
                            <h3>Responsivo</h3>
                        </div>
                        <div class="desc-box">
                            <p>Compacto e funcional em todos os tipos e tamanhos de telas existentes!</p>
                        </div>
                    </div>

                    <div class="boxs-single">
                        <div class="icon-curt">
                        </div>
                        <div class="title-box">
                            <h3>Curto</h3>
                        </div>
                        <div class="desc-box">
                            <p>Diminua o tamanho dos seus links de forma bastante expressiva!</p>
                        </div>
                    </div>
                    <div class="boxs-single">
                        <div class="icon-personal">
                        </div>
                        <div class="title-box">
                            <h3>Personalização</h3>
                        </div>
                        <div class="desc-box">
                            <p>Além dos links normais, aqui você pode personalizá-los como desejar!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (count($_POST) > 0) : ?>
        <div class="modal-alert">
            <div class="contaiiner">
                <?php if (!empty($error)) : ?>
                    <div class="topalert">
                        <div class="close-alert">
                        </div>
                        <div class="icon-error">
                        </div>
                        <div class="desc-alert">
                            <?= $error ?>
                        </div>
                    </div>
                <?php endif ?>
                <?php if (empty($error)) : ?>
                    <div class="topalert">
                        <div class="close-alert">
                        </div>
                        <div class="icon-success">
                        </div>
                        <div class="desc-alert">
                            <?= $message ?>
                        </div>
                    </div>
                    <div class="linkcopycontainer">
                        <input type="text" name="linkcopy" id="linkcopy" size="20" value="<?= URL . "/$linkshortened" ?>" readonly>
                    </div>
                    <button id="btncopy" onclick="copiarTexto()">Copiar</button>
                <?php endif ?>
            </div>
        </div>
    <?php endif ?>
    <footer class="footer" id="footer">
        <div class="copyright">Copyright 2021 © Curtly. Todos os direitos reservados.</div>
    </footer>
    <script>
        function copiarTexto() {
            var textoCopiado = document.getElementById("linkcopy");
            textoCopiado.select();
            document.execCommand("Copy");
            document.querySelector("#btncopy").innerHTML = "URL Copiada!";
        }
    </script>
</body>

</html>