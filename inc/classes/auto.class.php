<?php
class Auto extends Base {
    
    public $ID = null;
    public $TIPO_CADASTRO = null;
    public $CLIENTE_ID = null;
    public $CIA_ID = null;
    public $MARCA_ID = null;
    public $DESCRICAO = null;
    public $ANO = null;
    public $KM_ANUAL = null;
    public $ZERO = null;
    public $PLACA = null;
    public $CHASSI = null;
    public $RENAVAM = null;
    public $FILHOS = null;
    public $COMBUSTIVEL = null;
    public $GARAGEM_CASA = null;
    public $GARAGEM_TRABALHO = null;
    public $GARAGEM_FACULDADE = null;
    public $BONUS = null;
    public $APOLICE = null;
    public $VIGENCIA_INICIO = null;
    public $VIGENCIA_FIM = null;
    public $CI = null;
    public $PREMIO = null;
    public $PARCELAMENTO = null;
    public $FORMA_PAGAMENTO = null;
    public $DATA_VENCIMENTO = null;
    public $DANOS_MORAIS = null;
    public $FIPE = null;
    public $FRANQUIA = null;
    public $DM = null;
    public $DC = null;
    public $APP = null;
    public $VIDROS = null;
    public $ASSISTENCIA = null;
    public $CARRO_RESERVA = null;
    public $OBS = null;
    
