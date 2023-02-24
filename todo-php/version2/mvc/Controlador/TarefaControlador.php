<?php
namespace Controlador;

use \Modelo\Tarefa;
use \Framework\DW3Sessao;

class TarefaControlador extends Controlador
{
    private function calcularPaginacao()
    {
        $pagina = array_key_exists('p', $_GET) ? intval($_GET['p']) : 1;
        $limit = 2;
        $offset = ($pagina - 1) * $limit;
        $usuario = $this->verificarLogado();                        
        $tarefas = Tarefa::buscarPorUsuario($usuario, $limit, $offset);           
        $ultimaPagina = ceil(Tarefa::contarTodos($usuario) / $limit);
        return compact('pagina', 'tarefas', 'ultimaPagina');
    }


    public function listar()
    {
        $this->verificarLogado();  
        $paginacao = $this->calcularPaginacao();
        $this->visao('tarefas/index.php', [
            'tarefas' => $paginacao['tarefas'],
            'pagina' => $paginacao['pagina'],
            'ultimaPagina' => $paginacao['ultimaPagina'],
            'mensagem' => DW3Sessao::getFlash('mensagemFlash')
        ]);
    }

    public function armazenar()
    {
        $usuario = $this->verificarLogado();
        $tarefa = new Tarefa(
            $_POST['nome'],
            $_POST['descricao'],
            $_POST['prazo'],
            $usuario
        );
        if ($tarefa->isValido()) {
            $tarefa->salvar();
            DW3Sessao::setFlash('mensagem', 'Tarefa cadastrada com sucesso.');
            $this->redirecionar(URL_RAIZ . 'tarefas');

        } else {
            $paginacao = $this->calcularPaginacao();
            $this->setErros($tarefa->getValidacaoErros());
            $this->visao('tarefas/index.php', [
                'tarefas' => $paginacao['tarefas'],
                'pagina' => $paginacao['pagina'],
                'ultimaPagina' => $paginacao['ultimaPagina'],
                'mensagem' => DW3Sessao::getFlash('mensagemFlash')
            ]);
        }        
    }

    public function editar($id)
    {
        $this->verificarLogado();
        $tarefa = Tarefa::buscarId($id);
        $this->visao('tarefas/editar.php', [
            'tarefa' => $tarefa
        ]);
    }

    public function atualizar($id)
    {
        $this->verificarLogado();
        $tarefa = Tarefa::buscarId($id);
        $tarefa->setNome($_POST['nome']); 
        $tarefa->setDescricao($_POST['descricao']);       
        $tarefa->setPrazo($_POST['prazo']);        
        $tarefa->salvar();
        DW3Sessao::setFlash('mensagem', 'Tarefa atualizada com sucesso.');
        $this->redirecionar(URL_RAIZ . 'tarefas');
    }

    public function destruir($id)
    {
        $this->verificarLogado();
        Tarefa::destruir($id);
        DW3Sessao::setFlash('mensagem', 'Tarefa deletada com sucesso.');
        $this->redirecionar(URL_RAIZ . 'tarefas');
    }
}

