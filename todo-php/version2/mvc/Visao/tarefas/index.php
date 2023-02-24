<div class="container-md mt-5">
    <h1 class="text-center">Agenda de tarefas</h1>
    <nav class="text-center">
        <form action="<?= URL_RAIZ . 'login' ?>" method="post" class="inline">
            <input type="hidden" name="_metodo" value="DELETE">
            <button type="button" class="btn btn-secondary mt-2 mb-4" onclick="event.preventDefault(); this.parentNode.submit()">Sair do sistema</button>
        </form>
    </nav>

    <?php if ($mensagem) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?= $mensagem ?>
        </div>
    <?php endif ?>

    <div>
        <form action="<?= URL_RAIZ . 'tarefas' ?>" method="post">
            <div class="row gy-3">
                <div class="col-md-6">
                    <label class="form-label mt-2" for="nome">Tarefa</label>
                    <input id="nome" name="nome" class="form-control" type='text' autofocus>
                </div>
                <div class="col-md-6">
                    <label class="form-label mt-2" for="prazo">Prazo</label>
                    <input id="prazo" name="prazo" class="form-control" type="date">
                </div>
            </div>
            <div>
                <label class="form-label mt-2" for="descricao">Descrição</label>
                <input id="descricao" name="descricao" class="form-control" type='text'>
            </div>
            <button type="submit" class="mt-3 mb-5 w-100 btn btn-primary btn-lg">Cadastrar</button>
        </form>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Ações</th>
            <th>Tarefa</th>
            <th>Descrição</th>
            <th>Prazo</th>
        </tr>
        <?php if (empty($tarefas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma tarefa encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($tarefas as $tarefa) : ?>
            <tr>
                <td class="table-col-buttons">
                    <a href="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() . '/editar' ?>" class="btn btn-primary btn-xs" title="Editar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>
                    </a>

                    <form action="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() ?>" method="post" class="d-inline-block">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-danger btn-xs" title="Deletar" onclick="event.preventDefault(); if (confirm('Você tem certeza?')) this.parentNode.submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </a>
                    </form>
                </td>
                <td><?= $tarefa->getNome() ?></td>
                <td><?= $tarefa->getDescricao() ?></td>
                <td><?= $tarefa->getPrazoFormatado() ?></td>
            </tr>
        <?php endforeach ?>        
    </table>
    <div>
        <?php if ($pagina > 1) : ?>
            <a href="<?= URL_RAIZ . 'tarefas?p=' . ($pagina-1) ?>" class="btn btn-default">Página anterior</a>
        <?php endif ?>
        <?php if ($pagina < $ultimaPagina) : ?>
            <a href="<?= URL_RAIZ . 'tarefas?p=' . ($pagina+1) ?>" class="btn btn-default">Próxima página</a>
        <?php endif ?>
    </div>
</div>