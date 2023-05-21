<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleLog.css">
    <title>Login Usuario</title>
</head>
<body>
    <div class="img-wrapper">
        <img src="https://www.ssu.ca/wp-content/uploads/2021/03/surface-E9NcsvbRVqo-unsplash-e1615815768341.jpg" alt="menina estudando">
    </div>
    <main class="container">
        <h1>Informação do Usuário</h1>
        <form action="../control/login_control.php" method="post">
            <label for="nome" class="field-label">Nome:</label>
            <input type="text" name="nome_usu" id="idnome" class="field">
            <label for="login" class="field-label">Login de Usuario:</label>
            <input type="text" name="login" id="idlogin" class="field">
            <label for="senha" class="field-label">Senha de Usuario:</label>
            <input type="password" name="senha" id="idsenha" class="field">
            <label for="confirmarSenha" class="field-label">Confirme sua Senha:</label>
            <input type="password" name="confirmaSenha" id="idcsenha" class="field">
            <input type="submit" value="Enviar" class="field-submit">
        </form>
    </main>
</body>
</html>
