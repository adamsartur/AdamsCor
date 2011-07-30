<?php
require_once '_config.php';

ConectarBanco();

$id = @$_POST['id'];
switch (@$_POST['tipo']){
    case 're':
        $apolice = mysql_fetch_array(mysql_query('SELECT * FROM RE WHERE ID = ' .$id));
        $clienteID = @$apolice['CLIENTE_ID'];
        $cia = buscaDados('CIA', @$apolice['CIA_ID']);
        $cidade = buscaDados('CIDADES', @$apolice['CIDADE_ID']);
        $estado = buscaDados('ESTADOS', @$cidade['estado']);
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
        $body = '<div class="modal_left"> Vigência: '.formatarDataEN(@$apolice['VIGENCIA_INICIO']).' - '.formatarDataEN(@$apolice['VIGENCIA_FIM']).'</div><div>Tipo de cadastro: '.$tipo_cadastro.'</div>
                 <div class="modal_left"> Apólice: '.@$apolice['APOLICE'].'</div><div>Cia: '.$cia['DESCRICAO'].'</div>
                 <div class="modal_left"> Prêmio: R$'.@$apolice['PREMIO'].'</div><div>Bônus: '.@$apolice['BONUS'].'</div>
                 <hr/>
                 <div class="modal_left"> Endereço: '.@$apolice['ENDERECO'].'</div><div>Bairro: '.@$apolice['BAIRRO'].'</div>
                 <div class="modal_left"> CEP: '.@$apolice['CEP'].'</div><div>Numero: '.@$apolice['NUMERO'].'</div>
                 <div class="modal_left"> Cidade: '.@$cidade['nome'].'</div><div>Estado: '.@$estado['nome'].'</div>
                 <div class="modal_left"> Ocupação: '.ucfirst(@$apolice['OCUPACAO']).'</div><div>Construção: '.ucfirst(@$apolice['Construcao']).'</div>
                 <hr/>
                 <div class="modal_left"> Parcelamento:  '.@$apolice['PARCELAMENTO'].'x </div><div>Pagamento: '.@$pagamento.'</div>
                 <div class="modal_left"> Incendio: R$ '.@$apolice['INCENDIO'].'</div><div>Vendaval: R$ '.@$apolice['VENDAVAL'].'</div>
                 <div class="modal_left"> Dano Elétrico: R$ '.@$apolice['DANO_ELETRICO'].'</div><div>Roubo: R$ '.@$apolice['ROUBO'].'</div>
                 <div class="modal_left"> Perda de Aluguel: R$ '.@$apolice['PERDA_ALUGUEL'].'</div><div>Periodo Indenitário: R$ '.@$apolice['PERIODO_INDENITARIO'].'</div>
                 <div class="modal_left"> RCF: R$ '.@$apolice['RCF'].'</div><div>Vídros: R$'.@$apolice['VIDROS'].'</div>
                 <div class="modal_left"> Equipamentos Eletrônicos: R$ '.@$apolice['EQUIPAMENTOS_ELETRONICOS'].'</div></div><div>&nbsp</div>';
        break;
        //todos        
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
        $body = '<div class="modal_left"> Vigência: '.formatarDataEN(@$apolice['VIGENCIA_INICIO']).' - '.formatarDataEN(@$apolice['VIGENCIA_FIM']).'</div><div>Tipo de cadastro: '.$tipo_cadastro.'</div>
                 <div class="modal_left"> Apólice: '.@$apolice['APOLICE'].'</div><div>Cia: '.$cia['DESCRICAO'].'</div>
                 <div class="modal_left"> CI: '.@$apolice['CI'].'</div><div>Bônus: '.@$apolice['BONUS'].'</div>
                 <hr/>
                 <div class="modal_left"> Descrição: '.@$apolice['DESCRICAO'].'</div><div>Ano: '.@$apolice['ANO'].'</div>
                 <div class="modal_left"> KM Anual: '.@$apolice['KM_ANUAL'].'</div><div>Carro Zero: '.testaValor(@$apolice['ZERO']).'</div>
                 <div class="modal_left"> Placa: '.@$apolice['PLACA'].'</div><div>Chassi: '.@$apolice['CHASSI'].'</div>
                 <div class="modal_left"> Renavam: '.@$apolice['RENAVAM'].'</div><div>Combustível: '.@$apolice['COMBUSTIVEL'].'</div>
                 <hr/>
                 <div class="modal_left"> Filhos: '.testaValor(@$apolice['FILHOS']).'</div><div>Garagem em casa: '.testaValor(@$apolice['GARAGEM_CASA']).'</div>
                 <div class="modal_left"> Garagem no trabalho: '.testaValor(@$apolice['GARAGEM_TRABALHO']).'</div><div>Garagem na faculdade: '.testaValor(@$apolice['GARAGEM_FACULDADE']).'</div>
                 <div class="modal_left"> Prêmio: R$'.@$apolice['PREMIO'].'</div><div>Pagamento: '.@$pagamento.'</div>
                 <div class="modal_left"> Parcelamento:  '.@$apolice['PARCELAMENTO'].'x </div><div>Dados morais: R$'.@$apolice['DANOS_MORAIS'].'</div>
                 <div class="modal_left"> DM: R$ '.@$apolice['DM'].'</div></div><div>DC: R$ '.@$apolice['DC'].'</div>
                 <div class="modal_left"> Vidros: R$ '.testaValor(@$apolice['VIDRO']).'</div></div><div>Carro Reserva: '.testaValor(@$apolice['CARRO_RESERVA']).'</div>
                 <div class="modal_left"> Assistência: '.testaValor(@$apolice['ASSISTENCIA']).'</div></div><div>APP: R$ '.@$apolice['CARRO_RESERVA'].'</div>
                 <div class="modal_left"> FIPE: '.@$apolice['FIPE'].' %</div></div><div>Franquia: R$ '.@$apolice['FRANQUIA'].'</div>
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
        $body = '<div class="modal_left"> Tipo de cliente: '.$tipo_cadastro.'</div><div>Data de nascimento: '.formatarDataEN(@$apolice['DATA_NASC']).'</div>
                 <div class="modal_left"> RG: '.@$apolice['RG'].'</div><div>Orgão Expeditor: '.@$apolice['ORG_EXPEDIDOR'].'</div>
                 <div class="modal_left"> Data de expedição: '.formatarDataEN(@$apolice['ORG_DATA_EXPEDICAO']).'</div><div>Sexo: '.@$sexo.'</div>
                 <div class="modal_left"> Estado Civil: '.@$civil.'</div></div>CNH: '.@$apolice['CNH'].'</div>
                 <div class="modal_left"> CNH Data expedição: '.formatarDataEN(@$apolice['CNH_DATA_EXPEDICAO']).'</div><div>&nbsp</div>
                 <hr/>
                 <div class="modal_left"> Endereço: '.@$apolice['ENDERECO'].'</div><div>Bairro: '.@$apolice['BAIRRO'].'</div>
                 <div class="modal_left"> Número: '.@$apolice['NUMERO'].'</div><div>CEP: '.@$apolice['CEP'].'</div>
                 <div class="modal_left"> Complemento: '.@$apolice['COMPLEMENTO'].'</div><div>Estado: '.@$estado['nome'].'</div>
                 <div class="modal_left"> Cidade: '.@$cidade['nome'].'</div><div>&nbsp</div>
                 <div> Observação: '.@$apolice['OBS'].'</div>';
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
    echo $header.$body.$footer;
?>
