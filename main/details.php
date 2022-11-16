<?php 

session_start();
ob_start();

require 'config.php';

$lista = [];

$id = filter_input(INPUT_GET, 'id');  //Filtra os valores de ID no fomulário.

    if($id) {
        
        
        $sql=$pdo->query("SELECT e.id,  e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador
        FROM tbl_usuario as u INNER JOIN tbl_estacionamento as e on u.id = e.operador_id 
        INNER JOIN tbl_cliente as c on e.cliente_id = c.id INNER JOIN tbl_veiculo as v on v.cliente_id = c.id WHERE e.id = $id");

        if($sql->rowCount() > 0) {
            $lista = $sql->fetch(PDO::FETCH_ASSOC);
            print_r($lista);
        }       
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/reset.css">
    <link rel="stylesheet" href="./static/css/home2.css">
    <title> Details </title>
</head>
<body>

    <div id="grid-container">

        <div id="menu-container">            

            <div class="item-menu" id="left-menu"> <a href="home.php"> Sistema de estacionamento </a> </div>

            <div>

                <div class="item-menu"> <img src="arquivo/<?=$banco['avatar']; ?>" alt="foto-de-perfil"> </div>
                <div class="item-menu"> <span>  <?= $_SESSION['nome']?>  </span> </div>
                <div class="item-menu"> <a href="logout.php"> Sair </a> </div>

            </div>

    </div>

    <div id="table-container">

        <table>
            
            
            <tr>
                <h2>Data: <?php echo $lista['data']; ?></h2> 
                <h2>Hora: <?php echo $lista['hora']; ?></h2>
                <h2>Cliente: <?php echo $lista['nome']; ?></h2>
                <h2>Contato: <?php echo $lista['contato']; ?></h2>
                <h2>Veículo: <?php echo $lista['tipo']; ?></h2>
                <h2>Modelo: <?php echo $lista['modelo']; ?></h2>
                <h2>Placa: <?php echo $lista['placa']; ?></h2>
                <h2>Situação: <?php echo $lista['status']; ?></h2>            
            </tr>


            
        </table>
        <div class="buttons-container">
            <a href="finish.php"> Finalizar </a>
            <a href="vhedit.php"> Editar </a>
            <a href="home.php"> Voltar </a>
        </div>


    </div>

</body>
</html>
