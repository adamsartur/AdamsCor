<?php
/**
 * Página de documentos do cliente
 */

require_once '_config.php';
require_once 'inc/classes/cliente.class.php';
require_once 'inc/classes/auto.class.php';
require_once 'inc/classes/re.class.php';


$acao = request('acao', 'listar');


/**
 * Configurando o cliente
 */
$cliente = new Cliente();
if( isset($_GET['idCliente']) )
    $_SESSION['idCliente'] = $_GET['idCliente'];
$cliente->ID = isset($_SESSION['idCliente']) ? $_SESSION['idCliente'] : 0;
if( !$cliente->informacoes() )
     header('Location: clientes.php');


$auto = new Auto();
$re = new Re();


/**
 * Inserindo um auto
 */
if( $acao == 'inserirAuto' ) {
    $auto->ID = post('ID');
    $auto->TIPO_CADASTRO = post('TIPO_CADASTRO');
    $auto->CLIENTE_ID = $cliente->ID;
    $auto->CIA_ID = post('CIA_ID');
    $auto->MARCA_ID = post('MARCA_ID');
    $auto->DESCRICAO = post('DESCRICAO');
    $auto->ANO = post('ANO');
    $auto->KM_ANUAL = post('KM_ANUAL');
    $auto->ZERO = post('ZERO');
    $auto->PLACA = post('PLACA');
    $auto->CHASSI = post('CHASSI');
    $auto->RENAVAM = post('RENAVAM');
    $auto->CEP = post('CEP');
    $auto->FILHOS = post('FILHOS');
    $auto->COMBUSTIVEL = post('COMBUSTIVEL');
    $auto->GARAGEM_CASA = post('GARAGEM_CASA');
    $auto->GARAGEM_TRABALHO = post('GARAGEM_TRABALHO');
    $auto->GARAGEM_FACULDADE = post('GARAGEM_FACULDADE');
    $auto->BONUS = post('BONUS');
    $auto->APOLICE = post('APOLICE');
    $auto->VIGENCIA_INICIO = post('VIGENCIA_INICIO');
    $auto->VIGENCIA_FIM = post('VIGENCIA_FIM');
    $auto->CI = post('CI');
    $auto->PREMIO = post('PREMIO');
    $auto->PARCELAMENTO = post('PARCELAMENTO');
    $auto->FORMA_PAGAMENTO = post('FORMA_PAGAMENTO');
    $auto->DATA_VENCIMENTO = post('DATA_VENCIMENTO');
    $auto->DANOS_MORAIS = post('DANOS_MORAIS');
    $auto->FIPE = post('FIPE');
    $auto->FRANQUIA = post('FRANQUIA');
    $auto->DM = post('DM');
    $auto->DC = post('DC');
    $auto->APP = post('APP');
    $auto->VIDROS = post('VIDROS');
    $auto->ASSISTENCIA = post('ASSISTENCIA');
    $auto->CARRO_RESERVA = post('CARRO_RESERVA');
    $auto->OBS = post('OBS');
    
    $auto->inserir();
}


/**
 * Inserindo um re
 */
if( $acao == 'inserirRe' ) {
    $re->ID = post('ID');
    $re->CLIENTE_ID = $cliente->ID;
    $re->TIPO_CADASTRO = post('TIPO_CADASTRO');
    $re->CIA_ID = post('CIA_ID');
    $re->CEP = post('CEP');
    $re->ENDERECO = post('ENDERECO');
    $re->NUMERO = post('NUMERO');
    $re->COMPLEMENTO = post('COMPLEMENTO');
    $re->CIDADE_ID = post('CIDADE_ID');
    $re->OCUPACAO = post('OCUPACAO');
    $re->CONSTRUCAO = post('CONSTRUCAO');
    $re->APOLICE = post('APOLICE');
    $re->PREMIO = post('PREMIO');
    $re->PARCELAMENTO = post('PARCELAMENTO');
    $re->DATA_VENCIMENTO = post('DATA_VENCIMENTO');
    $re->DATA_CADASTRO = post('DATA_CADASTRO');
    $re->VIGENCIA_INICIO = post('VIGENCIA_INICIO');
    $re->VIGENCIA_FIM = post('VIGENCIA_FIM');
    $re->FORMA_PAGAMENTO = post('FORMA_PAGAMENTO');
    $re->FIPE = post('FIPE');
    $re->OBS = post('OBS');
    $re->INCENDIO = post('INCENDIO');
    $re->VENDAVAL = post('VENDAVAL');
    $re->DANO_ELETRICO = post('DANO_ELETRICO');
    $re->ROUBO = post('ROUBO');
    $re->RCF = post('RCF');
    $re->VIDROS = post('VIDROS');
    $re->PERDA_ALUGUEL = post('PERDA_ALUGUEL');
    $re->PERIODO_INDENITARIO = post('PERIODO_INDENITARIO');
    $re->EQUIPAMENTOS_ELETRONICOS = post('EQUIPAMENTOS_ELETRONICOS');
    
    $re->inserir();
}


/**
 * Form pra inserir
 */
