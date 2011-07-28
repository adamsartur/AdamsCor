<?php

class Auto extends Base {

    public $ID;
    public $TIPO_CADASTRO;
    public $CLIENTE_ID;
    public $CIA_ID;
    public $MARCA_ID;
    public $CEP;
    public $DESCRICAO;
    public $ANO;
    public $KM_ANUAL;
    public $ZERO;
    public $PLACA;
    public $CHASSI;
    public $RENAVAM;
    public $FILHOS;
    public $COMBUSTIVEL;
    public $GARAGEM_CASA;
    public $GARAGEM_TRABALHO;
    public $GARAGEM_FACULDADE;
    public $BONUS;
    public $APOLICE;
    public $VIGENCIA_INICIO;
    public $VIGENCIA_FIM;
    public $CI;
    public $PREMIO;
    public $PARCELAMENTO;
    public $FORMA_PAGAMENTO;
    public $DATA_VENCIMENTO;
    public $DANOS_MORAIS;
    public $FIPE;
    public $FRANQUIA;
    public $DM;
    public $DC;
    public $APP;
    public $VIDROS;
    public $ASSISTENCIA;
    public $CARRO_RESERVA;
    public $OBS;
    public $ANEXO;
        
    public $endossar = false;
    
    /**
     * Pasta de localização do anexo
     */
    public $pasta = 'files/anexos/auto/';

    
    public function informacoes() {
        $consultaAuto = mysql_query("
            SELECT * FROM AUTO
            WHERE ID = '" . $this->ID . "'
        ");

        if (mysql_num_rows($consultaAuto) > 0) {
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
            $this->ANEXO = $arrayAuto['ANEXO'];

            return true;
        } else {
            return false;
        }
    }

    /**
     * Inserindo
     * 
     * @return boolean
     */
    public function inserir()
    {
        $this->PLACA = strtoupper( $this->PLACA );
        
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
                '" . addslashes($this->TIPO_CADASTRO) . "',
                '" . addslashes($this->CLIENTE_ID) . "',
                '" . addslashes($this->CIA_ID) . "',
                '" . addslashes($this->MARCA_ID) . "',
                '" . addslashes($this->DESCRICAO) . "',
                '" . addslashes($this->ANO) . "',
                '" . addslashes($this->KM_ANUAL) . "',
                '" . addslashes($this->ZERO) . "',
                '" . addslashes($this->PLACA) . "',
                '" . addslashes($this->CHASSI) . "',
                '" . addslashes($this->RENAVAM) . "',
                '" . addslashes($this->CEP) . "',
                '" . addslashes($this->FILHOS) . "',
                '" . addslashes($this->COMBUSTIVEL) . "',
                '" . addslashes($this->GARAGEM_CASA) . "',
                '" . addslashes($this->GARAGEM_TRABALHO) . "',
                '" . addslashes($this->GARAGEM_FACULDADE) . "',
                '" . addslashes($this->BONUS) . "',
                '" . addslashes($this->APOLICE) . "',
                '" . formatarDataBR($this->VIGENCIA_INICIO) . "',
                '" . formatarDataBR($this->VIGENCIA_FIM) . "',
                '" . addslashes($this->CI) . "',
                '" . addslashes($this->PREMIO) . "',
                '" . addslashes($this->PARCELAMENTO) . "', 
                '" . addslashes($this->FORMA_PAGAMENTO) . "',
                '" . formatarDataBR($this->DATA_VENCIMENTO) . "',
                '" . addslashes($this->DANOS_MORAIS) . "',
                '" . addslashes($this->FIPE) . "',
                '" . addslashes($this->FRANQUIA) . "',
                '" . addslashes($this->DM) . "',
                '" . addslashes($this->DC) . "',
                '" . addslashes($this->APP) . "',
                '" . addslashes($this->VIDROS) . "',
                '" . addslashes($this->ASSISTENCIA) . "',
                '" . addslashes($this->CARRO_RESERVA) . "',
                '" . addslashes($this->OBS) . "'                        
            );
        ";

        if( mysql_query($sql) ) {
            $this->ID = mysql_insert_id();
            $this->verificaBoleto();
            
            return true;
        } else {
            return false;

        }
    }

