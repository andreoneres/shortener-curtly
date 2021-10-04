<main class="conteudo">
    <div class="container1">
        <div class="top">
            <div class="form-search">
                <form class="form-search-link" action="" method="get">
                    <input type="text" name="" id="search" placeholder="Buscar...">
                    <button type="submit" id="btn-search"><i></i></button>
                </form>
            </div>
            <span>4 resultados</span>
        </div>
        <div class="links">
            <div class="links-created">
                <div class="box-links">
                    <div class="link-single">
                        <div class="date-single-created">
                            <h3>10 DE ABRIL DE 2021</h3>
                        </div>
                        <div class="title-single-link">
                            <h3>Vídeo Clipe - Gabriel o Pensador</h3>
                            <img src="" alt="" srcset="">
                        </div>
                        <div class="custom-single-link">
                            <h3>curtly.ml/gabrielopensador</h3>
                        </div>
                    </div>
                    <div class="link-single">
                        <div class="date-single-created">
                            <h3>10 DE ABRIL DE 2021</h3>
                        </div>
                        <div class="title-single-link">
                            <h3>Vídeo Clipe - Gabriel o Pensador</h3>
                            <img src="" alt="" srcset="">
                        </div>
                        <div class="custom-single-link">
                            <h3>curtly.ml/gabrielopensador</h3>
                        </div>
                    </div>
                    <div class="link-single">
                        <div class="date-single-created">
                            <h3>10 DE ABRIL DE 2021</h3>
                        </div>
                        <div class="title-single-link">
                            <h3>Vídeo Clipe - Gabriel o Pensador</h3>
                            <img src="" alt="" srcset="">
                        </div>
                        <div class="custom-single-link">
                            <h3>curtly.ml/gabrielopensador</h3>
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    <span>Página 1 de 9 [1, 2, 3, 4]</span>
                </div>
            </div>
            <div class="links-details">
                <div class="links-info">
                    <div class="date-details-create">
                        <h3>Criado em 10 de abril de 2021</h3>
                    </div>
                    <div class="qrcod-details">
                        <?php
                        echo '<img src="' . (new \chillerlan\QRCode\QRCode)->render('https://youtube.com/sadasdadddddddddddddddddda') . '" alt="QR Code" />';
                        ?>
                    </div>
                    <div class="title-details-link">
                        <h3>Vídeo Clipe Gabriel o Pensador</h3>
                    </div>
                    <div class="original-details-link">
                        <h3>https://youtube.com/sadasdadddddddddddddddddda</h3>
                    </div>
                    <div class="custom-details-link">
                        <h3 id="custom-link">curtly.ml/gabrielopensador</h3>
                    </div>
                    <div class="clicks-details-link">
                        <h3>1 clique</h3>
                    </div>
                </div>
                <div class="links-buttons">
                    <button id="edit-link">Editar</button>
                    <button onclick="copyLink()">Copiar</button>
                    <button>QR Code</button>
                    <button>Deletar</button>
                </div>
            </div>
        </div>
    </div>
    <nav class="menu-create-link">
        <div class="topmenu">
            <h2 class="title"></h2>
            <a id="close"><img src="<?= $server ?>/assets/svg/fecharmenu.svg" alt=""></a>
        </div>
        <div class="menu-tab">
            <form action="">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="" id="" class="inputs" required>
                </div>
                <div class="form-group">
                    <label for="">URL Original</label>
                    <input type="text" name="" id="" class="inputs" required>
                </div>
                <div class="form-group">
                    <label for="">URL Personalizada (Opcional)</label>
                    <input type="text" name="" id="" class="inputs">
                </div>
                <div class="form-group">
                    <label for="">Expiração</label><br>
                    <input type="date" name="" id="" class="inputs">
                </div>
                <button class="btn-submit" style="outline: none;" type="submit">Encurtar</button>
            </form>
        </div>
    </nav>
</main>
<script>
  function copyLink() {
    var textCopy = document.getElementById("custom-link");
    textoCopiado.select();
    document.execCommand("Copy");
    document.querySelector("#btncopy").innerHTML = "URL Copiada!";
  }
</script>