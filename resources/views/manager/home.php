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
    <link rel="shortcut icon" href="assets/img/favicon.ico">
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
    <main class="conteudo">
        <div class="container1">
            <div class="top">
                <div class="form-search">
                    <form class="form-search-link" action="javascript:searchLink()" method="get">
                        <input type="text" name="search" id="search" placeholder="Buscar..." />
                        <button type="submit" id="btn-search"><i></i></button>
                    </form>
                </div>
                <span id="total-results"><?= $links['totalResults'] ?> resultado(s)</span>
            </div>
            <div class="links">
                <div class="links-created">
                    <div class="box-links">
                        <?php if (!is_null($links['links'])) : ?>
                            <?php foreach ($links['links'] as $key => $link) : ?>
                                <div class="link-single" onclick="viewDetailsLink(<?= $link['ID_LINK'] ?>)">
                                    <div class="content-single">
                                        <div class="date-single-created">
                                            <h3><?= $link['CREATE_DATE'] ?></h3>
                                        </div>
                                        <div class="title-single-link">
                                            <h3><?= $link['TITLE'] ?></h3>
                                            <img src="" alt="" srcset="">
                                        </div>
                                        <div class="custom-single-link">
                                            <h3><?= URL ?>/<?= $link['CUSTOM'] ?? $link['SHORTENED'] ?></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?php if (!empty($params['search']) && is_null($links['links'])) : ?>
                                <span>Nenhum link encontrado.</span>
                            <?php else : ?>
                                <button id="btn-cr-link" class="create-link" onclick="openCreateLink()">CRIAR O SEU PRIMEIRO LINK</button>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                    <?php if (!is_null($links['links'])) : ?>
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
                    <?php if (!empty($post)) : ?>
                        <div class="links-info" id="<?= $details['ID_LINK'] ?>">
                            <div class="date-details-create">
                                <h3>Criado em <?= $details['CREATE_DATE'] ?></h3>
                            </div>
                            <div class="qrcod-details">
                                <?php
                                echo '<img src="' . (new \chillerlan\QRCode\QRCode)->render(URL . '/' . $details['SHORTENED']) . '" alt="QR Code" />';
                                ?>
                            </div>
                            <div class="title-details-link">
                                <h3><?= $details['TITLE'] ?></h3>
                            </div>
                            <div class="original-details-link">
                                <h3><?= $details['ORIGINAL'] ?></h3>
                            </div>
                            <div class="custom-details-link">
                                <h3 id="custom-link"><?= URL ?>/<?= $details['CUSTOM'] ?? $details['SHORTENED'] ?></h3>
                            </div>
                            <div class="clicks-details-link">
                                <h3><?= $details['CLICKS'] ?> clique(s)</h3>
                            </div>
                        </div>
                        <div class="links-buttons">
                            <button id="edit-link" onclick="getDataLink(<?= $details['ID_LINK'] ?>)">Editar</button>
                            <button id="copy-link" onclick="copyLink()">Copiar</button>
                            <button id="delete-link" onclick="deleteLink(<?= $details['ID_LINK'] ?>)">Deletar</button>
                        </div>
                    <?php else : ?>
                        <span>Nenhum link selecionado.</span>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <nav class="menu-create-link">
            <div class="topmenu">
                <h2 class="title-aba">ENCURTAR LINK</h2>
                <a id="close-create"><img src="/assets/svg/fecharmenulink.svg" alt=""></a>
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
                        <label for="">Expiração (Opcional)</label><br>
                        <input type="date" name="expirationcreate" id="expirationcreate" class="inputs">
                    </div>
                    <button class="btn-submit" id="create-link-btn" style="outline: none;" type="submit">Encurtar</button>
                </form>
            </div>
        </nav>
        <nav class="menu-edit-link">
            <div class="topmenu">
                <h2 class="title-aba">EDITAR LINK</h2>
                <a id="close-edit"><img src="/assets/svg/fecharmenulink.svg" alt=""></a>
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
                        <label for="">Expiração (Opcional)</label><br>
                        <input type="date" name="expirationedit" id="expirationedit" class="inputs">
                    </div>
                    <button class="btn-submit" id="edit-link-btn" style="outline: none;" type="submit">Editar</button>
                </form>
            </div>
        </nav>
    </main>
    <footer class="footer">
        <div class="copyright">
            <span>Copyryght <?= Date('Y') ?> © Curtly</span>
        </div>
        <script>
            function copyLink() {
                var range = document.createRange();
                range.selectNode(document.getElementById("custom-link"));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand("copy");
                alert(`Link copiado para sua área de transferência.\n${range}`);
                window.getSelection().removeAllRanges();
            }
        </script>
    </footer>
</body>

</html>