<?php

class Conta
{
    private $titular;  
    private $saldo;   
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function sacar(float $valorASacar)
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo Indisponível";
            return;
        }
        
        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar)
    {
        if ($valorADepositar <  0) {
            echo "Valor precisar ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;        
    }

    public function transferir(float $valorATransferir, Conta $contaDestino)
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }

    public static function recuperarNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
}