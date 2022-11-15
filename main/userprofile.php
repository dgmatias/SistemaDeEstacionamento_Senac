<?php
    session_start();
    ob_start();
    require 'config.php';

    if((!isset($_SESSION['id'])) && (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário fazer o login";
        header("Location: login.php");
        exit;
    }
    $id = $_SESSION['id'];
    $sql = $pdo->query("SELECT * FROM tbl_usuario WHERE id = $id");
    $banco = $sql->fetch(PDO::FETCH_ASSOC);   

?>

<header>    
    <h2>Bem-vindo, <?php echo $_SESSION['nome'] ?></h2>
    <a href="sair.php">Sair</a>    
</header>

<div>
    <img src="arquivo/<?=$banco['avatar']; ?>" alt="">
</div>
<div class="avatar">
    <h1>Trocar Avatar</h1>
    <form action="recebedor.php" method="post" enctype="multipart/form-data" />
        <input type="file" name="arquivo" />
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