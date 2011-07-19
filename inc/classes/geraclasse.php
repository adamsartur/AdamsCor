<?php
$classe = 'auto';
$tabela = 'auto';
//$nomeFuncao = 'inserirRe';
$re = array(
    'ID',
    'TIPO_CADASTRO',
    'CLIENTE',
    'CIA_ID',
    'CEP',
    'ENDERECO',
    'NUMERO',
    'COMPLEMENTO',
    'CIDADE_ID',
    'OCUPACAO',
    'CONSTRUCAO',
    'APOLICE',
    'PREMIO',
    'PARCELAMENTO',
    'DATA_VENCIMENTO',
    'DATA_CADASTRO',
    'VIGENCIA_INICIO',
    'VIGENCIA_FIM',
    'FORMA_PAGAMENTO',
    'FIPE',
    'OBS',
    'INCENDIO',
    'VENDAVAL',
    'DANO_ELETRICO',
    'ROUBO',
    'RCF',
    'VIDROS',
    'PERDA_ALUGUEL',
    'PERIODO_INDENITARIO',
    'EQUIPAMENTOS_ELETRONICOS'
);

$auto = array(
    
        'ID',	 	 	 	 	 	
	'TIPO_CADASTRO',	 	 	 	 	 	 	
	'CLIENTE_ID',	 	 	 	 	 	 	
	'CIA_ID',	 	 	
	'MARCA_ID',	 	
	'DESCRICAO',		 	 	 	 	 	 	
	'ANO',		 	 	 	 	 	 	
	'KM_ANUAL',		 	 	 	 	 	 	
	'ZERO',	 	 	 	 	 	 	
	'PLACA',		 	 	 	 	 	 	
	'CHASSI',		 	 	 	 	 	 	
	'RENAVAM',		 	 	 	 	 	 	
	'CEP',		 	 	 	 	 	 	
	'FILHOS',	 	 	 	 	 	 	
	'COMBUSTIVEL', 	 	 	 	 	
	'GARAGEM_CASA',	 	 	 	 	
	'GARAGEM_TRABALHO',	 	
	'GARAGEM_FACULDADE',	 	 	 	
	'BONUS',	 	
	'APOLICE',	 	 	 	 	
	'VIGENCIA_INICIO',	 	 	
	'VIGENCIA_FIM', 	 	 	 	 	 	
	'CI',	 	 	 	 	 	 	
	'PREMIO',	 	 	 	 	
	'PARCELAMENTO',	 	 	 	 	 	 	
	'FORMA_PAGAMENTO', 	 	 	 	 	 	
	'DATA_VENCIMENTO',	 	 	
	'DANOS_MORAIS',	 	 	 	 	 	 	
	'FIPE',	 	 	 	 	 	 	
	'FRANQUIA',	 	 	 	 	 	 	
	'DM',	 	 	 	 	
	'DC', 	 	 	 	 	 	
	'APP', 	 	 	 	
	'VIDROS', 	 	 	 	
	'ASSISTENCIA', 	 	 	 	 	 	
	'CARRO_RESERVA', 	 	 	 	 	 	
	'OBS'
    
);

//faz os public do array
function declarar($array){
    foreach($array as $i):
        echo 'public $'.$i.';'?><br><?;
    endforeach;
}

//faz o insert do $array na $tabela
function insert($array, $tabela){
    echo 'public function inserir()
    {
        $sql = "
            INSERT INTO '.$tabela.' (';
    foreach($array as $i):
       ?><br><? echo $i.', ';
    endforeach;
        echo ') VALUES (';
    foreach($array as $i):
       ?><br><? echo  '\'".addslashes( $this->'.$i.' )."\',';
    endforeach;
    echo '}';
}



//faz update do $array na $tabela
function update($array, $tabela){
echo '$sql = "
        UPDATE '.$tabela.' SET ';
foreach($array as $i):
    ?><br><? echo $i. ' =\'".addslashes( $this->'.$i.' )."\',';
endforeach;
echo '"';
echo 'mysql_query($sql)';
}

//verifica informacoes do $array na $tabela pelo id
function info($array, $tabela){
        echo '$consulta = mysql_query("
        SELECT * FROM '.$tabela.'
        WHERE ID = \'".$this->ID."\'
        ");

        if( mysql_num_rows($consulta) > 0 ) {
            $arrayConsulta = mysql_fetch_array($consulta);';

        foreach($array as $i):
        ?><br><? echo '$this->'.$i.' = $arrayConsulta[\''.$i.'\'];';
        endforeach;       

        echo'    return true;
        } else {
            return false;
        }';
    }
    
    
//faz os public do array
function this($array, $classe){
    foreach($array as $i):
        echo '$'.$classe.'->'.$i.' = post(\''.$i.'\');'?><br><?;
    endforeach;
}
echo this($auto, $tabela);