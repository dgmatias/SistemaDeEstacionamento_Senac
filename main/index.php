<?php
    session_start();
    ob_start();
    require 'config.php';

    if(isset($_SESSION['id'], $_SESSION['nome'])) {
        header("Location: home.php");
        exit;
    }
?>

<body style="padding: 4rem">

    <div>
        <h1> Seja bem-vindo! </h1><br/>
    </div>

    <div>
        <a href="login.php"> Login </a><br/><br/>
        <a href="cadastrar.php"> Criar conta </a>
    </div>

</div>