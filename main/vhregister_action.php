<?php

    require 'config.php';

    session_start();
    ob_start();

    $dados = filter_input_array (INPUT_POST, FILTER_DEFAULT); 

    $operador_id = $_SESSION['id'];

    if($dados) {

        $sql=$pdo->prepare("SELECT * from tbl_cliente WHERE nome = :nome and contato = :contato");

        $sql->bindValue(':nome', $dados['nome']);
        $sql->bindValue(':contato', $dados['contato']);
        $sql->execute();    
        
        if($sql->rowCount === 0) {

            $sql=$pdo->prepare("INSERT INTO tbl_cliente (nome, contato) VALUES(:nome, :contato); ");
    
            $sql->bindValue(':nome', $dados['nome']);
            $sql->bindValue(':contato', $dados['contato']);
            $sql->execute();
    
            $sql=$pdo->prepare("SELECT id from tbl_cliente WHERE nome = :nome and contato = :contato");
            $sql->bindValue(':nome', $dados['nome']);
            $sql->bindValue(':contato', $dados['contato']);
            $sql->execute();
    
            if ($sql->rowCount() === 1) {

                $cliente_id = $sql;

                $sql=$pdo->prepare("INSERT INTO tbl_veiculo (tipo, marca, modelo, placa, cliente_id) VALUES(:tipo, :marca,   :modelo, :placa, :cliente_id");
        
                $sql->bindValue(':tipo', $dados['tipo']);
                $sql->bindValue(':marca', $dados['marca']);
                $sql->bindValue(':modelo', $dados['modelo']);
                $sql->bindValue(':placa', $dados['placa']);
                $sql->bindValue(':cliente_id', $cliente_id);
                $sql->execute();
                
                $sql=$pdo->prepare("INSERT INTO tbl_estacionamento (cliente_id, operador_id, data, hora) VALUES(:cliente, :operador_id, :data, :hora)");
                
                $sql->bindValue(':cliente_id', $cliente_id);
                $sql->bindValue(':operador_id', $operador_id);
                $sql->bindValue(':data', $dados['data']);
                $sql->bindValue(':hora', $dados['hora']);
                $sql->execute();

                header("Location: home.php");
                exit;

            } else {
                header("Location: vhregister.php");
                exit;

            }
        } else {
            header("Location: vhregister.php");
            exit;

        }
    } else {
        header("Location: vhregister.php");
        exit;
        
    }
