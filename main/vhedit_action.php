<?php

    require 'config.php';

    $query = [];

    $dados = filter_input_array (INPUT_POST, FILTER_DEFAULT); 

    $idUsuario = $_SESSION['id'];

    $nome = filter_input(INPUT_POST, 'nome');
    $placa = filter_input(INPUT_POST, 'placa');
    $placa = filter_input(INPUT_POST, 'placa');  
    $tipo = filter_input(INPUT_POST, 'tipo');
    $contato = filter_input(INPUT_POST, 'contato');
    $marca = filter_input(INPUT_POST, 'marca');
    $modelo = filter_input(INPUT_POST, 'modelo');
    $data = filter_input(INPUT_POST, 'data');
    $hora = filter_input(INPUT_POST, 'hora');

    if($id && $nome && $contato && $idade && $placa && $endereco) { 

        $sql = $pdo->prepare( "UPDATE SET tbl_cliente (nome, placa) VALUES (:nome, :placa);
        UPDATE SET tbl_veiculo (tipo, placa, marca, modelo) VALUES(:tipo, :placa, :marca, :modelo);
        UPDATE SET tbl_estacionamento (data, hora) VALUES(:data, :hora) WHERE `tbl_clientes`.`id` = :id;" );
        $sql->bindValue(':nome', $dados['nome']);
        $sql->bindValue(':placa', $dados['placa']);
        $sql->bindValue(':tipo', $dados['tipo']);
        $sql->bindValue(':contato', $dados['contato']);
        $sql->bindValue(':marca', $dados['marca']);
        $sql->bindValue(':modelo', $dados['modelo']);
        $sql->bindValue(':data', $dados['data']);
        $sql->bindValue(':hora', $dados['hora']);
        $sql->execute();

        header("Location: home.php"); //redirecionamento se sim
        exit;

    } else {
        header("Location: vhedit.php"); //redirecionamento se não
        exit;
    }

?>