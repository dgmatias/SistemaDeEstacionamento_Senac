<?php 

require 'config.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/vhregister.css">
    <link rel="stylesheet" href="./static/css/reset.css">
    <title> Cadastrar veiculo </title>
</head>
<body>

    <div id="grid-container">
        
        <div id="menu-container">            

            <div class="item-menu" id="left-menu"> <a href="home.php"> Sistema de estacionamento </a> </div>
            
            <div>

                <div class="item-menu"> <img src="" alt="foto-de-perfil"> </div>
                <div class="item-menu"> <span>  nome  </span> </div>
                <div class="item-menu"> <a href=""> Sair </a> </div>
                
            </div>

        </div>
            
        <div id="main-container">

            <div id="h1-container"> <h1>Cadastro de Veículo</h1> </div>

            <div id="form-container">

                <form action="vhregister_action.php" method="post">

                    <input type="hidden" name="operador"> <br>

                    <input class="input-form" type="text" name="nome" placeholder="Digite o nome do cliente"> <br>

                    <input class="input-form" type="text" name="contato" placeholder="Digite o contato do cliente"> <br>

                    <input class="input-form" type="number" name="tipo" placeholder="Digite o tipo do veiculo"> <br>

                    <input class="input-form" type="text" name="placa" placeholder="Digite o nome da placa"> <br>

                    <input class="input-form" type="text" name="marca" placeholder="Digite o nome do marca"> <br>

                    <input class="input-form" type="text" name="modelo" placeholder="Digite o nome do modelo"> <br>

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

