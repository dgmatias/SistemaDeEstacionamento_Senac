<?php
    require 'config.php';

    $query = [];

    $sql=$pdo->query( "SELECT e.data, e.hora, e.status, c.nome, c.contato, v.tipo, v.placa, v.modelo, u.nome as operador 
    FROM tbl_estacionamento as e 
    INNER JOIN tbl_usuario as u ON e.operador_id = u.id 
    INNER JOIN tbl_cliente as c ON e.cliente_id = c.id 
    INNER JOIN tbl_veiculo as v ON v.cliente_id = c.id;" );

    $cliente = filter_input(INPUT_POST, 'cliente');
    $contato = filter_input(INPUT_POST,'contato');
    $tipo = filter_input(INPUT_POST,'tipo');
    $placa = filter_input(INPUT_POST,'placa');
    $marca = filter_input(INPUT_POST,'modelo');
    $data = filter_input(INPUT_POST,'data');
    $hora = filter_input(INPUT_POST,'hora');

    if($cliente && $contato && $tipo && $placa && $marca && $modelo && $data && $hora) {

        $sql = $pdo->prepare(  "START TRANSACTION;
                                INSERT INTO tbl_cliente (nome, contato)
                                VALUES(:nome, :contato);
                                INSERT INTO tbl_veiculo (tipo, placa, marca, modelo)
                                VALUES(:tipo, :placa, :marca, :modelo);
                                INSERT INTO tbl_estacionamento (data, hora)
                                VALUES(:data, :hora);
                                COMMIT;"
                            );

        $sql->bindValue(':cliente', $cliente);
        $sql->bindValue(':contato', $contato);
        $sql->bindValue(':tipo', $tipo);
        $sql->bindValue(':placa', $placa);
        $sql->bindValue(':marca', $marca);
        $sql->bindValue(':modelo', $modelo);
        $sql->bindValue(':data', $data);
        $sql->bindValue(':hora', $hora);
        $sql->execute();

        header("Location: home.php");

    } else {
        header('Location: vhregister.php');
        exit;
    }