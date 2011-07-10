<?php

//$tabela = 're';
//$nomeFuncao = 'inserirRe';
//$array = array(
//    'ID',
//    'TIPO_CADASTRO',
//    'CLIENTE',
//    'CIA_ID',
//    'CEP',
//    'ENDERECO',
//    'NUMERO',
//    'COMPLEMENTO',
//    'CIDADE_ID',
//    'OCUPACAO',
//    'CONSTRUCAO',
//    'APOLICE',
//    'PREMIO',
//    'PARCELAMENTO',
//    'DATA_VENCIMENTO',
//    'DATA_CADASTRO',
//    'VIGENCIA_INICIO',
//    'VIGENCIA_FIM',
//    'FORMA_PAGAMENTO',
//    'FIPE',
//    'OBS',
//);

//faz os public do array
function funcPublic($array){
    foreach($array as $i):
        echo 'public $'.$i.';'?><br><?;
    endforeach;
}

//faz o insert do $array na $tabela
function funcInsert($array, $tabela){
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
function funcUpdate($array, $tabela){
echo '$sql = "
        UPDATE '.$tabela.' SET ';
foreach($array as $i):
    ?><br><? echo $i. ' =\'".addslashes( $this->'.$i.' )."\',';
endforeach;
echo '"';
echo 'mysql_query($sql)';
}

//verifica informacoes do $array na $tabela pelo id
function funcInfo($array, $tabela){
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
    
    
      //////////////////////
     /// CLASS CREATOR  ///
    /// BY ARTUR ADAMS ///
   ///     ;D         ///
  //////////////////////