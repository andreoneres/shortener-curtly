<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curtly - Cadastro</title>
</head>

<body>
    <main>
        <form action="cadastro" method="post">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="">Confirmar senha</label>
                <input type="password" name="confirmpassword" id="confirmpassword" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>

</html>