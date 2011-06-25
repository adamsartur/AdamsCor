<?php
/**
 * Página de documentos do cliente
 */

require_once '_config.php';

$acao = request('acao', 'listar');
$auto = new stdClass();
$auto->valorAcao = null;
$auto->listar = true;

$auto->ID = null;
$auto->TIPO_CADASTRO = null;
$auto->CLIENTE_ID = null;
$auto->CIA_ID = null;
$auto->MARCA_ID = null;
$auto->DESCRICAO = null;
$auto->ANO = null;
$auto->KM_ANUAL = null;
$auto->ZERO = null;
$auto->PLACA = null;
$auto->CHASSI = null;
$auto->RENAVAM = null;
$auto->FILHOS = null;
$auto->COMBUSTIVEL = null;
$auto->GARAGEM_CASA = null;
$auto->GARAGEM_TRABALHO = null;
$auto->GARAGEM_FACULDADE = null;
$auto->BONUS = null;
$auto->APOLICE = null;
$auto->VIGENCIA_INICIO = null;
$auto->VIGENCIA_FINAL = null;
$auto->CI = null;
$auto->PREMIO = null;
$auto->PARCELAMENTO = null;
$auto->FORMA_PAGAMENTO = null;
$auto->DATA_VENCIMENTO = null;
$auto->DANOS_MORAIS = null;
$auto->FIPE = null;
$auto->PFRANQUIAREMIO = null;
$auto->DM = null;
$auto->DC = null;
$auto->APP = null;
$auto->VIDROS = null;
$auto->ASSISTENCIA = null;
$auto->CARRO_RESERVA = null;
$auto->OBS = null;

$re = new stdClass();
$re->valorAcao = null;
$re->listar = true;

$re->ID = null;
$re->TIPO_CADASTRO = null;
$re->CLIENTE_ID = null;
$re->CIA_ID = null;
$re->CEP = null;
$re->ENDERECO = null;
$re->NUMERO = null;
$re->COMPLEMENTO = null;
$re->CIDADE_ID = null;
$re->PLOCUPACAOACA = null;
$re->CONSTRUCAO = null;
$re->APOLICE = null;
$re->PREMIO = null;
$re->PARCELAMENTO = null;
$re->DATA_VENCIMENTO = null;
$re->DATA_CADASTRO = null;
$re->OBS = null;
$re->VIGENCIA_INICIO = null;
$re->VIGENCIA_FIM = null;
$re->FORMA_PAGAMENTO = null;
$re->FIPE = null;
$re->FORMA_PAGAMENTO = null;
$re->OBS = null;

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

        <div class="botaoadd" style="float: right; width: auto">
          <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='documentos.php?acao=inserir'" title="Adicionar"/>
        </div><!-- .botaoadd -->

        <div class="erro">
            <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
        </div><!-- .erro -->

        <div class="linha">

            <?php
            /**
             * Listando os documentos auto
             */
            $autoSql = mysql_query("SELECT * FROM auto WHERE CLIENTE_ID = '".addslashes(get('id'))."'");
                if( $auto->listar && mysql_num_rows($autoSql) > 0):

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
                                    <td><?php echo $autoArray['VIGENCIA_FIM']; ?></td>
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


                <!--listando re  -->
                <?php
                    endif;
                    $reSql = mysql_query("SELECT * FROM re WHERE CLIENTE_ID = '".addslashes(get('id'))."'");
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
                endif;?>





                <!-- form para inserir / editar clientes -->





        </div><!-- .linha -->
    </div><!-- .principal -->

    <div class="taskbar">
        <div class="taskbar-action-close">
        </div>
    </div><!-- .taskbar -->

    <div class="taskbar-action-open">
    </div><!-- .taskbar-action-open -->
    <div style="clear:both"></div>
    
    <div class="rodape">
        <?php include('_rodape.php') ?>
    </div><!-- .rodape -->
    
   
</body>
</html>