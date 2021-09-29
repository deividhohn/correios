<?php

require __DIR__.'/vendor/autoload.php';

//Define a dependencia
use \App\WebService\Correios;

//Instanciar a classe correios
$obCorreios = new correios();


$codigoServico = Correios::SERVICO_PAC;
$cepOrigem = "89812451";
$cepDestino = "88060232";
$peso = 1;
$formato = Correios::FORMATO_CAIXA_PACOTE;
$comprimento = 15;
$altura = 15;
$largura = 15;
$diamentro = 0;
$maoPropria = false;
$valorDeclarado = 0;
$avisoRecebimento = false;


$time_start = microtime(true);
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

$time_end = microtime(true);
$totaltime = $time_end - $time_start;
// Verifica o resultado 


if (!$frete){
    die('Problemas ao calcular o frete');
}

//Verifica o erro da posição msgerro
if (strlen($frete->MsgErro)){
    die ('Erro .$frete->MsgErro');
}

// Imprime os dados da consulta.

echo "Cep Origem".$cepOrigem."\n";
echo "Cep destino".$cepDestino."\n";
echo "Valor".$frete->Valor."\n";
echo "Prazo".$frete->PrazoEntrega."\n";
echo "Codigo serviço". $frete->Codigo."\n";

print_r("\n");
echo 'Tempoo de resposta da API foi dê: ' . $totaltime;
print_r("\n\n");

/*
echo"<pre>";
print_r($frete);
echo"</pre>";exit;
*/