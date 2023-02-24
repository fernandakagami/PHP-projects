<div class="center-block site">
    <h1 class="text-center">Edição de Tarefa</h1>
    <nav>
        <a href="<?= URL_RAIZ . 'tarefas' ?>" class="btn btn-default">Voltar para a listagem</a>
    </nav>
    <form action="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() ?>" method="post">
        <input type="hidden" name="_metodo" value="PATCH">
        <div class="form-group">
            <label class="control-label" for="nome">Nome *</label>
            <input id="nome" name="nome" class="form-control" value="<?= $tarefa->getNome() ?>" type="text" autofocus>
        </div>
        <div class="form-group">
            <label class="control-label" for="prazo">Prazo</label>
            <input id="prazo" name="prazo" class="form-control" value="<?= $tarefa->getPrazo() ?>" type="date">
        </div>        
        <button type="submit" class="btn btn-primary center-block">Editar</button>
    </form>
</div>
