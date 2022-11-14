<?php

require 'config.php';

$nome = filter_input (INPUT_POST, 'nome');
$email = filter_input (INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input (INPUT_POST, 'senha');
$confirmarSenha = filter_input (INPUT_POST, 'confirmarSenha');

if ($nome && $email && $senha && $confirmarSenha){
    $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();

    if ($sql->rowCount() === 0){

        if ($senha === $confirmarSenha) {
            $senha_hash = password_hash ($senha, PASSWORD_DEFAULT);

            $sql = $pdo->prepare("INSERT INTO tbl_usuario (nome, senha, email) VALUES (:nome, :senha, :email)");
            $sql->bindValue (":nome", $nome);
            $sql->bindValue(":senha", $senha_hash);
            $sql->bindValue(":email", $email);
            $sql->execute();
            header ("location: login.php");
            exit;
        };
        
    }else{
        header ("Location: cadastro.php");
        exit;
    };

}else{
    header ("Location: cadastro.php");
    exit;
};