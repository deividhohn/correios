<?php

require __DIR__.'/vendor/autoload.php';

//Define a dependencia
use \App\WebService\Correios;

//Instanciar a classe correios
$obCorreios = new correios();


$codigoServico = Correios::SERVICO_SEDEX_10;
$cepOrigem = "89809557";
$cepDestino = "89700973";
$peso = 1;
$formato = Correios::FORMATO_CAIXA_PACOTE;
$comprimento = 15;
$altura = 15;
$largura = 15;
$diamentro = 0;
$maoPropria = false;
$valorDeclarado = 0;
$avisoRecebimento = false;

$frete = $obCorreios->calcularFrete(
                                    $codigoServico,
                                    $cepOrigem,
                                    $cepDestino,
                                    $peso,
                                    $formato,
                                    $comprimento,
                                    $altura,
                                    $largura,
                                    $diamentro,
                                    $maoPropria,
                                    $valorDeclarado,
                                    $avisoRecebimento);

print_r($frete);
