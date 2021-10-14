<main class="main" id="main">
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
                                <input type="text" name="originallink" id="originallink" size="40" placeholder="Digite o seu link aqui..." value="<?= $originallink ?>" autocomplete="off" required>
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
    </main>

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