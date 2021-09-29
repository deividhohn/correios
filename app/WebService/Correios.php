<?php

namespace App\WebService;

class Correios{

    /**
     * Código empresa com contrato
     *  @var string
     */
    private $codigoEmpresa = '';

    /**
     * Senha empresa contrato
     *  @var string
     */
    private $senhaEmpresa = '';


    /**
     * Método responsável pela definição dos dados da empresa
     * @param string $codigoEmpresa
     * @param string $senhaEmpresa
     */

    public function __construct ($codigoEmpresa = '', $senhaEmpresa = ''){
        //Definindo os dados Codigo e senha.
        $this->codigoEmpresa = $codigoEmpresa;
        $this->senhaEmpresa = $senhaEmpresa;

    }

    /**
     * Método responsavel por calular o frete
     * @param string $codigoServico
     * @param string $cepOrigem
     * @param string $cepDestino
     * @param float $peso
     * @param integer $formato
     * @param integer $comprimento
     * @param integer $altura
     * @param integer $largura
     * @param integer $diamentro
     * @param string $maoPropria
     * @param integer $valorDeclarado
     * @param string $avisoRecebimento
     * @return object //Retorna uma instancia do xml Objeto.
     */



    public function calcularFrete(  $codigoServico,
                                    $cepOrigem,
                                    $cepDestino,
                                    $peso,
                                    $formato,
                                    $comprimento,
                                    $altura,
                                    $largura,
                                    $diamentro = 0,
                                    $maoPropria = false,
                                    $valorDeclarado = 0,
                                    $avisoRecebimento = false){

    }

}