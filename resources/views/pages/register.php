<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="assets/js/sweetalert.js"></script>
    <title>Curtly - Cadastro</title>
</head>

<body>
    <main>
        <div class="background-modal">
            <div class="modal-login">
                <div class="title">
                    <h1>CADASTRE-SE</h1>
                </div>
                <div class="image">
                    <img src="assets/img/avatar.png" alt="" width="96" height="96">
                </div>
                <form id="form-register" action="cadastro" method="post">
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirme sua senha" required>
                    </div>
                    <button type="submit" id="btn-register">Cadastrar</button>
                </form>
                <div class="redirect-login">
                    <a href="login">Já possue conta? Logue-se!</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>