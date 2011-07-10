<?php
class Re extends Base {
    
    public $ID = null;
    public $TIPO_CADASTRO = null;
    public $CLIENTE_ID = null;
    public $CIA_ID = null;
    public $CEP = null;
    public $ENDERECO = null;
    public $NUMERO = null;
    public $COMPLEMENTO = null;
    public $CIDADE_ID = null;
    public $OCUPACAO = null;
    public $CONSTRUCAO = null;
    public $APOLICE = null;
    public $PREMIO = null;
    public $PARCELAMENTO = null;
    public $DATA_VENCIMENTO = null;
    public $DATA_CADASTRO = null;
    public $VIGENCIA_INICIO = null;
    public $VIGENCIA_FIM = null;
    public $FORMA_PAGAMENTO = null;
    public $FIPE = null;
    public $OBS = null;
    
    
    public function informacoes(){
        $consultaRe = mysql_query("
        SELECT * FROM RE
        WHERE ID = '".$this->ID."'
        ");

        if( mysql_num_rows($consultaRe) > 0 ) {
            $arrayRe = mysql_fetch_array($consultaRe);

            $this->TIPO_CADASTRO = $arrayRe['TIPO_CADASTRO'];
            $this->CLIENTE_ID = $arrayRe['CLIENTE_ID'];
            $this->CIA_ID = $arrayRe['CIA_ID'];
            $this->CEP = $arrayRe['CEP'];
            $this->ENDERECO = $arrayRe['ENDERECO'];
            $this->NUMERO = $arrayRe['NUMERO'];
            $this->COMPLEMENTO = $arrayRe['COMPLEMENTO'];
            $this->CIDADE_ID = $arrayRe['CIDADE_ID'];
            $this->OCUPACAO = $arrayRe['OCUPACAO'];
            $this->CONSTRUCAO = $arrayRe['CONSTRUCAO'];
            $this->APOLICE = $arrayRe['APOLICE'];
            $this->PREMIO = $arrayRe['PREMIO'];
            $this->PARCELAMENTO = $arrayRe['PARCELAMENTO'];
            $this->DATA_VENCIMENTO = $arrayRe['DATA_VENCIMENTO'];
            $this->DATA_CADASTRO = $arrayRe['DATA_CADASTRO'];
            $this->VIGENCIA_INICIO = $arrayRe['VIGENCIA_INICIO'];
            $this->VIGENCIA_FIM = $arrayRe['VIGENCIA_FIM'];
            $this->FORMA_PAGAMENTO = $arrayRe['FORMA_PAGAMENTO'];
            $this->FIPE = $arrayRe['FIPE'];
            $this->OBS = $arrayRe['OBS'];

            return true;
        } else {
            return false;
        }
    }
    
public function inserir()
    {
        $sql = "
            INSERT INTO re (
                TIPO_CADASTRO, CLIENTE, CIA_ID, CEP, ENDERECO, NUMERO, COMPLEMENTO, CIDADE_ID, OCUPACAO, CONSTRUCAO, APOLICE, PREMIO, PARCELAMENTO, DATA_VENCIMENTO, DATA_CADASTRO, VIGENCIA_INICIO, VIGENCIA_FIM, FORMA_PAGAMENTO, FIPE, OBS
            ) VALUES (
                    '".addslashes( $this->ID)."',
                    '".addslashes( $this->TIPO_CADASTRO)."',
                    '".addslashes( $this->CLIENTE)."',
                    '".addslashes( $this->CIA_ID)."',
                    '".addslashes( $this->CEP)."',
                    '".addslashes( $this->ENDERECO)."',
                    '".addslashes( $this->NUMERO)."',
                    '".addslashes( $this->COMPLEMENTO)."',
                    '".addslashes( $this->CIDADE_ID)."',
                    '".addslashes( $this->OCUPACAO)."',
                    '".addslashes( $this->CONSTRUCAO)."',
                    '".addslashes( $this->APOLICE)."',
                    '".addslashes( $this->PREMIO)."',
                    '".addslashes( $this->PARCELAMENTO)."',
                    '".$this->DATA_VENCIMENTO."',
                    '".$this->DATA_CADASTRO."',
                    '".$this->VIGENCIA_INICIO."',
                    '".$this->VIGENCIA_FIM."',
                    '".addslashes( $this->FORMA_PAGAMENTO)."',
                    '".addslashes( $this->FIPE)."',
                    '".addslashes( $this->OBS)."',                        
            );
        ";

        mysql_query($sql) or die(mysql_error());
        
        if( mysql_query($sql) ) {
            return true;
        } else {
            return false;
        }
    }
    public function update(){
        $sql = "
            UPDATE re SET
                ID              ='".addslashes( $this->ID)."',
                TIPO_CADASTRO   ='".addslashes( $this->TIPO_CADASTRO)."',
                CLIENTE         ='".addslashes( $this->CLIENTE)."',
                CIA_ID          ='".addslashes( $this->CIA_ID)."',
                CEP             ='".addslashes( $this->CEP)."',
                ENDERECO        ='".addslashes( $this->ENDERECO)."',
                NUMERO          ='".addslashes( $this->NUMERO)."',
                COMPLEMENTO     ='".addslashes( $this->COMPLEMENTO)."',
                CIDADE_ID       ='".addslashes( $this->CIDADE_ID)."',
                OCUPACAO        ='".addslashes( $this->OCUPACAO)."',
                CONSTRUCAO      ='".addslashes( $this->CONSTRUCAO)."',
                APOLICE         ='".addslashes( $this->APOLICE)."',
                PREMIO          ='".addslashes( $this->PREMIO)."',
                PARCELAMENTO    ='".addslashes( $this->PARCELAMENTO)."',
                DATA_VENCIMENTO ='".$this->DATA_VENCIMENTO."',
                DATA_CADASTRO   ='".$this->DATA_CADASTRO."',
                VIGENCIA_INICIO ='".$this->VIGENCIA_INICIO."',
                VIGENCIA_FIM    ='".$this->VIGENCIA_FIM."',
                FORMA_PAGAMENTO ='".addslashes( $this->FORMA_PAGAMENTO)."',
                FIPE            ='".addslashes( $this->FIPE)."',
                OBS             ='".addslashes( $this->OBS)."',   
          ";
        mysql_query($sql) or die(mysql_error());
    }
}