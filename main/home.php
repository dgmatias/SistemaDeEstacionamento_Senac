<?php 

require 'config.php';

$query = [];

$sql=$pdo->query("SELECT e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador
FROM tbl_usuario as u INNER JOIN tbl_estacionamento as e on u.id = e.cliente_id 
INNER JOIN tbl_cliente as c INNER JOIN tbl_veiculo as v on v.cliente_id = c.id");

if($sql->rowCount() > 0) {   
    $query = $sql->fetchall(PDO::FETCH_ASSOC);  
}

$cliente = filter_input(INPUT_GET, 'cliente');
$placa = filter_input(INPUT_GET, 'placa');




$query =$pdo->query("SELECT e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador
FROM tbl_usuario as u INNER JOIN tbl_estacionamento as e on u.id = e.cliente_id 
INNER JOIN tbl_cliente as c INNER JOIN tbl_veiculo as v on v.cliente_id = c.id
WhERE c.nome LIKE'%$cliente%' and v.placa LIKE'%$placa%' ");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/reset.css">
    <link rel="stylesheet" href="./static/css/home.css">
    <title> Home </title>
</head>
<body>

    <!-- Grid Container -->

    <div id="grid-container">

        <!-- Header -->

        <header>
    
            <div id="menu-container">
    
                <div> <h1> Sistema de estacionamento </h1> </div>
    
                <div id="perfil-container">
    
                    <div> <img src="" alt="foto de perfil" id="img-menu"></div>

                    <span>  </span>
                    
                    <div> <a href="logout.php"> Sair </a> </div>

                </div>
        
    
            </div>
    
        </header>
        
        <!-- Fim Header -->
        
        <!-- Section -->

        <section>

            <div id="main-container">
                
                <div id="buttons-container">
    
                    <div> <a href=""> Perfil do operador </a> </div>
                    <div> <a href=""> Cadastro de veículo </a> </div>
    
                </div> <br> <br>
                
                <div id="form-container">
    
                    <span> Pesquisar: </span> <br>
                    <form action="" method="get">
    
                            <input class="input-form" type="text" name="cliente">
    
                            <input class="input-form" type="text" name="placa">
    
                            <input class="form-button" type="submit" value="Buscar">                  

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
                                <td> <a href=""> Mais detalhes </a> </td>
                        
                        
                            </tr>
                        <?php endforeach; ?>

                    </table>
            
                <div>
                
            </div>
            
        </section>
        
        <!-- Fim Section -->

    </div>
    
    <!-- Fim grid container -->
    
</body>
</html>
