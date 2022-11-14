<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
    <div class="container">

        <h1>Crie sua conta!<h1>

        <div class="content">

            <form action="cadastro_action.php" method="post">

            <label for="">
                Nome: <br>
                <input type="text" name="nome">
            </label> <br>

            <label for="">
                Email: <br>
                <input type="email" name="email">
            </label> <br>

            <label for="">
                Senha: <br>
                <input type="password" name="senha">
            </label> <br>

            <label for="">
                Confirme a senha: <br>
                <input type="password" name="confirmarSenha">
            </label> <br>

            <label for="">
                <input type="submit" value="Finalizar!">
            </label><br>

            </form>

        </div>

    </div>

</body>
</html>