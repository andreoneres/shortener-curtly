<aside class="aside">
    <div class="title">
        <h2>Admin - Curtly</h2>
    </div>
    <div class="infos">
        <div class="icone">
            <!-- ÍCONE DO USUÁRIO -->
            <div class="icon_user">
                <img src="assets/img/semfoto.jpg" alt="">
            </div>
        </div>
        <div class="content">
            <!-- NOME DO USUÁRIO -->
            <div class="username">
                <h3><?= $params['NAME']  ?></h3>
            </div>
            <!-- STATUS -->
            <div class="status">
                <img src="assets/img/online.png" alt="">
                <span>online</span>
            </div>
        </div>
    </div>
    <!-- ÁREA DO FORM DE BUSCA -->
    <div class="busca">
        <form action="" method="get">
            <input type="text" name="" id="" placeholder="Buscar...">
            <button></button>
        </form>
    </div>
    <!-- BARRA -->
    <div class="bar">
        <h4>NAVEGAÇÃO</h4>
    </div>
    <!-- MENUS DE NAVEGAÇÃO -->
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav-item">
                <a onclick="requisitarPagina('home')">
                    <i><img src="assets/svg/dashboard.svg" alt=""></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a onclick="requisitarPagina('links')">
                    <i><img src="assets/svg/atividade.svg" alt=""></i> Links
                </a>
            </li>
            
            <li class="nav-item">
                <a id="painel">
                    <i><img src="assets/svg/painel.svg" alt=""></i> <span>Painel de Gestão</span> <i><img src="assets/svg/dropdown.svg" alt=""></i>
                </a>
                <ul class="nav-open">
                    <li class="nav-item">
                        <a onclick="requisitarPagina('usuarios')">
                            <i><img src="assets/svg/user.svg" alt=""></i> Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="requisitarPagina('equipes')">
                            <i><img src="assets/svg/equipe.svg" alt=""></i> Equipes
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a onclick="requisitarPagina('consultas')">
                            <i><img src="assets/svg/consulta.svg" alt=""></i> Consultas
                        </a>
                    </li> -->
                </ul>
            </li>
            
        </ul>
    </nav>
</aside>
<main class="conteudo" id="conteudo">