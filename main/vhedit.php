<?php 

    session_start();
    ob_start();

    require 'config.php';

$dados = [];

$id = filter_input(INPUT_GET, 'id');  //Filtra os valores de ID no fomulário.

    if($id) {
        
        
        $sql=$pdo->query("SELECT e.id,  e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador
        FROM tbl_usuario as u INNER JOIN tbl_estacionamento as e on u.id = e.operador_id 
        INNER JOIN tbl_cliente as c on e.cliente_id = c.id INNER JOIN tbl_veiculo as v on v.cliente_id = c.id WHERE e.id = $id");

        if($sql->rowCount() > 0) {
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            print_r($dados);
        }       
    }


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

                <form action="vhedit_action.php" method="post">

                    <input type="hidden" name="operador"> <br>

                    <input class="input-form" type="text" name="nome" value="<?php echo $dados['nome']; ?>"> <br>

                    <input class="input-form" type="text" name="contato" value="<?php echo $dados['contato']; ?>"> <br>

                    <input class="input-form" type="number" name="tipo" value="<?php echo $dados['tipo']; ?>"> <br>

                    <input class="input-form" type="text" name="placa" value="<?php echo $dados['placa']; ?>"> <br>

                    <input class="input-form" type="text" name="marca" value="<?php echo $dados['marca']; ?>"> <br>

                    <input class="input-form" type="text" name="modelo" value="<?php echo $dados['modelo']; ?>"> <br>

                    <input id="button-form" type="submit" name="edit" value="editar">
            
                </form>

                <div> <a href="home.php"> Cancelar </a> </div>
                
            </div>    
                               
        </div>

    </div>

</body>
</html>

