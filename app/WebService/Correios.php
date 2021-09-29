<?php

namespace App\WebService;

class Correios{

    /** URL Base da API
     * @var string
     */

    const URL_BASE = 'http://ws.correios.com.br';


    /**
     * Codigos de serviços dos correios
     * @var string
     */

    const SERVICO_SEDEX ='04014';
    const SERVICO_PAC ='04510';
    const SERVICO_SEDEX_10 ='04790';
    const SERVICO_SEDEX_12 ='04782';
    const SERVICO_SEDEX_HOJE ='04804';


    /**
     * Codigos Formato da encomenda (incluindo embalagem).
     * @var string
     */

    const FORMATO_CAIXA_PACOTE ='1';
    const FORMATO_ROLO_PRISMA ='2';
    const FORMATO_ENVELOPE ='3';


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
    //Parametros da URL de calculo

    $parametros = [
            'nCdEmpresa' => $this->codigoEmpresa, 
            'sDsSenha' => $this->senhaEmpresa,
            'nCdServico' => $codigoServico,
            'sCepOrigem' => $cepOrigem,
            'sCepDestino' => $cepDestino,
            'nVlPeso' => $peso,
            'nCdFormato' => $formato,
            'nVlComprimento' => $comprimento,
            'nVlAltura' => $altura,
            'nVlLargura' => $largura,
            'nVlDiametro' => $diamentro,
            'sCdMaoPropria' => $maoPropria ? 'S' : 'N', //IF TERNARIO, se o mão propria retornar true ele recebe S se retornar false recebe N
            'nVlValorDeclarado' => $valorDeclarado,
            'sCdAvisoRecebimento' => $avisoRecebimento ? 'S' : 'N',
            'StrRetorno' => 'xml'

        ];

 /*  print_r($parametros);
    echo "\n\n)"; */

        //query
        $query = http_build_query($parametros);

    //var_dump($query);

        //Executa a consulta de frete
        $resultado = $this->get('/calculador/CalcPrecoPrazo.asmx?'.$query);

        echo "<pre>";
        print_r($resultado);
        echo "</pre>";exit;
        }

        /**
         * Metodo responsavel por executar a consulta get no webservice dos correios
         * @param string $resource
         * @return object 
         */

        public function get($resource){

            //End Point completo
            $endpoint = self::URL_BASE.$resource;

            var_dump($endpoint);
            exit;

    }

}