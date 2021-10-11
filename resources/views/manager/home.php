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
                    <?php if(!is_null($links['links'])): ?>
                        <?php foreach($links['links'] as $key => $link): ?>
                            <div class="link-single" onclick="viewDetailsLink(<?= $link['ID_LINK']?>)">
                                <div class="date-single-created">
                                    <h3><?= $link['CREATE_DATE'] ?></h3>
                                </div>
                                <div class="title-single-link">
                                    <h3><?= $link['TITLE'] ?></h3>
                                    <img src="" alt="" srcset="">
                                </div>
                                <div class="custom-single-link">
                                    <h3><?= URL ?>/<?= is_null($link['SHORTENED']) ? $link['CUSTOM'] : $link['SHORTENED'] ?></h3>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <button id="btn-cr-link" class="create-link">CRIAR O SEU PRIMEIRO LINK</button>
                    <?php endif ?>  
                </div>
                <?php if(!is_null($links['links'])): ?>
                    <div class="pagination">
                        <ul class="pages">
                            <?php
                                $pagina = $post->pagina ?? 1;
                                echo "<li class='infos-pages'>Página {$pagina} de {$links['totalPages']}</li>";
                                echo "[";
                                for ($i = 1; $i <= $links['totalPages']; $i++) {
                                    echo "<li><a class='page' onclick='alterPagination({$i})'>{$i}</a></li>";
                                }
                                echo "]";
                            ?>
                        </ul>
                    </div>
                <?php endif ?>
            </div>
            <div class="links-details">
                <?php if(!is_null($post)): ?>
                <div class="links-info" id="<?= $details['ID_LINK'] ?>">
                    <div class="date-details-create">
                        <h3>Criado em <?= $details['CREATE_DATE'] ?></h3>
                    </div>
                    <div class="qrcod-details">
                        <?php
                        echo '<img src="' . (new \chillerlan\QRCode\QRCode)->render(URL . '/'. $details['SHORTENED']) . '" alt="QR Code" />';
                        ?>
                    </div>
                    <div class="title-details-link">
                        <h3><?= $details['TITLE'] ?></h3>
                    </div>
                    <div class="original-details-link">
                        <h3><?= $details['ORIGINAL'] ?></h3>
                    </div>
                    <div class="custom-details-link">
                        <h3 id="custom-link"><?= URL . "/". $details['SHORTENED'] ?></h3>
                    </div>
                    <div class="clicks-details-link">
                        <h3><?= $details['CLICKS'] ?> clique(s)</h3>
                    </div>
                </div>
                <div class="links-buttons">
                    <button id="edit-link" onclick="getDataLink(<?= $details['ID_LINK'] ?>)">Editar</button>
                    <button id="copy-link">Copiar</button>
                    <button id="qrcode-link">QR Code</button>
                    <button id="delete-link" onclick="deleteLink(<?= $details['ID_LINK'] ?>)">Deletar</button>
                </div>
                <?php else: ?>
                    <span>Nenhum link selecionado.</span>
                <?php endif ?>
            </div>
        </div>
    </div>
    <nav class="menu-create-link">
        <div class="topmenu">
            <h2 class="title-aba">ENCURTAR LINK</h2>
            <a id="close-create"><img src="<?= $server ?>/assets/svg/fecharmenu.svg" alt=""></a>
        </div>
        <div class="menu-tab">
            <form id="form-link-create" method="post" action="javascript:createLink()">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="titlecreate" id="titlecreate" class="inputs" required>
                </div>
                <div class="form-group">
                    <label for="">URL Original</label>
                    <input type="text" name="originalcreate" id="originalcreate" class="inputs" required>
                </div>
                <div class="form-group">
                    <label for="">URL Personalizada (Opcional)</label>
                    <input type="text" name="customcreate" id="customcreate" class="inputs">
                </div>
                <div class="form-group">
                    <label for="">Expiração</label><br>
                    <input type="date" name="expirationcreate" id="expirationcreate" class="inputs">
                </div>
                <button class="btn-submit" id="create-link-btn" style="outline: none;" type="submit">Encurtar</button>
            </form>
        </div>
    </nav>
    <nav class="menu-edit-link">
        <div class="topmenu">
            <h2 class="title-aba">EDITAR LINK</h2>
            <a id="close-edit"><img src="<?= $server ?>/assets/svg/fecharmenu.svg" alt=""></a>
        </div>
        <div class="menu-tab">
            <form id="form-link-edit" method="post" action="javascript:editLink()">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="titleedit" id="titleedit" class="inputs" required>
                </div>
                <div class="form-group">
                    <label for="">URL Personalizada (Opcional)</label>
                    <input type="text" name="customedit" id="customedit" class="inputs">
                </div>
                <div class="form-group">
                    <label for="">Expiração</label><br>
                    <input type="date" name="expirationedit" id="expirationedit" class="inputs">
                </div>
                <button class="btn-submit" id="edit-link-btn" style="outline: none;" type="submit">Editar</button>
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