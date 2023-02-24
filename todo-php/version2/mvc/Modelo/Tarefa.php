<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Tarefa extends Modelo
{
    const BUSCAR_POR_USUARIO = 'SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY prazo LIMIT ? OFFSET ?';
    const BUSCAR_ID = 'SELECT * FROM tarefas WHERE id = ?';
    const INSERIR = 'INSERT INTO tarefas(nome, descricao, prazo, usuario_id) VALUES (?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE tarefas SET nome = ?, descricao = ?, prazo = ? WHERE id = ?';
    const DELETAR = 'DELETE FROM tarefas WHERE id = ?';
    const CONTAR_TODOS = 'SELECT count(id) FROM tarefas WHERE usuario_id = ?';
    private $id;
    private $nome;
    private $descricao;
    private $prazo;    
    private $usuarioId;
    private $usuario;

    public function __construct(
        $nome = null,
        $descricao = null,
        $prazo = null,   
        $usuarioId = null,    
        $id = null
    ) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->prazo = $prazo;     
        $this->usuarioId = $usuarioId;   
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getPrazo()
    {
        return $this->prazo;
    }

    public function getPrazoFormatado()
    {
        $data = date_create($this->prazo);
        return date_format($data, 'd-m-Y');

    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function getUsuario()
    {
        if ($this->usuario == null) {
            $this->usuario = Usuario::buscarId($this->usuarioId);
        }
        return $this->usuario;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setPrazo($prazo)
    {
        $this->prazo = $prazo;
    }

    public function salvar()
    {
        if ($this->id == null) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->descricao);
        $comando->bindValue(3, $this->prazo);
        $comando->bindValue(4, $this->usuarioId, PDO::PARAM_INT);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome);
        $comando->bindValue(2, $this->descricao);
        $comando->bindValue(3, $this->prazo);       
        $comando->bindValue(4, $this->id);
        $comando->execute();
    }

    public static function buscarPorUsuario($usuarioId, $limit = 2, $offset = 0)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_POR_USUARIO);
        $comando->bindValue(1, $usuarioId, PDO::PARAM_INT);
        $comando->bindValue(2, $limit, PDO::PARAM_INT);
        $comando->bindValue(3, $offset, PDO::PARAM_INT);
        $comando->execute();
        $registros = $comando->fetchAll();        
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Tarefa(
                $registro['nome'],
                $registro['descricao'],  
                $registro['prazo'],                
                $registro['usuario_id'],   
                $registro['id']
            );
        }
        return $objetos;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Tarefa(
            $registro['nome'],
            $registro['descricao'],
            $registro['prazo'],
            $registro['usuario_id'],              
            $registro['id']
        );
    }

    public static function destruir($id)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }

    public static function contarTodos($usuarioId)
    {
        $comando = DW3BancoDeDados::prepare(self::CONTAR_TODOS);
        $comando->bindValue(1, $usuarioId, PDO::PARAM_INT);
        $comando->execute();
        $total = $comando->fetch();
        return intval($total[0]);
    }
}