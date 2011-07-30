<?php
require_once '../../_config.php';
require_once( 'dompdf_config.inc.php' );

ConectarBanco();

$id = @$_GET['id'];
switch (@$_GET['tipo']){
    case 're':
        $apolice = mysql_fetch_array(mysql_query('SELECT * FROM RE WHERE ID = ' .$id));
        $clienteID = @$apolice['CLIENTE_ID'];
        $cia = @buscaDados('CIA', @$apolice['CIA_ID']);
        $cidade = @buscaDados('CIDADES', @$apolice['CIDADE_ID']);
        $estado = @buscaDados('ESTADOS', @$cidade['estado']);
        switch ($apolice['TIPO_CADASTRO']){
            case 'A':
                $tipo_cadastro = 'Apólice';
                break;
            case 'C':
                $tipo_cadastro = 'Cálculo';
                break;
            case 'P':
                $tipo_cadastro = 'Proposta';
                break;
        }
        switch ($apolice['FORMA_PAGAMENTO']){
            case '1':
                $pagamento = 'Débito';
                break;
            case '2':
                $pagamento = 'Cheque';
                break;
            case '3':
                $pagamento = 'Boleto';
                break;
        }
        $body = '<div style="float:left; width:50%"> Vigência: '.formatarDataEN(@$apolice['VIGENCIA_INICIO']).' - '.formatarDataEN(@$apolice['VIGENCIA_FIM']).'</div><div>Tipo de cadastro: '.$tipo_cadastro.'</div>
                 <div style="float:left; width:50%"> Apólice: '.@$apolice['APOLICE'].'</div><div>Cia: '.$cia['DESCRICAO'].'</div>
                 <div style="float:left; width:50%"> Prêmio: R$'.@$apolice['PREMIO'].'</div><div>Bônus: '.@$apolice['BONUS'].'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Endereço: '.@$apolice['ENDERECO'].'</div><div>Bairro: '.@$apolice['BAIRRO'].'</div>
                 <div style="float:left; width:50%"> CEP: '.@$apolice['CEP'].'</div><div>Numero: '.@$apolice['NUMERO'].'</div>
                 <div style="float:left; width:50%"> Cidade: '.@$cidade['nome'].'</div><div>Estado: '.@$estado['nome'].'</div>
                 <div style="float:left; width:50%"> Ocupação: '.ucfirst(@$apolice['OCUPACAO']).'</div><div>Construção: '.ucfirst(@$apolice['Construcao']).'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Parcelamento:  '.@$apolice['PARCELAMENTO'].'x </div><div>Pagamento: '.@$pagamento.'</div>
                 <div style="float:left; width:50%"> Incendio: R$ '.@$apolice['INCENDIO'].'</div><div>Vendaval: R$ '.@$apolice['VENDAVAL'].'</div>
                 <div style="float:left; width:50%"> Dano Elétrico: R$ '.@$apolice['DANO_ELETRICO'].'</div><div>Roubo: R$ '.@$apolice['ROUBO'].'</div>
                 <div style="float:left; width:50%"> Perda de Aluguel: R$ '.@$apolice['PERDA_ALUGUEL'].'</div><div>Periodo Indenitário: R$ '.@$apolice['PERIODO_INDENITARIO'].'</div>
                 <div style="float:left; width:50%"> RCF: R$ '.@$apolice['RCF'].'</div><div>Vídros: R$'.@$apolice['VIDROS'].'</div>
                 <div style="float:left; width:50%"> Equipamentos Eletrônicos: R$ '.@$apolice['EQUIPAMENTOS_ELETRONICOS'].'</div></div>';
         break;
    case 'auto':
        $apolice = mysql_fetch_array(mysql_query('SELECT * FROM AUTO WHERE ID = ' .$id));
        $clienteID = @$apolice['CLIENTE_ID'];
        $cia = buscaDados('CIA', @$apolice['CIA_ID']);
        $marca = buscaDados('MARCAS', @$apolice['MARCA_ID']);
        switch ($apolice['TIPO_CADASTRO']){
            case 'A':
                $tipo_cadastro = 'Apólice';
                break;
            case 'C':
                $tipo_cadastro = 'Cálculo';
                break;
            case 'P':
                $tipo_cadastro = 'Proposta';
                break;
        }
        switch ($apolice['FORMA_PAGAMENTO']){
            case '1':
                $pagamento = 'Débito';
                break;
            case '2':
                $pagamento = 'Cheque';
                break;
            case '3':
                $pagamento = 'Boleto';
                break;
        }
        $body = '<div style="float:left; width:50%"> Vigência: '.formatarDataEN(@$apolice['VIGENCIA_INICIO']).' - '.formatarDataEN(@$apolice['VIGENCIA_FIM']).'</div><div>Tipo de cadastro: '.$tipo_cadastro.'</div>
                 <div style="float:left; width:50%"> Apólice: '.@$apolice['APOLICE'].'</div><div>Cia: '.$cia['DESCRICAO'].'</div>
                 <div style="float:left; width:50%"> CI: '.@$apolice['CI'].'</div><div>Bônus: '.@$apolice['BONUS'].'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Descrição: '.@$apolice['DESCRICAO'].'</div><div>Ano: '.@$apolice['ANO'].'</div>
                 <div style="float:left; width:50%"> KM Anual: '.@$apolice['KM_ANUAL'].'</div><div>Carro Zero: '.testaValor(@$apolice['ZERO']).'</div>
                 <div style="float:left; width:50%"> Placa: '.@$apolice['PLACA'].'</div><div>Chassi: '.@$apolice['CHASSI'].'</div>
                 <div style="float:left; width:50%"> Renavam: '.@$apolice['RENAVAM'].'</div><div>Combustível: '.@$apolice['COMBUSTIVEL'].'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Filhos: '.testaValor(@$apolice['FILHOS']).'</div><div>Garagem em casa: '.testaValor(@$apolice['GARAGEM_CASA']).'</div>
                 <div style="float:left; width:50%"> Garagem no trabalho: '.testaValor(@$apolice['GARAGEM_TRABALHO']).'</div><div>Garagem na faculdade: '.testaValor(@$apolice['GARAGEM_FACULDADE']).'</div>
                 <div style="float:left; width:50%"> Prêmio: R$'.@$apolice['PREMIO'].'</div><div>Pagamento: '.@$pagamento.'</div>
                 <div style="float:left; width:50%"> Parcelamento:  '.@$apolice['PARCELAMENTO'].'x </div><div>Dados morais: R$'.@$apolice['DANOS_MORAIS'].'</div>
                 <div style="float:left; width:50%"> DM: R$ '.@$apolice['DM'].'</div></div><div>DC: R$ '.@$apolice['DC'].'</div>
                 <div style="float:left; width:50%"> Vidros: R$ '.testaValor(@$apolice['VIDRO']).'</div></div><div>Carro Reserva: '.testaValor(@$apolice['CARRO_RESERVA']).'</div>
                 <div style="float:left; width:50%"> Assistência: '.testaValor(@$apolice['ASSISTENCIA']).'</div></div><div>APP: R$ '.@$apolice['CARRO_RESERVA'].'</div>
                 <div style="float:left; width:50%"> FIPE: '.@$apolice['FIPE'].' %</div></div><div>Franquia: R$ '.@$apolice['FRANQUIA'].'</div>
                 <div> Obs: '.@$apolice['OBS'].'</div>';
        break;
    case 'cliente':
        $apolice = mysql_fetch_array(mysql_query('SELECT * FROM CLIENTES WHERE ID = ' .$id));
        $clienteID = @$apolice['ID'];
        $cidade = buscaDados('CIDADES', @$apolice['CIDADE_ID']);
        $estado = buscaDados('ESTADOS', @$cidade['estado']);
        switch ($apolice['TIPO_CLIENTE']){
            case 'F':
                $tipo_cadastro = 'Física';
                break;
            case 'J':
                $tipo_cadastro = 'Jurídica';
                break;
        }
        switch ($apolice['SEXO']){
            case 'M':
                $sexo = 'Masculino';
                break;
            case 'F':
                $sexo = 'Feminino';
        }
        switch ($apolice['ESTADO_CIVIL']){
            case 'S':
                $civil = 'Solteiro';
                break;
            case 'C':
                $civil = 'Casado';
                break;
            case 'D':
                $civil = 'Divorciado';
                break;
            case 'V':
                $civil = 'Viúvo';
                break;
        }
        $body = '<div style="float:left; width:50%"> Tipo de cliente: '.$tipo_cadastro.'</div><div>Data de nascimento: '.formatarDataEN(@$apolice['DATA_NASC']).'</div>
                 <div style="float:left; width:50%"> RG: '.@$apolice['RG'].'</div><div>Orgão Expedidor: '.@$apolice['ORG_EXPEDIDOR'].'</div>
                 <div style="float:left; width:50%"> Data de expedição: '.formatarDataEN(@$apolice['ORG_DATA_EXPEDICAO']).'</div><div>Sexo: '.@$sexo.'</div>
                 <div style="float:left; width:50%"> Estado Civil: '.@$civil.'</div></div>CNH: '.@$apolice['CNH'].'</div>
                 <div style="float:left; width:50%"> CNH Data expedição: '.formatarDataEN(@$apolice['CNH_DATA_EXPEDICAO']).'</div>
                 <hr/>
                 <div style="float:left; width:50%"> Endereço: '.@$apolice['ENDERECO'].'</div><div>Bairro: '.@$apolice['BAIRRO'].'</div>
                 <div style="float:left; width:50%"> Numero: '.@$apolice['NUMERO'].'</div><div>CEP: '.@$apolice['CEP'].'</div>
                 <div style="float:left; width:50%"> Complemento: '.@$apolice['COMPLEMENTO'].'</div><div>Estado: '.@$estado['nome'].'</div>
                 <div style="float:left; width:50%"> Cidade: '.@$cidade['nome'].'</div>
                 <div> Obs: '.@$apolice['OBS'].'</div>';

        break;

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
        <body>
        <img style="margin-left:60px" src="header.png" />'.
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
