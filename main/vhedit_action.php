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
        
        if($sql->rowCount() === 0) {

            $sql=$pdo->prepare( "UPDATE tbl_cliente SET nome = :nome, contato = :contato" );
    
            $sql->bindValue(':nome', $dados['nome']);
            $sql->bindValue(':contato', $dados['contato']);
            $sql->execute();
    
            $query=$pdo->prepare("SELECT id from tbl_cliente WHERE nome = :nome and contato = :contato");
            $query->bindValue(':nome', $dados['nome']);
            $query->bindValue(':contato', $dados['contato']);
            $query->execute();
    
            if ($query->rowCount() > 0) {

                $cliente_id = $query->fetch(PDO::FETCH_ASSOC);  

                $sql=$pdo->prepare( "UPDATE tbl_veiculo SET tipo = :tipo, marca = :marca, modelo = :modelo, placa = :placa, cliente_id = :cliente_id" );
        
                $sql->bindValue(':tipo', $dados['tipo']);
                $sql->bindValue(':marca', $dados['marca']);
                $sql->bindValue(':modelo', $dados['modelo']);
                $sql->bindValue(':placa', $dados['placa']);
                $sql->bindValue(':cliente_id', $cliente_id['id']);
                $sql->execute();
                
                $sql=$pdo->prepare("UPDATE tbl_estacionamento SET cliente_id = :cliente_id, operador_id = :operador_id, data = :data, hora = :hora");
                
                $sql->bindValue(':cliente_id', $cliente_id['id']);
                $sql->bindValue(':operador_id', $operador_id);
                $sql->bindValue(':data', $dados['data']);
                $sql->bindValue(':hora', $dados['hora']);
                $sql->execute();

                header("Location: home.php");
                exit;

            }  

        } else {
            header("Location: vhedit.php");
            exit;
        }
    }
?>
