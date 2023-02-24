<div class="center-block site">
    <h1 class="text-center">Agenda de tarefas</h1>
    <nav>
        <form action="<?= URL_RAIZ . 'tarefas' ?>" method="post">
            <div class="form-group">
                <label class="control-label" for="nome">Tarefa</label>
                <input id="nome" name="nome" class="form-control" type='text' autofocus>
            </div>
            <div class="form-group">
                <label class="control-label" for="prazo">Prazo</label>
                <input id="prazo" name="prazo" class="form-control" type="date">
            </div>            
            <button type="submit" class="btn btn-primary center-block">Cadastrar</button>
        </form>
    </nav>
    <table class="table">
        <tr>
            <th>Ações</th>
            <th>Tarefa</th>
            <th>Prazo</th>           
        </tr>
        <?php if (empty($tarefas)) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma tarefa encontrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($tarefas as $tarefa) : ?>
            <tr>
                <td>
                    <a href="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() ?>" class="btn btn-default btn-xs" title="Mostrar">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>

                    <a href="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() . '/editar' ?>" class="btn btn-primary btn-xs" title="Editar">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>

                    <form action="<?= URL_RAIZ . 'tarefas/' . $tarefa->getId() ?>" method="post" class="inline">
                        <input type="hidden" name="_metodo" value="DELETE">
                        <a href="" class="btn btn-danger btn-xs" title="Deletar" onclick="event.preventDefault(); if (confirm('Você tem certeza?')) this.parentNode.submit();">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </form>
                </td>
                <td><?= $tarefa->getNome() ?></td>
                <td><?= $tarefa->getPrazoFormatado() ?></td>                
            </tr>
        <?php endforeach ?>
    </table>
</div>
