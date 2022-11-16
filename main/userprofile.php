<?php
    session_start();
    ob_start();

    require 'config.php';

    $id = $_SESSION['id'];
    $sql = $pdo->query("SELECT * FROM tbl_usuario WHERE id = $id");
    $banco = $sql->fetch(PDO::FETCH_ASSOC);   

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/userprofile.css">
    <link rel="stylesheet" href="./static/css/reset.css">
    <title>Perfil do operador</title>
</head>
<body>
    
    <div id="grid-container">

        <div id="menu-container">            

            <div class="item-menu" id="left-menu"> <a href="home.php"> Sistema de estacionamento </a> </div>

            <div>

                <div class="item-menu"> <img src="arquivo/<?=$banco['avatar']; ?>" alt="foto-de-perfil" id="img-menu"> </div>
                <div class="item-menu"> <span>  <?= $_SESSION['nome']?>  </span> </div>
                <div class="item-menu"> <a href=""> Sair </a> </div>

            </div>

        </div>


        <div id="main-container">

            <div id="avatar-container">

                <div> <h1>Bem-vindo, <?php echo $_SESSION['nome'] ?> </h2> </div>
                
                <div> <img src="arquivo/<?=$banco['avatar']; ?>" alt="foto-de-perfil" id="img-avatar"> </div>

                <div>  <h2>Trocar Avatar</h2> </div>
    
                <div>

                    <form action="recebedor.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="arquivo" />
                        <input type="submit" value="enviar">
                    </form>

                </div>

            </div>


            <div id="edit-container">

                <div> <h2> Editar </h2> </div>

                <div id="form-container">

                    <form action="profile_action.php" method="post">

                        <input type="hidden" name="id" value="3">

                        <label for="">
                            Nome: <br>
                            <input class="input-form" type="text" name="operador"> <br>
                        </label>
             
                        <label for="">
                            Senha: <br>
                            <input class="input-form" type="password" name="password"> <br>
                        </label>
                        
                        <label for="">
                            Confirmar senha: <br>
                            <input class="input-form" type="password" name="password_confirm"> <br>           
                        </label>

                    
                        <input id="button-form" type="submit" value="Salvar">
                    
                    </form> 

                </div>

            </div>

        </div>

    </div>

</body>
</html>
