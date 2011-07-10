<?php
class Re extends Base {
    
    public $ID;
    public $TIPO_CADASTRO;
    public $CLIENTE_ID;
    public $CIA_ID;
    public $CEP;
    public $ENDERECO;
    public $NUMERO;
    public $COMPLEMENTO;
    public $CIDADE_ID;
    public $OCUPACAO;
    public $CONSTRUCAO;
    public $APOLICE;
    public $PREMIO;
    public $PARCELAMENTO;
    public $DATA_VENCIMENTO;
    public $DATA_CADASTRO;
    public $VIGENCIA_INICIO;
    public $VIGENCIA_FIM;
    public $FORMA_PAGAMENTO;
    public $OBS;
    public $INCENDIO;
    public $VENDAVAL;
    public $DANO_ELETRICO;
    public $ROUBO;
    public $RCF;
    public $VIDROS;
    public $PERDA_ALUGUEL;
    public $PERIODO_INDENITARIO;
    public $EQUIPAMENTOS_ELETRONICOS;
    
public function informacoes(){
    $consulta = mysql_query(" 
        SELECT * FROM re WHERE ID = '".$this->ID."' 
            "); 
    if( mysql_num_rows($consulta) > 0 ) { 
        $arrayConsulta = mysql_fetch_array($consulta);
        $this->TIPO_CADASTRO = $arrayConsulta['TIPO_CADASTRO'];
        $this->CLIENTE_ID = $arrayConsulta['CLIENTE_ID'];
        $this->CIA_ID = $arrayConsulta['CIA_ID'];
        $this->CEP = $arrayConsulta['CEP'];
        $this->ENDERECO = $arrayConsulta['ENDERECO'];
        $this->NUMERO = $arrayConsulta['NUMERO'];
        $this->COMPLEMENTO = $arrayConsulta['COMPLEMENTO'];
        $this->CIDADE_ID = $arrayConsulta['CIDADE_ID'];
        $this->OCUPACAO = $arrayConsulta['OCUPACAO'];
        $this->CONSTRUCAO = $arrayConsulta['CONSTRUCAO'];
        $this->APOLICE = $arrayConsulta['APOLICE'];
        $this->PREMIO = $arrayConsulta['PREMIO'];
        $this->PARCELAMENTO = $arrayConsulta['PARCELAMENTO'];
        $this->DATA_VENCIMENTO = $arrayConsulta['DATA_VENCIMENTO'];
        $this->DATA_CADASTRO = $arrayConsulta['DATA_CADASTRO'];
        $this->VIGENCIA_INICIO = $arrayConsulta['VIGENCIA_INICIO'];
        $this->VIGENCIA_FIM = $arrayConsulta['VIGENCIA_FIM'];
        $this->FORMA_PAGAMENTO = $arrayConsulta['FORMA_PAGAMENTO'];
        $this->OBS = $arrayConsulta['OBS'];
        $this->INCENDIO = $arrayConsulta['INCENDIO'];
        $this->VENDAVAL = $arrayConsulta['VENDAVAL'];
        $this->DANO_ELETRICO = $arrayConsulta['DANO_ELETRICO'];
        $this->ROUBO = $arrayConsulta['ROUBO'];
        $this->RCF = $arrayConsulta['RCF'];
        $this->VIDROS = $arrayConsulta['VIDROS'];
        $this->PERDA_ALUGUEL = $arrayConsulta['PERDA_ALUGUEL'];
        $this->PERIODO_INDENITARIO = $arrayConsulta['PERIODO_INDENITARIO'];
        $this->EQUIPAMENTOS_ELETRONICOS = $arrayConsulta['EQUIPAMENTOS_ELETRONICOS']; 
        
        return true; 
        
    } else { return false; }

}
    
    public function inserir() { $sql = " INSERT INTO re (
    TIPO_CADASTRO, 
    CLIENTE_ID, 
    CIA_ID, 
    CEP, 
    ENDERECO, 
    NUMERO, 
    COMPLEMENTO, 
    CIDADE_ID, 
    OCUPACAO, 
    CONSTRUCAO, 
    APOLICE, 
    PREMIO, 
    PARCELAMENTO, 
    DATA_VENCIMENTO, 
    DATA_CADASTRO, 
    VIGENCIA_INICIO, 
    VIGENCIA_FIM, 
    FORMA_PAGAMENTO, 
    OBS, 
    INCENDIO, 
    VENDAVAL, 
    DANO_ELETRICO, 
    ROUBO, 
    RCF, 
    VIDROS, 
    PERDA_ALUGUEL, 
    PERIODO_INDENITARIO, 
    EQUIPAMENTOS_ELETRONICOS
        ) VALUES (
    '".addslashes( $this->TIPO_CADASTRO )."',
    '".addslashes( $this->CLIENTE_ID )."',
    '".addslashes( $this->CIA_ID )."',
    '".addslashes( $this->CEP )."',
    '".addslashes( $this->ENDERECO )."',
    '".addslashes( $this->NUMERO )."',
    '".addslashes( $this->COMPLEMENTO )."',
    '".addslashes( $this->CIDADE_ID )."',
    '".addslashes( $this->OCUPACAO )."',
    '".addslashes( $this->CONSTRUCAO )."',
    '".addslashes( $this->APOLICE )."',
    '".addslashes( $this->PREMIO )."',
    '".addslashes( $this->PARCELAMENTO )."',
    '".addslashes( $this->DATA_VENCIMENTO )."',
    '".addslashes( $this->DATA_CADASTRO )."',
    '".addslashes( $this->VIGENCIA_INICIO )."',
    '".addslashes( $this->VIGENCIA_FIM )."',
    '".addslashes( $this->FORMA_PAGAMENTO )."',
    '".addslashes( $this->OBS )."',
    '".addslashes( $this->INCENDIO )."',
    '".addslashes( $this->VENDAVAL )."',
    '".addslashes( $this->DANO_ELETRICO )."',
    '".addslashes( $this->ROUBO )."',
    '".addslashes( $this->RCF )."',
    '".addslashes( $this->VIDROS )."',
    '".addslashes( $this->PERDA_ALUGUEL )."',
    '".addslashes( $this->PERIODO_INDENITARIO )."',
    '".addslashes( $this->EQUIPAMENTOS_ELETRONICOS )."'
        );
    ";
        if( mysql_query($sql) ) {
            return true;
        } else {
            echo mysql_error().$sql;
            return false;
        }
    }
    public function update(){
        $sql = "
            UPDATE re SET
                TIPO_CADASTRO                ='".addslashes( $this->TIPO_CADASTRO )."',
                CLIENTE_ID                   ='".addslashes( $this->CLIENTE_ID )."',
                CIA_ID                       ='".addslashes( $this->CIA_ID )."',
                CEP                          ='".addslashes( $this->CEP )."',
                ENDERECO                     ='".addslashes( $this->ENDERECO )."',
                NUMERO                       ='".addslashes( $this->NUMERO )."',
                COMPLEMENTO                  ='".addslashes( $this->COMPLEMENTO )."',
                CIDADE_ID                    ='".addslashes( $this->CIDADE_ID )."',
                OCUPACAO                     ='".addslashes( $this->OCUPACAO )."',
                CONSTRUCAO                   ='".addslashes( $this->CONSTRUCAO )."',
                APOLICE                      ='".addslashes( $this->APOLICE )."',
                PREMIO                       ='".addslashes( $this->PREMIO )."',
                PARCELAMENTO                 ='".addslashes( $this->PARCELAMENTO )."',
                DATA_VENCIMENTO              ='".addslashes( $this->DATA_VENCIMENTO )."',
                DATA_CADASTRO                ='".addslashes( $this->DATA_CADASTRO )."',
                VIGENCIA_INICIO              ='".addslashes( $this->VIGENCIA_INICIO )."',
                VIGENCIA_FIM                 ='".addslashes( $this->VIGENCIA_FIM )."',
                FORMA_PAGAMENTO              ='".addslashes( $this->FORMA_PAGAMENTO )."',
                OBS                          ='".addslashes( $this->OBS )."',
                INCENDIO                     ='".addslashes( $this->INCENDIO )."',
                VENDAVAL                     ='".addslashes( $this->VENDAVAL )."',
                DANO_ELETRICO                ='".addslashes( $this->DANO_ELETRICO )."',
                ROUBO                        ='".addslashes( $this->ROUBO )."',
                RCF                          ='".addslashes( $this->RCF )."',
                VIDROS                       ='".addslashes( $this->VIDROS )."',
                PERDA_ALUGUEL                ='".addslashes( $this->PERDA_ALUGUEL )."',
                PERIODO_INDENITARIO          ='".addslashes( $this->PERIODO_INDENITARIO )."',
                EQUIPAMENTOS_ELETRONICOS     ='".addslashes( $this->EQUIPAMENTOS_ELETRONICOS )."'  
           WHERE ID ='".addslashes( $this->ID )."',
          ";
        mysql_query($sql) or die(mysql_error());
    }
}