    public function editar()
    {
        $this->PLACA = strtoupper( $this->PLACA );
        
        $sql = "
            UPDATE auto SET
                TIPO_CADASTRO      = '" . addslashes($this->TIPO_CADASTRO) . "',
                CLIENTE_ID         = '" . addslashes($this->CLIENTE_ID) . "',
                CIA_ID             = '" . addslashes($this->CIA_ID) . "',
                MARCA_ID           = '" . addslashes($this->MARCA_ID) . "',
                DESCRICAO          = '" . addslashes($this->DESCRICAO) . "',
                ANO                = '" . addslashes($this->ANO) . "',
                KM_ANUAL           = '" . addslashes($this->KM_ANUAL) . "',
                ZERO               = '" . addslashes($this->ZERO) . "',
                PLACA              = '" . addslashes($this->PLACA) . "',
                CHASSI             = '" . addslashes($this->CHASSI) . "',
                RENAVAM            = '" . addslashes($this->RENAVAM) . "',
                CEP                = '" . addslashes($this->CEP) . "',
                FILHOS             = '" . addslashes($this->FILHOS) . "',
                COMBUSTIVEL        = '" . addslashes($this->COMBUSTIVEL) . "',
                GARAGEM_CASA       = '" . addslashes($this->GARAGEM_CASA) . "',
                GARAGEM_TRABALHO   = '" . addslashes($this->GARAGEM_TRABALHO) . "',
                GARAGEM_FACULDADE  = '" . addslashes($this->GARAGEM_FACULDADE) . "',
                BONUS              = '" . addslashes($this->BONUS) . "',
                APOLICE            = '" . addslashes($this->APOLICE) . "',
                VIGENCIA_INICIO    = '" . formatarDataBR($this->VIGENCIA_INICIO) . "',
                VIGENCIA_FIM       = '" . formatarDataBR($this->VIGENCIA_FIM) . "',
                CI                 = '" . addslashes($this->CI) . "',
                PREMIO             = '" . addslashes($this->PREMIO) . "',
                PARCELAMENTO       = '" . addslashes($this->PARCELAMENTO) . "', 
                FORMA_PAGAMENTO    = '" . addslashes($this->FORMA_PAGAMENTO) . "',
                DATA_VENCIMENTO    = '" . formatarDataBR($this->DATA_VENCIMENTO) . "',
                DANOS_MORAIS       = '" . addslashes($this->DANOS_MORAIS) . "',
                FIPE               = '" . addslashes($this->FIPE) . "',
                FRANQUIA           = '" . addslashes($this->FRANQUIA) . "',
                DM                 = '" . addslashes($this->DM) . "',
                DC                 = '" . addslashes($this->DC) . "',
                APP                = '" . addslashes($this->APP) . "',
                VIDROS             = '" . addslashes($this->VIDROS) . "',
                ASSISTENCIA        = '" . addslashes($this->ASSISTENCIA) . "',
                CARRO_RESERVA      = '" . addslashes($this->CARRO_RESERVA) . "',
                OBS                = '" . addslashes($this->OBS) . "'  
                    
             WHERE ID = '" . addslashes($this->ID) . "'
          ";
        if( mysql_query($sql) ) {
            return true;
        } else {
            die( '<pre>' . $sql . '</pre>' . mysql_error());
        }
    }
    
    public function apolice() {
        $sql = "
            UPDATE auto SET
                TIPO_CADASTRO      = 'A',
                APOLICE            = '" . addslashes($this->APOLICE) . "',
                CI                 = '" . addslashes($this->CI) . "'             
             WHERE ID = '" . addslashes($this->ID) . "'
          ";
        mysql_query($sql) or die(mysql_error());
    }
    
    public function excluir()
    {
        $sql = mysql_query("
            DELETE FROM auto  
            WHERE ID =  '".$this->ID."' 
        ") or die( mysql_error() );        
    }

    public function endosso($id){
        $sql = "
            UPDATE auto SET
                VIGENCIA_FIM                      ='".addslashes( formatarDataBR($this->VIGENCIA_INICIO) )."'
           WHERE ID ='".addslashes( $id )."'
          ";
        
        mysql_query($sql) or die( '<pre>' . $sql . '</pre>' . mysql_error());
    }     
   
    
        
    /**
     * Anexando o arquivo
     */
    public function anexar($idCliente = null)
    {
        $this->pegarPasta();
        
        /* criando a pasta */
        if( !is_dir($this->pasta) ) {
            mkdir($this->pasta, 0775);
            chmod($this->pasta, 0775);
        }
        
        /* carregando o arquivo */
        if( is_array($this->ANEXO) && isset($this->ANEXO['size']) ) {
            if( $this->ANEXO['size'] > 0 ) {
                $nome = $idCliente . '-' . $this->ID . '.pdf';
                
                if( move_uploaded_file($this->ANEXO['tmp_name'], $this->pasta . $nome ) ) {
                    $resArquivo = mysql_query("
                        UPDATE auto SET 
                            ANEXO = '".$nome."' 
                        WHERE ID = '".addslashes($this->ID)."'
                    ");
                }
            }
        }
    }
    
    
    public function pegarPasta()
    {
        $this->pasta = $this->pasta . $this->ID . '/';
    }
    
    
    
    /**
     * Verificando precisa criar tarefa pra boleto
     * 
     * @access public
     * @return void
     */
    public function verificaBoleto()
    {
        
        if( $this->FORMA_PAGAMENTO != 1 && $this->PARCELAMENTO >= 1 && $this->PARCELAMENTO <= 12 ) {
            /* pegando informações do cliente */
            include_once('cliente.class.php');
            $cliente = new Cliente();
            $cliente->ID = $this->CLIENTE_ID;
            $cliente->informacoes();
            
            /* inserindo as tarefas */
            include_once('tarefa.class.php');
            $tarefa = new Tarefa();
            $tarefa->AUTO_ID   = $this->ID;
            $tarefa->DESCRICAO = ( $this->FORMA_PAGAMENTO == 2 ? 'Cheque' : 'Boleto' ) . ' - ' . $cliente->NOME;
            
            $vigenciaInicio          = explode('/', $this->VIGENCIA_FIM);
            $dataVencimento          = mktime(0, 0, 0, $vigenciaInicio[1], $vigenciaInicio[0] + 7, $vigenciaInicio[2]);
            $tarefa->DATA_VENCIMENTO = date('Y-m-d', $dataVencimento);
                    
            $tarefa->inserir();
        }
    }
    
}