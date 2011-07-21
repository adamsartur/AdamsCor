<?php
require_once '_config.php';

ConectarBanco();

if (post('buscar')) {
    switch (post('filtro')) {
        case 'vigencia':
            $sql = mysql_query('SELECT * FROM AUTO WHERE VIGENCIA_FIM BETWEEN  "'.formatarDataEN(post('buscar')).'" AND "'.formatarDataEN(post('buscar_fim')).'" UNION ALL
                                SELECT * FROM RE WHERE VIGENCIA_FIM BETWEEN "'.formatarDataEN(post('buscar')).'" AND "'.formatarDataEN(post('buscar_fim')).'" ');
            break;
        case 'placa':
            $sql = mysql_query('SELECT * FROM AUTO WHERE PLACA = "'.post('buscar').'"');
            break;
        case 'descricao':
            $sql = mysql_query('SELECT * FROM AUTO WHERE DESCRICAO = "'.post('buscar').'"');
            break;
        case 'endereco':
            $sql = mysql_query('SELECT * FROM AUTO WHERE ENDERECO = "'.post('buscar').'"');
            break;        
    }
} else {
     $sql = mysql_query('SELECT * FROM AUTO WHERE VIGENCIA_FIM BETWEEN  "'.date("Y-m-1").'" AND "'.date("Y-m-t").'" UNION ALL
                         SELECT * FROM RE WHERE VIGENCIA_FIM BETWEEN "'.date("Y-m-1").'" AND "'.date("Y-m-t").'" ');
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

            <div class="erro">
                <p style="text-align: center; margin-top: 10px;"><?php
        if (isset($msgErro)) {
            echo $msgErro;
        }
        ?></p>
        </div><!-- .erro -->

        <div class="linha" style="float:none !important">
               <form action="busca.php" method="POST" name="buscar">
                    <fieldset>
                    <legend>Filtros de Pesquisa</legend>
                    <div class="pesquisa">
                        <input class="buscar" style="width:120px !important;" type="text" name="buscar" value="<?php if (post('buscar')){ echo post('buscar');} ?>" />
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
                <div class="listagem_auto">
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

                            <!--           rotina para criar array com documentos auto                -->
                        <?php
                        while ($autoArray = mysql_fetch_array($sql)) :
                        ?>
                            <tr class="item autoLinha">
                                <td><?php
                            if ($autoArray['TIPO_CADASTRO'] == 'A') {
                                echo '<img src="img/icons/case_icon&16.png" title="Apolice" />';
                            };
                            if ($autoArray['TIPO_CADASTRO'] == 'P') {
                                echo '<a href="documentos.php?acao=novaApoliceAuto&id=' . $autoArray['ID'] . '" id="cliente-' . $autoArray['ID'] . '"> <img src="img/icons/doc_lines_icon&16.png" title="Atualizar Proposta" /></a>';
                            };
                            if ($autoArray['TIPO_CADASTRO'] == 'C') {
                                echo '<img src="img/icons/calc_icon&16.png" title="->Calculo" />';
                            };
                        ?>
                            </td>
                            <td>Cliente </td>
                            <td><?php //echo formatarDataEN($autoArray['VIGENCIA_FIM']);     ?></td>
                            <td><?php echo $autoArray['DESCRICAO']; ?></td>
                            <td><?php echo $autoArray['PLACA']; ?></td>
                            <td><?php //echo Cia::nomeCia($autoArray['CIA_ID'])     ?></td>
                            <td style="text-align: right; padding-right: 10px">
                                <? if ($autoArray['TIPO_CADASTRO'] == 'A') {
                                ?>
                                <img onclick="javascript:window.location='documentos.php?acao=renovar&tipoRenovar=auto&id=<?=$autoArray['ID'] ?>'" style="cursor: pointer;" src="img/icons/doc_plus_icon&16.png" title="Renovar" />
                                <img onclick="javascript:window.location='documentos.php?acao=endossar&tipoEndossar=auto&id=<?=$autoArray['ID'] ?>'" style="cursor: pointer;" src="img/icons/doc_new_icon&16.png" title="Endosso" />
                                <? }; ?>
                                <img alt="Editar" onclick="javascript:window.location='documentos.php?acao=editar&tipoEditar=auto&id=<?=$autoArray['ID'] ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" />
                            </td>
                        </tr>
                        <?php
                                endwhile;
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
                    $('#busca_fim').show(450);
                } else {
                    $('#busca_fim').hide(450);
                }
            })
            .change();
        </script>
    </body>
</html>