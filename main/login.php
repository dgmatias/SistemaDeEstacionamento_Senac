<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/login.css">
    <link rel="stylesheet" href="./static/css/reset.css">
    <title> Login </title>
</head>
<body>
    
    <div id="grid-container">

        <div id="left-container">

            <div id="left-content">

                <div id="h1-left"> <h1> Estacionamento </h1> </div>
                <div id="h2-left"> <h2> Um sistema de estacionamento feito com php. </h2> </div>
                <div id="button-left"> <a href="cadastro.php"> Ainda não tem uma conta ? </a> </div>

            </div>

        </div>

        <div id="right-container">

            <div id="right-content">

                <div id="h2-right"> <h2> Login </h2> </div>
                
                <div id="form-container">
                    
                    <form action="login_action.php" method="post">
                    

                        <input class="input-form" type="email" name="email" placeholder="email"> <br>

                        <input class="input-form" type="password" name="senha" placeholder="senha"> <br>

                        <input id="button-right" type="submit" value="Logar" name="SendLogin">

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
