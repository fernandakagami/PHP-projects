<?php

class Titular {
    private $cpf;
    private $nome;
    private $endereco;

    public function __construct(string $cpf, string $nome, Endereco $endereco)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }
}