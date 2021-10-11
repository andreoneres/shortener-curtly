<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/session.js"></script>
    <title>Curtly - Login</title>
</head>

<body>
    <main>
        <form id="form-login" action="javascript:login()" method="post">
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </main>
</body>

</html>