        public function informacoesAuto()
    {
        $consultaAuto = mysql_query("
            SELECT * FROM AUTO
            WHERE ID = '".$this->ID."'
        ");
        
        if( mysql_num_rows($consultaAuto) > 0 ) {
            $arrayAuto = mysql_fetch_array($consultaAuto);

            $this->TIPO_CADASTRO = $arrayAuto['TIPO_CADASTRO'];
            $this->CLIENTE_ID = $arrayAuto['CLIENTE_ID'];
            $this->CIA_ID = $arrayAuto['CIA_ID'];
            $this->MARCA_ID = $arrayAuto['MARCA_ID'];
            $this->DESCRICAO = $arrayAuto['DESCRICAO'];
            $this->ANO = $arrayAuto['ANO'];
            $this->KM_ANUAL = $arrayAuto['KM_ANUAL'];
            $this->ZERO = $arrayAuto['ZERO'];
            $this->PLACA = $arrayAuto['PLACA'];
            $this->CHASSI = $arrayAuto['CHASSI'];
            $this->RENAVAM = $arrayAuto['RENAVAM'];
            $this->CEP = $arrayAuto['CEP'];
            $this->FILHOS = $arrayAuto['FILHOS'];
            $this->COMBUSTIVEL = $arrayAuto['COMBUSTIVEL'];
            $this->GARAGEM_CASA = $arrayAuto['GARAGEM_CASA'];
            $this->GARAGEM_TRABALHO = $arrayAuto['GARAGEM_TRABALHO'];
            $this->GARAGEM_FACULDADE = $arrayAuto['GARAGEM_FACULDADE'];
            $this->SEXO = $arrayAuto['SEXO'];
            $this->ESTADO_CIVIL = $arrayAuto['ESTADO_CIVIL'];
            $this->BONUS = $arrayAuto['BONUS'];
            $this->APOLICE = $arrayAuto['APOLICE'];
            $this->VIGENCIA_INICIO = $arrayAuto['VIGENCIA_INICIO'];
            $this->VIGENCIA_FIM = $arrayAuto['VIGENCIA_FIM'];
            $this->CI = $arrayAuto['CI'];
            $this->PREMIO = $arrayAuto['PREMIO'];
            $this->PARCELAMENTO = $arrayAuto['PARCELAMENTO'];
            $this->FORMA_PAGAMENTO = $arrayAuto['FORMA_PAGAMENTO'];
            $this->DATA_VENCIMENTO = $arrayAuto['DATA_VENCIMENTO'];
            $this->DANOS_MORAIS = $arrayAuto['DANOS_MORAIS'];
            $this->FIPE = $arrayAuto['FIPE'];
            $this->FRANQUIA = $arrayAuto['FRANQUIA'];
            $this->DM = $arrayAuto['DM'];
            $this->DC = $arrayAuto['DC'];
            $this->APP = $arrayAuto['APP'];
            $this->VIDROS = $arrayAuto['VIDROS'];
            $this->ASSISTENCIA = $arrayAuto['ASSISTENCIA'];
            $this->CARRO_RESERVA = $arrayAuto['CARRO_RESERVA'];            
            $this->OBS = $arrayAuto['OBS'];
            
            return true;
        } else {
            return false;
        }
    }
  
    
public function inserirAuto()
    {
        $sql = "
            INSERT INTO auto (
                TIPO_CADASTRO,
                CLIENTE_ID,
                CIA_ID,
                MARCA_ID,
                DESCRICAO,
                ANO,
                KM_ANUAL,
                ZERO,
                PLACA,
                CHASSI,
                RENAVAM,
                CEP,
                FILHOS,
                COMBUSTIVEL,
                GARAGEM_CASA,
                GARAGEM_TRABALHO,
                GARAGEM_FACULDADE,
                BONUS,
                APOLICE,
                VIGENCIA_INICIO,
                VIGENCIA_FIM,
                CI,
                PREMIO,
                PARCELAMENTO,
                FORMA_PAGAMENTO,
                DATA_VENCIMENTO,
                DANOS_MORAIS,
                FIPE,
                FRANQUIA,
                DM,
                DC,
                APP,
                VIDROS,
                ASSISTENCIA,
                CARRO_RESERVA,
                OBS
            ) VALUES (
                    '".addslashes( $this->TIPO_CADASTRO )."',
                    '".addslashes( $this->CLIENTE_ID )."',
                    '".addslashes( $this->CIA_ID )."',
                    '".addslashes( $this->MARCA_ID )."',
                    '".addslashes( $this->DESCRICAO )."',
                    '".addslashes( $this->ANO )."',
                    '".addslashes( $this->KM_ANUAL )."',
                    '".addslashes( $this->ZERO )."',
                    '".addslashes( $this->PLACA )."',
                    '".addslashes( $this->CHASSI )."',
                    '".addslashes( $this->RENAVAM )."',
                    '".addslashes( $this->CEP )."',
                    '".addslashes( $this->FILHOS )."',
                    '".addslashes( $this->COMBUSTIVEL )."',
                    '".addslashes( $this->GARAGEM_CASA )."',
                    '".addslashes( $this->GARAGEM_TRABALHO )."',
                    '".addslashes( $this->GARAGEM_FACULDADE )."',
                    '".addslashes( $this->BONUS )."',
                    '".addslashes( $this->APOLICE )."',
                    '".            $this->VIGENCIA_INICIO."',
                    '".            $this->VIGENCIA_FIM."',
                    '".addslashes( $this->CI )."',
                    '".addslashes( $this->PREMIO )."',
                    '".addslashes( $this->PARCELAMENTO )."'
                    '".addslashes( $this->FORMA_PAGAMENTO )."',
                    '".            $this->DATA_VENCIMENTO."',
                    '".addslashes( $this->DANOS_MORAIS )."',
                    '".addslashes( $this->FIPE )."',
                    '".addslashes( $this->FRANQUIA )."',
                    '".addslashes( $this->DM )."',
                    '".addslashes( $this->DC )."',
                    '".addslashes( $this->APP )."',
                    '".addslashes( $this->VIDROS)."',
                    '".addslashes( $this->ASSISTENCIA )."',
                    '".addslashes( $this->CARRO_RESERVA )."',
                    '".addslashes( $this->OBS )."'                        
            );
        ";
        
        if( mysql_query($sql) ) {
            return true;
        } else {
            return false;
        }
    }
    
}