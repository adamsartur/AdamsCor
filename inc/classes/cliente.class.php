<?php
class Cliente extends Base {
    
    /**
     * Variaveis da tabela
     */
    public $ID = null;
    public $ESTADO_ID = 23;
    public $CIDADE_ID = 7707;
    public $TIPO_CLIENTE = null;
    public $CPF = null;
    public $CNPJ = null;
    public $NOME = null;
    public $DATA_NASC = null;
    public $RG = null;
    public $ORGAO = null;
    public $ORG_EXPEDIDOR = null;
    public $ORG_DATA_EXPEDICAO = null;
    public $ENDERECO = null;
    public $NUMERO = null;
    public $COMPLEMENTO = null;
    public $BAIRRO = null;
    public $CEP = null;
    public $CNH = null;
    public $CNH_DATA_EXPEDICAO = null;
    public $SEXO = null;
    public $ESTADO_CIVIL = null;
    public $FONE = null;
    public $FONE2 = null;
    public $EMAIL = null;
    public $SITUACAO = null;
    public $OBS = null;
    public $ESTADO = null;
    public $CIDADE = null;
    
    
    /**
     * Construtor
     */
    public function __construct()
    {
        
    }
    
    
    /**
     * Pegando informações
     */
    public function informacoes()
    {
        $consultaClientes = mysql_query("
            SELECT * FROM CLIENTES
            WHERE ID = '".$this->ID."'
        ");
        
        if( mysql_num_rows($consultaClientes) > 0 ) {
            $arrayCliente = mysql_fetch_array($consultaClientes);

            $this->ESTADO_ID = $arrayCliente['ESTADO_ID'];
            $this->CIDADE_ID = $arrayCliente['CIDADE_ID'];
            $this->TIPO_CLIENTE = $arrayCliente['TIPO_CLIENTE'];
            $this->CPF = $arrayCliente['CPF'];
            $this->CNPJ = $arrayCliente['CNPJ'];
            $this->NOME = $arrayCliente['NOME'];
            $this->DATA_NASC = $arrayCliente['DATA_NASC'];
            $this->RG = $arrayCliente['RG'];
            $this->ORG_EXPEDIDOR = $arrayCliente['ORG_EXPEDIDOR'];
            $this->ORG_DATA_EXPEDICAO = $arrayCliente['ORG_DATA_EXPEDICAO'];
            $this->ENDERECO = $arrayCliente['ENDERECO'];
            $this->NUMERO = $arrayCliente['NUMERO'];
            $this->COMPLEMENTO = $arrayCliente['COMPLEMENTO'];
            $this->BAIRRO = $arrayCliente['BAIRRO'];
            $this->CEP = $arrayCliente['CEP'];
            $this->CNH = $arrayCliente['CNH'];
            $this->CNH_DATA_EXPEDICAO = $arrayCliente['CNH_DATA_EXPEDICAO'];
            $this->SEXO = $arrayCliente['SEXO'];
            $this->ESTADO_CIVIL = $arrayCliente['ESTADO_CIVIL'];
            $this->FONE = $arrayCliente['FONE'];
            $this->FONE2 = $arrayCliente['FONE2'];
            $this->EMAIL = $arrayCliente['EMAIL'];
            $this->SITUACAO = $arrayCliente['SITUACAO'];
            $this->OBS = $arrayCliente['OBS'];
            
            return true;
        } else {
            return false;
        }
    }
    
    
    /**
     * Inserindo
     */
    public function inserir()
    {
        $sql = "
            INSERT INTO clientes (
                TIPO_CLIENTE, CPF, CNPJ, NOME, DATA_NASC, RG, ORG_EXPEDIDOR, ORG_DATA_EXPEDICAO, ENDERECO, NUMERO, COMPLEMENTO, BAIRRO, CEP, CNH, CNH_DATA_EXPEDICAO, SEXO, ESTADO_CIVIL, FONE, FONE2, EMAIL, SITUACAO, OBS, CIDADE_ID, ESTADO_ID
            ) VALUES (
                    '".addslashes( $this->TIPO_CLIENTE )."',
                    '".addslashes( $this->CPF )."',
                    '".addslashes( $this->CNPJ )."',
                    '".addslashes( $this->NOME )."',
                    ".$this->DATA_NASC.",
                    '".addslashes( $this->RG )."',
                    '".addslashes( $this->ORGAO )."',
                    ".$this->ORG_DATA_EXPEDICAO.",
                    '".addslashes( $this->ENDERECO )."',
                    '".addslashes( $this->NUMERO )."',
                    '".addslashes( $this->COMPLEMENTO )."',
                    '".addslashes( $this->BAIRRO )."',
                    '".addslashes( $this->CEP )."',
                    '".addslashes( $this->CNH )."',
                    ".$this->CNH_DATA_EXPEDICAO.",
                    '".addslashes( $this->SEXO )."',
                    '".addslashes( $this->ESTADO_CIVIL )."',
                    '".addslashes( $this->FONE )."',
                    '".addslashes( $this->FONE2 )."',
                    '".addslashes( $this->EMAIL )."',
                    '".addslashes( $this->SITUACAO)."',
                    '".addslashes( $this->OBS )."',
                    '".addslashes( $this->CIDADE_ID )."',
                    '".addslashes( $this->ESTADO_ID )."'
            );
        ";
        
        if( mysql_query($sql) ) {
            return true;
        } else {
            die(mysql_error());
            return false;
        }
    }
    
}
