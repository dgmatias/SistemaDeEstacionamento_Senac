<?php
session_start();
ob_start();
require 'config.php';
$id = $_SESSION['id'];

echo "<pre>";
print_r($_FILES);
$sql = $pdo->query("SELECT * FROM usuario WHERE id = '$id'");

$permitidos = array('image/jpg','image/jpeg','image/png');

if(in_array($_FILES['arquivo']['type'], $permitidos)){
    $avatar = $_FILES['arquivo']['name'];
    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'arquivo/'.$avatar);

    $sql = $pdo->prepare("UPDATE usuario SET avatar = :avatar WHERE id = :id");
    $sql->bindValue('id',$id);
    $sql->bindValue(':avatar',$avatar);
    $sql->bindValue(':operador',$operador);
    $sql->bindValue(':password',$password_confirm);
    $sql->bindValue(':password_confirm',$password_confirm);
    $sql->execute();

    echo 'Arquivo salvo com sucesso';
    header('Location: index.php');
} else {
    echo 'Arquivo não permitivo';
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h1>
            Perfil do Operador - <?php echo $operador ?>
        </h1>

        <div>

            <img src="arquivo/<?=$banco['avatar']; ?>" alt="">
        </div>

        <div class="avatar">
            <h1>Trocar Avatar</h1>
            <form action="" method="post" enctype="multipart/form-data" />
                <input type="file" name="arquivos" />
                <input type="submit" value="enviar">
            </form>

        </div>
        
        <div>   

            <h1>Editar Usuário</h1>
                
            <form action="profile_action.php" method="post">
                <input type="hidden" name="id" value="3">
                <div class="edit">
                    <label for="" class="form-label">
                        Nome: <br>
                        <input type="text" class="form-control" name="operador">
                    </label>
                </div>
                <div class="edit">
                    <label for="" class="form-label">
                        Trocar a senha: <br>
                        <input type="password" name="password" class="form-control">
                    </label>
                </div>
                <div class="edit">
                    <label for="" class="form-label">
                        Confirmar a Senha: <br>
                        <input type="password" name="password_confirm" class="form-control">           
                    </label>
                </div>
                    
                <input type="submit" value="Salvar" class="btn btn-primary">
            </form>      
        
        </div>
    </div>  

</body>
</html>