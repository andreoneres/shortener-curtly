<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/imgs/favicon.ico">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="assets/js/session.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Curtly - Login</title>
</head>

<body>
    <main>
        <div class="background-modal">
            <div class="modal-login">
                <div class="title">
                    <h1>ENTRAR</h1>
                </div>
                <div class="image">
                    <img src="assets/img/avatar.png" alt="" width="96" height="96" style="border-radius: 50%">
                </div>
                <div class="error-container">
                    <h2 id="error" style="color: red"></h2>
                </div>
                <form id="form-login" action="javascript:login()" method="post">
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
        </div>
    </main>
</body>

</html>