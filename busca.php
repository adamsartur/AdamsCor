<?php
require_once '_config.php';

ConectarBanco();

$sql = '';

if (post('buscar')) {
    switch (post('filtro')) {
        case 'vigencia':
            $sqlAuto = mysql_query('SELECT * FROM AUTO WHERE VIGENCIA_FIM BETWEEN  "'.formatarDataBR(post('buscar')).'" AND "'.formatarDataBR(post('buscar_fim')).'"');
            $sqlRe   = mysql_query('SELECT * FROM RE WHERE VIGENCIA_FIM BETWEEN "'.formatarDataBR(post('buscar')).'" AND "'.formatarDataBR(post('buscar_fim')).'"');
            break;
        case 'placa':
            $sql = mysql_query('SELECT * FROM AUTO WHERE PLACA LIKE "%'.post('buscar').'%"');
            break;
        case 'descricao':
            $sql = mysql_query('SELECT * FROM AUTO WHERE DESCRICAO LIKE "%'.post('buscar').'%"');
            break;
        case 'endereco':
            $sqlRe = mysql_query('SELECT * FROM RE WHERE ENDERECO LIKE "%'.post('buscar').'%"');
            break;        
    }
} else {
    $sqlAuto = mysql_query('SELECT * FROM AUTO WHERE VIGENCIA_FIM BETWEEN  "'.date("Y-m-1").'" AND "'.date("Y-m-t").'"');
    $sqlRe   = mysql_query('SELECT * FROM RE WHERE VIGENCIA_FIM BETWEEN "'.date("Y-m-1").'" AND "'.date("Y-m-t").'"');
}
$dadosLista = array();
if ($sql) {
    while ($linha = mysql_fetch_array($sql)):
        array_push($dadosLista, array("0" => @$linha['ID'],
                                      "1" => @$linha['TIPO_CADASTRO'],
                                      "2" => @$linha['CLIENTE_ID'],
                                      "3" => formatarDataEN(@$linha['VIGENCIA_FIM']),
                                      "4" => @$linha['DESCRICAO'],
                                      "5" => @$linha['PLACA'],
                                      "6" => @$linha['CIA_ID'],
                                      "7" => 'auto'));
    endwhile;
} else {
    //echo 'SELECT ID FROM AUTO WHERE VIGENCIA_FIM BETWEEN  "'.date("Y-m-1").'" AND "'.date("Y-m-t").'"'.'SELECT ID FROM RE WHERE VIGENCIA_FIM BETWEEN "'.date("Y-m-1").'" AND "'.date("Y-m-t").'"';
    $dadosAuto = array();
    $dadosRE = array();
    while ($linhaAuto = @mysql_fetch_array($sqlAuto)):
        array_push($dadosAuto, array("0" => @$linhaAuto['ID'],
                                     "1" => @$linhaAuto['TIPO_CADASTRO'],
                                     "2" => @$linhaAuto['CLIENTE_ID'],
                                     "3" => formatarDataEN(@$linhaAuto['VIGENCIA_FIM']),
                                     "4" => @$linhaAuto['DESCRICAO'],
                                     "5" => @$linhaAuto['PLACA'],
                                     "6" => @$linhaAuto['CIA_ID'],
                                     "7" => 'auto'));
    endwhile;
    while ($linhaRE = mysql_fetch_array($sqlRe)):
        array_push($dadosRE, array("0" => @$linhaRE['ID'],
                                   "1" => @$linhaRE['TIPO_CADASTRO'],
                                   "2" => @$linhaRE['CLIENTE_ID'],
                                   "3" => formatarDataEN(@$linhaRE['VIGENCIA_FIM']),
                                   "4" => @$linhaRE['ENDERECO'],
                                   "5" => @$linhaRE['OCUPACAO'],
                                   "6" => @$linhaRE['CIA_ID'],
                                   "7" => 're'));
    endwhile;
    $dadosLista = array_merge($dadosAuto, $dadosRE);
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
                <h1>Busca</h1>

            <div class="erro">
                <p style="text-align: center; margin-top: 10px;"><?php
        if (isset($msgErro)) {
            echo $msgErro;
        }
        ?></p>
        </div><!-- .erro -->

        <div class="linha" style="float:none !important">
            <div class="pesquisa" style="width: 100%">
               <form action="busca.php" method="POST" name="buscar">
                    <fieldset>
                    <legend>Filtros de Pesquisa</legend>
                    <div class="pesquisa">
                        <input class="buscar" style="width:120px !important;" type="text" name="buscar" id="busca" value="<?php if (post('buscar')){ echo post('buscar');} ?>" />
                        <input class="buscar" style="width:120px !important;" type="text" name="buscar_fim" id="busca_fim" value="<?php if (post('buscar_fim')){ echo post('buscar_fim');} ?>" />
                        <select id="filtro" style="width:120px !important;" name="filtro" class="buscar">
                          <option value="vigencia"  <?php echo selected(post('filtro'), 'vigencia'); ?> >Vigência</option>
                          <option value="placa"     <?php echo selected(post('filtro'), 'placa'); ?> >Placa</option>
                          <option value="descricao" <?php echo selected(post('filtro'), 'descricao'); ?> >Descrição</option>
                          <option value="endereco"  <?php echo selected(post('filtro'), 'endereco'); ?>>Endereço</option>
                        </select>
                        <input class="bt_buscar" type="submit" value="Buscar" title="Buscar"/>
                    </div>
                    </fieldset>
                </form>
            </div>
                <div class="listagem_interno">
                    <table class="tablesorter">
                        <thead>
                            <tr>
                                <th><!--.icone com tipo de documento inserido.--></th>
                                <th>Cliente</th>
                                <th>Vigencia</th>
                                <th>Veículo/Endereço</th>
                                <th>Placa/Ocupação</th>
                                <th>CIA</th>
                                <th><!--icones--></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($dadosLista as $listagem) :
                        ?>
                            <tr class="item">
                                <td><?php
                                switch ($listagem[1]) {
                                    case 'A':
                                        echo '<img id="'.$listagem[7].'-'.$listagem[0].'" class="lista" src="img/icons/zoom_icon&16.png" title="Visualizar" />';
                                        echo '<img src="img/icons/case_icon&16.png" title="Apolice" />';
                                        break;
                                    case 'P':
                                        echo '<img id="'.$listagem[7].'-'.$listagem[0].'" class="lista" src="img/icons/zoom_icon&16.png" title="Visualizar" />';
                                        echo '<img src="img/icons/doc_lines_icon&16.png" title="Proposta" /></a>';
                                        break;
                                    case 'C':
                                        echo '<img id="'.$listagem[7].'-'.$listagem[0].'" class="lista" src="img/icons/zoom_icon&16.png" title="Visualizar" />';
                                        echo '<img src="img/icons/calc_icon&16.png" title="->Calculo" />';
                                        break;
                                }
                                $cliente = mysql_fetch_array(mysql_query('SELECT NOME FROM CLIENTES WHERE ID = ' .$listagem[2] ));
                                $cia = mysql_fetch_array(mysql_query('SELECT DESCRICAO FROM CIA WHERE ID = ' .$listagem[6] ));
                        ?>
                            </td>
                            <td><?php echo $cliente['NOME']; ?> </td>
                            <td><?php echo $listagem[3]; ?></td>
                            <td><?php echo $listagem[4]; ?></td>
                            <td><?php echo $listagem[5]; ?></td>
                            <td><?php echo $cia['DESCRICAO']; ?></td>
                            <td style="text-align: right; padding-right: 10px">
                                <? if ($listagem[1] == 'A') {
                                ?>
                                <img onclick="javascript:window.location='documentos.php?acao=renovar&tipoRenovar=auto&id=<?php echo$listagem[0]; ?>'" style="cursor: pointer;" src="img/icons/doc_plus_icon&16.png" title="Renovar" />
                                <img onclick="javascript:window.location='documentos.php?acao=endossar&tipoEndossar=auto&id=<?php echo $listagem[0]; ?>'" style="cursor: pointer;" src="img/icons/doc_new_icon&16.png" title="Endosso" />
                                <? }; ?>
                                <img alt="Editar" onclick="javascript:window.location='documentos.php?acao=editar&tipoEditar=auto&id=<?php echo $listagem[0]; ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" />
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                            </tbody>
                        </table>
                    </div><!-- listagem auto -->
                </div><!-- .linha -->
            </div><!-- .principal -->
            
        <?php include('_rodape.php') ?>
        <script type="text/javascript">
            $("#filtro").change(function () {
                if($(this).val() == 'vigencia'){
                    $('#busca_fim').val("");
                    $('#busca').val("");
                    $('#busca_fim').show();
                } else {
                    $('#busca_fim').val("");
                    $('#busca').val("");
                    $('#busca_fim').hide();
                }
            })
            .change();
        </script>
    </body>
</html>