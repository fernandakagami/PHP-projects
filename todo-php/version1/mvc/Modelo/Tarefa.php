<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Tarefa extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM tarefas ORDER BY nome';
    const BUSCAR_ID = 'SELECT * FROM tarefas WHERE id = ?';
    const INSERIR = 'INSERT INTO tarefas(nome, prazo) VALUES (?, ?)';
    const ATUALIZAR = 'UPDATE tarefas SET nome = ?, prazo = ? WHERE id = ?';
    const DELETAR = 'DELETE FROM tarefas WHERE id = ?';
    private $id;
    private $nome;
    private $prazo;    

    public function __construct(
        $nome = null,
        $prazo = null,       
        $id = null
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->prazo = $prazo;        
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
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

    public function setNome($nome)
    {
        $this->nome = $nome;
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
        $comando->bindValue(2, $this->prazo);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->prazo);
        $comando->bindValue(3, $this->id, PDO::PARAM_INT);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Tarefa(
                $registro['nome'],
                $registro['prazo'],                
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
            $registro['prazo'],           
            $registro['id']
        );
    }

    public static function destruir($id)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }
}
