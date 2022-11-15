<?php
session_start();
ob_start();
require 'config.php';
$id = $_SESSION['id'];

echo "<pre>";
print_r($_FILES);
$sql = $pdo->query("SELECT * FROM tbl_usuario WHERE id = '$id'");

$permitidos = array('image/jpg','image/jpeg','image/png');

if(in_array($_FILES['arquivo']['type'], $permitidos)){
    $avatar = $_FILES['arquivo']['name'];
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivo/'.$avatar);

    $sql = $pdo->prepare("UPDATE tbl_usuario SET avatar = :avatar WHERE id = :id");
    $sql->bindValue('id',$id);
    $sql->bindValue(':avatar',$avatar);
    $sql->execute();

    echo 'Arquivo salvo com sucesso';
    header('Location: userprofile.php');
} else {
    echo 'Arquivo não permitivo';
}