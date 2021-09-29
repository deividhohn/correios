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

}