<?php 

require 'config.php';

//nome, password, password_confirm

session_start();
ob_start();

$id =  $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome');
$senha = filter_input(INPUT_POST, 'senha');
$confirmarSenha = filter_input(INPUT_POST, 'confirmarSenha');

if ($nome and $senha and $confirmarSenha) {

    if($senha === $confirmarSenha){

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                        
        $sql = $pdo->prepare("UPDATE tbl_usuario SET nome = :nome, senha = :senha WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue (":nome", $nome);
        $sql->bindValue (":senha", $senha_hash);
        $sql->execute();

        $_SESSION['nome'] = $nome;

        header("Location: userprofile.php");
        exit;

    }else{
        header("Location: home.php");
        exit;
    }
    
}else{
    header("Location: home.php");
    exit;
};

?>