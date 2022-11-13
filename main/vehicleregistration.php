<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head.php';

    if((!isset($_SESSION['id'])) && (!isset($_SESSION['nome']))){
        $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário fazer o login!</p>";
        header("Location: login.php");
        exit;
    } 
    $id = $_SESSION['id'];
    $sql = $pdo->query( "INSERT INTO tbl_veiculo (cliente, contato, veiculo, placa, marca, modelo) VALUES (:cliente, :contato, :veiculo, :placa, :marca, :modelo :data, :hora)" );
    $banco = $sql->fetch(PDO::FETCH_ASSOC);
    
    $cliente = filter_input(INPUT_POST, 'cliente');
    $contato = filter_input(INPUT_POST, 'contato');
    $veiculo = filter_input(INPUT_POST, 'veiculo');
    $placa = filter_input(INPUT_POST, 'placa');
    $marca = filter_input(INPUT_POST, 'marca');
    $modelo = filter_input(INPUT_POST, 'modelo');
    $data = filter_input(INPUT_POST, 'data');
    $hora = filter_input(INPUT_POST, 'hora');

?>

</header>
<div class="container">
    <h1>Cadastro de Veículo</h1>

    <form action="" method="post" class="form-edit">
        <input type="hidden" name="operador">
        <div class="edit">
            <label for="" class="form-label">
                Cliente:
                <input type="text" name="cliente" class="form-control">
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Contato:
                <input type="text" name="contato" class="form-control">
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Veículo:
                <select class="form-select" name="veiculo" aria-label="Default select example">
                    <option selected="">Selecione o Veículo</option>
                    <option value="1">Moto</option>
                    <option value="2">Carro</option>
                    <option value="3">Pobre</option>
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Placa:
                <input type="text" name="placa" class="form-control">
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Marca:
                <input type="text" name="marca" class="form-control">
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Modelo:
                <input type="text" name="modelo" class="form-control">
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Data:
                <input type="date" name="data" class="form-control">
            </label>
        </div>
        <div class="edit">
            <label for="" class="form-label">
                Hora:
                <input type="time" name="hora" class="form-control">
            </label>
        </div>
        <input type="submit" class="btn btn-primary" name="Cadastrar" value="Cadastrar">
        <a href="index.php" class="btn btn-danger">Cancelar e voltar</a>
    </form>

</div>

    <!-- JS - Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>