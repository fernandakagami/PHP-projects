<main class="form-signin w-100 m-auto text-center">
    <form action=" <?= URL_RAIZ . 'login' ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-floating">            
            <input id="email" name="email" class="form-control" type="email" autofocus value="<?= $this->getPost('email') ?>">
            <label for="email">Email</label>
        </div>
        <div class="form-floating">            
            <input id="senha" name="senha" class="form-control" type="password">
            <label for="senha">Senha</label>                     
        </div>
        <div class="form-group has-error text-center">
            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'login']) ?>
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary mt-4">Entrar</button>
    </form>
    <p class="mt-4">
        <a href="<?= URL_RAIZ . 'usuarios/criar' ?>">Não tem um usuário? Cadastrar-se aqui!</a>
    </p>
</main>