<?php

    require 'config.php';

    $query = [];

    $dados = filter_input_array (INPUT_POST, FILTER_DEFAULT); 

    $idUsuario = $_SESSION['id'];

    if($dados) {

        $sql = $pdo->prepare(
                "UPDATE SET tbl_cliente (nome, contato)
                VALUES(:nome, :contato);
                UPDATE SET tbl_veiculo (tipo, placa, marca, modelo)
                VALUES(:tipo, :placa, :marca, :modelo);
                UPDATE SET tbl_estacionamento (data, hora)
                VALUES(:data, :hora)
                WHERE id = :id;
                ");

        $sql->bindValue(':nome', $dados['operador']);
        $sql->bindValue(':nome', $dados['nome']);
        $sql->bindValue(':contato', $dados['contato']);
        $sql->bindValue(':tipo', $dados['tipo']);
        $sql->bindValue(':placa', $dados['placa']);
        $sql->bindValue(':marca', $dados['marca']);
        $sql->bindValue(':modelo', $dados['modelo']);
        $sql->bindValue(':data', $dados['data']);
        $sql->bindValue(':hora', $dados['hora']);
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header('Location: vhregister.php');
        exit;
    }