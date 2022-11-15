</header>
<div class="container">
    <h1>Cadastro de Veículo</h1>

    <form action="vhregister_action.php" method="post" class="form-edit">

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
                Tipo do Veículo:
                <input type="text" name="tipo" class="form-control">
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
        <a href="home.php" class="btn btn-danger">Cancelar e voltar</a>
    </form>

</div>

</body>