<?php 
session_start();
ob_start();
?>

<?php 
require 'config.php';

$lista = [];

$sql = $pdo->query("SELECT * FROM tbl_veiculo");
$lista = $sql->fetchall(PDO::FETCH_ASSOC);

$sql=$pdo->query("SELECT e.data, e.hora, c.nome , c.contato , v.tipo , v.modelo, v.placa , e.status, u.nome as operador
FROM tbl_usuario as u INNER JOIN tbl_estacionamento as e on u.id = e.cliente_id 
INNER JOIN tbl_cliente as c INNER JOIN tbl_veiculo as v on v.cliente_id = c.id");

$data = filter_input (INPUT_POST, 'data');
$hora = filter_input (INPUT_POST, 'hora');
$cliente = filter_input (INPUT_POST, 'cliente');
$contato = filter_input (INPUT_POST, 'contato');
$veiculo = filter_input (INPUT_POST, 'veiculo');
$placa = filter_input (INPUT_POST, 'placa');
$modelo = filter_input (INPUT_POST, 'modelo');
$status = filter_input (INPUT_POST, 'status');

?>

<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>detalhes</title>
    </head>
    <body>
        
    <?php foreach($lista as $usuario): ?>
    <tr>
        <td> <?php echo $usuario['data']; ?> </td>
        <td> <?= $usuario['hora']; ?> </td>
        <td> <?= $usuario['cliente']; ?> </td>
        <td> <?= $usuario['contato']; ?> </td>
        <td> <?= $usuario['veiculo']; ?> </td>
        <td> <?= $usuario['placa']; ?> </td>
        <td> <?= $usuario['modelo']; ?> </td>
        <td> <?= $usuario['status']; ?> </td>
    </tr>   
    <?php endforeach; ?>
    
    <table>
        <tr>
            <th><a href="">Finalizar</a></th>
            <th><a href="">Editar</a></th>
            <th><a href="home.php">Voltar</a></th>
        </tr>
    </table>
</body>
</html>