<div class="container-md">
    <h1 class="text-center">Edição de tarefa</h1>
    <nav class="text-center">
        <a href="<?= URL_RAIZ . 'tarefas' ?>" class="btn btn-secondary mt-2 mb-4">Retornar</a>        
    </nav>
    <div>
        <form action="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() ?>" method="post">
            <input type="hidden" name="_metodo" value="PATCH">
            <div class="row gy-3">
                <div class="col-md-6">
                    <label class="form-label mt-2" for="nome">Tarefa</label>
                    <input id="nome" name="nome" class="form-control" type='text' autofocus value="<?= $tarefa->getNome() ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-2" for="prazo">Prazo</label>
                    <input id="prazo" name="prazo" class="form-control" type="date" value="<?= $tarefa->getPrazo() ?>">
                </div>
            </div>
            <div>
                <label class="form-label mt-2" for="descricao">Descrição</label>
                <input id="descricao" name="descricao" class="form-control" type='text' value="<?= $tarefa->getDescricao() ?>">
            </div>
            <button type="submit" class="mt-3 mb-5 w-100 btn btn-primary btn-lg">Atualizar</button>
        </form>
    </div>
</div>