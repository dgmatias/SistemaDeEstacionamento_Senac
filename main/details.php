<?php 

session_start();
ob_start();

require 'config.php';

$query = [];

$sql=$pdo->query("SELECT c.id,  e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador
FROM tbl_usuario as u INNER JOIN tbl_estacionamento as e on u.id = e.cliente_id 
INNER JOIN tbl_cliente as c INNER JOIN tbl_veiculo as v on v.cliente_id = c.id");

if($sql->rowCount() > 0) {   
    $query = $sql->fetchall(PDO::FETCH_ASSOC);  
}

$cliente = filter_input(INPUT_GET, 'cliente');
$placa = filter_input(INPUT_GET, 'placa');

$query =$pdo->query("SELECT e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador 
FROM tbl_usuario as u 
INNER JOIN tbl_estacionamento as e on u.id = e.cliente_id 
INNER JOIN tbl_cliente as c 
INNER JOIN tbl_veiculo as v on v.cliente_id = c.id ");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/reset.css">
    <link rel="stylesheet" href="./static/css/home2.css">
    <title> Home </title>
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

    *<div id="table-container">

        <table>

            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Cliente</th>
                <th>Contato</th>
                <th>Veículo</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Situação</th>
                <th>Operador</th>
            
            </tr>
        
            <tr>
                <?php foreach($query as $resultado): ?>
                
                <td><?php echo $resultado['hora']; ?> </td>
                <td><?php echo $resultado['nome']; ?> </td>
                <td><?php echo $resultado['contato']; ?> </td>
                <td><?php echo $resultado['tipo']; ?> </td>
                <td><?php echo $resultado['modelo']; ?> </td>
                <td><?php echo $resultado['placa']; ?> </td>
                <td><?php echo $resultado['operador']; ?> </td>
                <td><?php echo $resultado['status']; ?> </td>
                  
            </tr>

            <?php endforeach; ?>

            <div class="buttons-container">
                <a href="finish.php"> Finalizar </a>
                <a href="vhedit.php"> Editar </a>
                <a href="home.php"> Voltar </a>
            </div>

        </table>


    </div>

</body>
</html>