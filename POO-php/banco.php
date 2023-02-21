<?php

require_once 'src/Conta.php';
require_once 'src/Endereco.php';
require_once 'src/Titular.php';

$endereco1 = new Endereco('cidadeA', 'um bairro', 'uma rua', '12A');
$endereco2 = new Endereco('cidadeB', 'um bairro', 'uma rua', '12B');

$conta1 = new Conta(new Titular("111.111.111-11", "Fernanda", $endereco1));
$conta2 = new Conta(new Titular("222.222.222-22", "Mila", $endereco2));

$conta1->depositar(100);
$conta2->depositar(200);

echo Conta::recuperarNumeroDeContas();

var_dump($conta1) . PHP_EOL;
var_dump($conta2) . PHP_EOL;