if( $acao == 'inserir' ) {
    $auto->form = true;
    $auto->listar = false;
    $re->listar = false;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <?php include('_head.php') ?>
    <title><?php echo $tittle; ?></title>
</head>
<body class="body">
    <!--topo-->
    <?php include('_topo.php') ?>

    <!-- menu -->
    <?php include('_menu.php') ?>

    <div class="principal">
        <h1><!-- dar um echo do cliente que esta sendo visualizado --></h1>
        
        <?php
        if( !$auto->form ) : 
            ?>
            <div class="botaoadd" style="float: right; width: auto">
              <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='documentos.php?acao=inserir'" title="Adicionar"/>
            </div><!-- .botaoadd -->
            <?php
        endif;
        ?>

        <div class="erro">
            <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
        </div><!-- .erro -->

        <div class="linha">
            <?php
            /**
             * Listando os documentos auto
             */
            $autoSql = mysql_query("SELECT * FROM auto WHERE CLIENTE_ID = '".addslashes( $cliente->ID )."'");
            if( $auto->listar && mysql_num_rows($autoSql) > 0 ) : 
                ?>
                <div class="listagem_auto">
                    <table class="tablesorter">
                        <thead>
                            <tr>
                                <th>Vigencia</th>
                                <th>Veículo</th>
                                <th>Placa</th>
                                <th>CIA</th>
                                <th><!--.icone com tipo de documento inserido.--></th>
<!--                            <th>ver</th>
                                <th>editar</th>
                                <th>excluir</th>       -->
                            </tr>
                        </thead>
                        <tbody>
                            
                        <!--           rotina para criar array com documentos auto                -->
                            <?php
                            while( $autoArray = mysql_fetch_array($autoSql) ) :
                                ?>
                                <tr class="autoLinha">
                                    <td><?php echo formatarDataEN($autoArray['VIGENCIA_FIM']); ?></td>
                                    <td><?php echo $autoArray['DESCRICAO']; ?></td>
                                    <td><?php echo $autoArray['PLACA']; ?></td>
                                    <td><?php echo $autoArray['CIA_ID']; ?></td>
                                    <td><?php if ($autoArray['TIPO_CADASTRO'] == 'C'){echo '<img src="img/icons/case_icon&16.png" title="Calculo" />';};
                                              if ($autoArray['TIPO_CADASTRO'] == 'P'){echo '<img src="img/icons/doc_lines_icon&16.png" title="Proposta" />';};
                                              if ($autoArray['TIPO_CADASTRO'] == 'A'){echo '<img src="img/icons/calc_icon&16.png" title="Apolice" />';}; ?>
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div><!-- listagem auto -->


                <!--listando re -->
                <?php
                endif;
                
                $reSql = mysql_query("SELECT * FROM re WHERE CLIENTE_ID = '".addslashes( $cliente->ID )."'");
                if( $re->listar && mysql_num_rows($reSql) > 0 ) :
                    ?>
                    <div class="listagem_interno">
                        <table class="tablesorter">
                            <thead>
                                <tr>
                                    <th>Vigencia</th>
                                    <th>Endereço</th>
                                    <th>Ocupacao</th>
                                    <th>CIA</th>
                                    <th><!-- .tipo do documento. --></th>
    <!--                            <th>ver</th>
                                    <th>editar</th>
                                    <th>excluir</th>       -->
                                </tr>
                            </thead>
                            <tbody>

                            <!--           rotina para criar array com documentos re                -->
                                <?php
                                while( $reArray = mysql_fetch_array($reSql) ) :
                                    ?>
                                    <tr class="reLinha">
                                        <td><?php echo $reArray['VIGENCIA_FIM']; ?></td>
                                        <td><?php echo $reArray['ENDERECO']; echo ", ".$reArray['NUMERO']; echo " ".$reArray['COMPLEMENTO']; ?></td>
                                        <td><?php echo $reArray['OCUPACAO']; ?></td>
                                        <td><?php echo $reArray['CIA_ID']; ?></td>
                                        <td><?php if ($reArray['TIPO_CADASTRO'] == 'C'){echo '<img src="img/icons/case_icon&16.png" title="Calculo" />';};
                                                  if ($reArray['TIPO_CADASTRO'] == 'P'){echo '<img src="img/icons/doc_lines_icon&16.png" title="Proposta" />';};
                                                  if ($reArray['TIPO_CADASTRO'] == 'A'){echo '<img src="img/icons/calc_icon&16.png" title="Apolice" />';}; ?>
                                        </td>
                                    </tr>
                                    <?
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div><!-- .listagem re-->
                    <?php
                endif;
                ?>


            <?php
            /**
             * Formularios
             */
            if( $auto->form ) : 
                ?>
                <div>
                    <label class="label">Ramo </label>
                    <input type="radio" value="auto" id="tipo-documento-auto" name="tipoDocumento" checked="checked" class="bt-tipo-documento" />
                    <label for="tipo-documento-auto">Auto</label>
                    <input type="radio" value="re" id="tipo-documento-re" name="tipoDocumento" class="bt-tipo-documento" />
                    <label for="tipo-cliente-re">RE</label>
                </div>

                <div class="form-auto">
                    <?include_once('form_auto.php'); ?>
                </div><!-- .form-auto -->

                <div class="form-re">
                    <?include_once('form_re.php'); ?>
                </div><!-- .form-re -->
                <?php
            endif;
            ?>
                    
        </div><!-- .linha -->
    </div><!-- .principal -->
 
    <?php include('_rodape.php') ?>
    
    
<script type="text/javascript">
$(function() {
    var
        tipo,
        $re   = $('.form-re'),
        $auto = $('.form-auto');

    $re.hide();

    $('.bt-tipo-documento').click(function(e) {
        $this = $(this);

        tipo = $this.attr('id').split('-');

        if( tipo[2] == 'auto' ) {
            $re.hide();
            $auto.fadeIn(250);
        } else {
            $re.fadeIn(250);
            $auto.hide();
        }
    });
});
</script>
</body>
</html>