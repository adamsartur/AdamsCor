<?php
require_once '../../_config.php';
require_once( 'dompdf_config.inc.php' );

ConectarBanco();

$id = @$_GET['id'];
switch (@$_GET['tipo']){
    case 're':
        $apolice = mysql_fetch_array(mysql_query('SELECT * FROM RE WHERE ID = ' .$id));
        $clienteID = @$apolice['CLIENTE_ID'];
        $cia = buscaDados('CIA', @$apolice['CIA_ID']);
        $cidade = buscaDados('CIDADES', @$apolice['CIDADE_ID']);
        $estado = buscaDados('ESTADOS', @$cidade['estado']);
        $body = '<div style="float:left; width:50%"> Vigência: '.formatarDataEN(@$apolice['VIGENCIA_INICIO']).' - '.formatarDataEN(@$apolice['VIGENCIA_FIM']).'</div><div>Cia: '.$cia['DESCRICAO'].'</div>
                 <div style="float:left; width:50%"> Apólice: '.@$apolice['APOLICE'].'</div><div>Prêmio: R$'.@$apolice['PREMIO'].'</div>
                 <div style="float:left; width:50%"> Bônus: '.@$apolice['BONUS'].'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Endereço: '.@$apolice['ENDERECO'].'</div><div>Bairro: '.@$apolice['BAIRRO'].'</div>
                 <div style="float:left; width:50%"> CEP: '.@$apolice['CEP'].'</div><div>Numero: '.@$apolice['NUMERO'].'</div>
                 <div style="float:left; width:50%"> Cidade: '.@$cidade['nome'].'</div><div>Estado: '.@$estado['nome'].'</div>
                 <div style="float:left; width:50%"> Ocupação: '.ucfirst(@$apolice['OCUPACAO']).'</div><div>Construção: '.ucfirst(@$apolice['Construcao']).'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Incendio: R$ '.@$apolice['INCENDIO'].'</div><div>Vendaval: R$ '.@$apolice['VENDAVAL'].'</div>
                 <div style="float:left; width:50%"> Dano Elétrico: R$ '.@$apolice['DANO_ELETRICO'].'</div><div>Roubo: R$ '.@$apolice['ROUBO'].'</div>
                 <div style="float:left; width:50%"> Perda de Aluguel: R$ '.@$apolice['PERDA_ALUGUEL'].'</div><div>Periodo Indenitário: R$ '.@$apolice['PERIODO_INDENITARIO'].'</div>
                 <div style="float:left; width:50%"> RCF: R$ '.@$apolice['RCF'].'</div><div>Vídros: R$'.@$apolice['VIDROS'].'</div>
                 <div style="float:left; width:50%"> Equipamentos Eletrônicos: R$ '.@$apolice['EQUIPAMENTOS_ELETRONICOS'].'</div></div>';
        //todos
    case 'auto':

    case 'cli':

}
    $cliente = buscaDados('CLIENTES', @$clienteID);
    if ($cliente['CPF']){
        $cpf = $cliente['CPF'];
    } else {
        $cpf = $cliente['CNPJ'];
    }
    $header = '<div style"width:100%><div style="float:left; width:50%;"> Nome: '.$cliente['NOME'].'</div><div>CPF/CNPJ: '.$cpf.'</div><hr>';
    $footer = '</div>';
    $all = $header.$body.$footer;

if(@$_GET['tipo']){
    $html =
      '<html>
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          </head>
        <body>'.
            $all.
        '</body>
      </html>';

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($cliente['NOME']);
    echo 'true';
} else {
    echo 'false';
}


?>
