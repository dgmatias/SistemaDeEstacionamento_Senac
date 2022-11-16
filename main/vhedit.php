<?php 

require 'config.php';

session_start();
ob_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/vhregister.css">
    <link rel="stylesheet" href="./static/css/reset.css">
    <title> Editar veículo </title>
</head>
<body>

    <div id="grid-container">
        
        <div id="menu-container">            

            <div class="item-menu" id="left-menu"> <a href="home.php"> Sistema de estacionamento </a> </div>
            
            <div>

                <div class="item-menu"> <img src="arquivo/<?=$banco['avatar']; ?>" alt="foto-de-perfil"> </div>
                <div class="item-menu"> <span>  <?= $_SESSION['nome']?>  </span> </div>
                <div class="item-menu"> <a href=""> Sair </a> </div>
                
            </div>

        </div>
            
        <div id="main-container">

            <div id="h1-container"> <h1>Edição de Veículo</h1> </div>

            <div id="form-container">

                <form action="vhregister_action.php" method="post">

                    <input type="hidden" name="operador"> <br>

                    <input class="input-form" type="text" name="nome"> <br>

                    <input class="input-form" type="text" name="contato"> <br>

                    <input class="input-form" type="number" name="tipo"> <br>

                    <input class="input-form" type="text" name="placa"> <br>

                    <input class="input-form" type="text" name="marca"> <br>

                    <input class="input-form" type="text" name="modelo"> <br>

                    <input class="input-form" type="date" name="data"> <br>

                    <input class="input-form" type="time" name="hora"> <br>

                    <input id="button-form" type="submit" name="cadastrar" value="cadastrar">
            
                </form>

                <div> <a href="home.php"> Voltar </a>  </div>
                
            </div>    
                               
        </div>

    </div>

</body>
</html>

