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
        $body = '<div class="modal_left"> Vigência: '.formatarDataEN(@$apolice['VIGENCIA_INICIO']).' - '.formatarDataEN(@$apolice['VIGENCIA_FIM']).'</div><div>Tipo de cadastro: '.$tipo_cadastro.'</div>
                 <div class="modal_left"> Apólice: '.@$apolice['APOLICE'].'</div><div>Cia: '.$cia['DESCRICAO'].'</div>
                 <div class="modal_left"> Bônus: '.@$apolice['BONUS'].'</div><div>Prêmio: R$'.@$apolice['PREMIO'].'</div>
                 <hr/>
                 <div class="modal_left"> Endereço: '.@$apolice['ENDERECO'].'</div><div>Bairro: '.@$apolice['BAIRRO'].'</div>
                 <div class="modal_left"> CEP: '.@$apolice['CEP'].'</div><div>Numero: '.@$apolice['NUMERO'].'</div>
                 <div class="modal_left"> Cidade: '.@$cidade['nome'].'</div><div>Estado: '.@$estado['nome'].'</div>
                 <div class="modal_left"> Ocupação: '.ucfirst(@$apolice['OCUPACAO']).'</div><div>Construção: '.ucfirst(@$apolice['Construcao']).'</div>
                 <hr/>
                 <div class="modal_left"> Incendio: R$ '.@$apolice['INCENDIO'].'</div><div>Vendaval: R$ '.@$apolice['VENDAVAL'].'</div>
                 <div class="modal_left"> Dano Elétrico: R$ '.@$apolice['DANO_ELETRICO'].'</div><div>Roubo: R$ '.@$apolice['ROUBO'].'</div>
                 <div class="modal_left"> Perda de Aluguel: R$ '.@$apolice['PERDA_ALUGUEL'].'</div><div>Periodo Indenitário: R$ '.@$apolice['PERIODO_INDENITARIO'].'</div>
                 <div class="modal_left"> RCF: R$ '.@$apolice['RCF'].'</div><div>Vídros: R$'.@$apolice['VIDROS'].'</div>
                 <div class="modal_left"> Equipamentos Eletrônicos: R$ '.@$apolice['EQUIPAMENTOS_ELETRONICOS'].'</div></div><div>&nbsp</div>';
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
    echo $header.$body.$footer;
?>
