<?php
class Tarefa {
    
    public
        $ID, 
	$RE_ID, 
	$AUTO_ID, 
	$DESCRICAO, 
	$DATA_VENCIMENTO, 
	$DATA_FINALIZACAO, 
	$DATA_CADASTRO, 
	$SITUACAO;
    
    
    /**
     * Inserindo uma nova tarefa
     * 
     * @access public
     * @return boolean
     */
    public function inserir()
    {
        $resTarefa = "
            INSERT INTO tarefas (
                RE_ID, AUTO_ID, DESCRICAO, DATA_VENCIMENTO, 
                DATA_FINALIZACAO, DATA_CADASTRO, SITUACAO
            ) VALUES (
                '".$this->RE_ID."', '".$this->AUTO_ID."', 
                '".$this->DESCRICAO."', '".$this->DATA_VENCIMENTO."', 
                '".$this->DATA_FINALIZACAO."', '".$this->DATA_CADASTRO."', 
                '".$this->SITUACAO."'
            )
        ";
        
        if( mysql_query( $resTarefa ) ) {
            return true;
        } else {
            return false;
        }
    }
    
}