<div class="container">

    <h1>login<h1>

    <form action="login_action.php" method="post">

        <div class="mb-3">
            <label for="" class="form-label">
                Email: <br>
                <input type="email"
                name="email"
                class="form-control"
                value="<?php if(isset($dados['email'])){echo $dados['email'];}?>"
                >
            </label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">
                Senha: <br>
                <input type="password" name="senha" class="form-control">
            </label>
        </div>

        <input type="submit" value="Salvar" name="SendLogin" class="btn btn-primary"/>
    </form>
    <h5><a type="button" class="btn btn-link" href="cadastro.php">Cadastrar</a></h5>
</div>
