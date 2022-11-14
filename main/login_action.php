<?php

session_start();
ob_start();

require 'config.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(!empty($dados["SendLogin"])){
    $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :email");
    $sql->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $sql->execute();

    if(($sql) && ($sql->rowCount() != 0)){
        
        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

        if(password_verify($dados['senha'], $resultado['senha'])){

            $_SESSION['id'] = $resultado ['id'];
            $_SESSION['nome'] = $resultado ['nome'];
            header ('Location: home.php');
            exit;

        }else{
            header('Location: login.php');
        }
    
    } else {
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}

?>
