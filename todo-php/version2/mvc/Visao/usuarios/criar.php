<main class="form-signin w-100 m-auto text-center">
    <form action=" <?= URL_RAIZ . 'usuarios' ?>" method="post">
        <h1 class="h3 mb-3 fw-normal">Cadastro de Usuário</h1>

        <div class="form-floating">            
            <input id="email" name="email" class="form-control <?= $this->getErroCss('email') ?>" type="email" autofocus value="<?= $this->getPost('email') ?>">
            <label for="email">Email</label>    
            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'email']) ?>        
        </div>
        <div class="form-floating">            
            <input id="senha" name="senha" class="form-control <?= $this->getErroCss('senha') ?>" type="password">
            <label for="senha">Senha</label>
            <?php $this->incluirVisao('util/formErro.php', ['campo' => 'senha']) ?>
        </div>

        <button type="submit" class="w-100 btn btn-lg btn-primary mt-4">Cadastrar</button>
    </form>
    <p class="mt-4">
        <a href="<?= URL_RAIZ . 'login' ?>">Voltar para a tela de Login</a>
    </p>
</main>
