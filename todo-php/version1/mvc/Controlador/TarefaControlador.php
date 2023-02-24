<?php
namespace Controlador;

use \Modelo\Tarefa;

class TarefaControlador extends Controlador
{
    public function index()
    {
        $tarefas = Tarefa::buscarTodos();
        $this->visao('tarefas/index.php', [
            'tarefas' => $tarefas
        ]);
    }

    public function mostrar($id)
    {
        $tarefa = Tarefa::buscarId($id);
        $this->visao('tarefas/mostrar.php', [
            'tarefa' => $tarefa
        ]);
    }

    public function criar()
    {
        $this->visao('tarefas/criar.php');
    }

    public function armazenar()
    {
        $tarefa = new Tarefa($_POST['nome'],
            $_POST['prazo'],
        );
        $tarefa->salvar();
        $this->redirecionar(URL_RAIZ . 'tarefas');
    }

    public function editar($id)
    {
        $tarefa = Tarefa::buscarId($id);
        $this->visao('tarefas/editar.php', [
            'tarefa' => $tarefa
        ]);
    }

    public function atualizar($id)
    {
        $tarefa = Tarefa::buscarId($id);
        $tarefa->setNome($_POST['nome']);
        $tarefa->setPrazo($_POST['prazo']);
        $tarefa->salvar();
        $this->redirecionar(URL_RAIZ . 'tarefas');
    }

    public function destruir($id)
    {
        Tarefa::destruir($id);
        $this->redirecionar(URL_RAIZ . 'tarefas');
    }
}
