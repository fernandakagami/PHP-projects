<div class="center-block site">
    <h1 class="text-center">Mostrando Tarefa</h1>
    <nav>
        <a href="<?= URL_RAIZ . 'tarefas' ?>" class="btn btn-default">Voltar para a listagem</a>
    </nav>
    <form>
        <div class="form-group">
            <label class="control-label" for="nome">Nome *</label>
            <input id="nome" name="nome" class="form-control" disabled="disabled" value="<?= $tarefa->getNome() ?>" type="text">
        </div>
        <div class="form-group">
            <label class="control-label" for="prazo">Prazo</label>
            <input id="prazo" name="prazo" class="form-control" disabled="disabled" value="<?= $tarefa->getPrazo() ?>" type="date">
        </div>        
    </form>
</div>
