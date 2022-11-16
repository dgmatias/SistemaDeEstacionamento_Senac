<?php 

session_start();
ob_start();

require 'config.php';

$id = $_SESSION['id'];
    $sql = $pdo->query("SELECT * FROM tbl_usuario WHERE id = $id");
    $banco = $sql->fetch(PDO::FETCH_ASSOC);   

$query = [];

$sql=$pdo->query("SELECT c.id, e.data, e.hora, e.status, c.nome, c.contato, v.tipo, v.placa, v.modelo, u.nome as operador FROM tbl_estacionamento as e 
INNER JOIN tbl_usuario as u ON e.operador_id = u.id 
INNER JOIN tbl_cliente as c ON e.cliente_id = c.id 
INNER JOIN tbl_veiculo as v ON v.cliente_id = c.id;
");

if($sql->rowCount() > 0) {   
    $query = $sql->fetchall(PDO::FETCH_ASSOC);  
}

$cliente = filter_input(INPUT_GET, 'cliente');
$placa = filter_input(INPUT_GET, 'placa');

$query =$pdo->query("SELECT c.id, e.data, e.hora, e.status, c.nome, c.contato, v.tipo, v.placa, v.modelo, u.nome as operador FROM tbl_estacionamento as e 
INNER JOIN tbl_usuario as u ON e.operador_id = u.id 
INNER JOIN tbl_cliente as c ON e.cliente_id = c.id 
INNER JOIN tbl_veiculo as v ON v.cliente_id = c.id
WhERE c.nome LIKE'%$cliente%' and v.placa LIKE'%$placa%'; ");


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

                <div class="item-menu"> <img src="arquivo/<?=$banco['avatar']; ?>" alt="foto-de-perfil" id="img-menu"> </div>
                <div class="item-menu"> <span>  <?= $_SESSION['nome']?>  </span> </div>
                <div class="item-menu"> <a href=""> Sair </a> </div>

            </div>

        </div>


        <div id="main-container">

            <div id="link-container">
    
                <div class="button-link"> <a  href="userprofile.php"> Perfil do operador </a> </div>
                <div class="button-link"> <a  href="vhregister.php"> Cadastro de veículo </a> </div>

            </div> <br> <br>
            
            
            <div id="form-container">

                <form action="" method="get">

                    <label for="">
                        Pesquisar: <br>
                        <input class="input-form" type="text" name="cliente" placeholder="Digite o nome do cliente">
    
                        <input class="input-form" type="text" name="placa" placeholder="Digite a placa do carro">
    
                        <input id="form-button" type="submit" value="Pesquisar">                  
                    </label>

                </form>

            </div>


            <div id="table-container">

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

                    <?php foreach($query as $resultado): ?>
                        <tr>
                            <td> <?php echo $resultado['data']; ?> </td>
                            <td> <?php echo $resultado['hora']; ?> </td>
                            <td> <?php echo $resultado['nome']; ?> </td>
                            <td> <?php echo $resultado['contato']; ?> </td>
                            <td> <?php echo $resultado['tipo']; ?> </td>
                            <td> <?php echo $resultado['modelo']; ?> </td>
                            <td> <?php echo $resultado['placa']; ?> </td>
                            <td> <?php echo $resultado['status']; ?> </td>
                            <td> <?php echo $resultado['operador']; ?> </td>
                            <td class="button-table"> <a href="detalhes.php" id="<?php  $resultado['id']; ?>" > Mais detalhes </a> </td>
                    
                        </tr>
                    <?php endforeach; ?>

                </table>

            </div>

        </div>


    </div>

</body>
</html>
