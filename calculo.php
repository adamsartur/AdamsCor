<?php
/**
 * Página de documentos do cliente
 */

require_once '_config.php';
require_once 'inc/classes/cliente.class.php';
require_once 'inc/classes/auto.class.php';
require_once 'inc/classes/re.class.php';
require_once 'inc/classes/cia.class.php';


$acao = request('acao');
$cliente = new Cliente();
$auto = new Auto();
$re = new Re();

/**
 * Excluindo um re
 */
if( $acao == "excluirRe" ){
    $re->ID = get('id');
    $re->excluir();
}


/**
 * Excluindo um auto
 */
if( $acao == "excluirAuto" ){
    $auto->ID = get('id');
    $auto->excluir();
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
        
        <div class="erro">
            <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
        </div><!-- .erro -->
        
        <div class="linha">
            
        <?php
            /**
             * Listando os documentos auto
             */
            $autoSql = mysql_query("SELECT * FROM auto WHERE TIPO_CADASTRO = 'C'");


            if( $auto->listar && mysql_num_rows($autoSql) > 0 ) : 
                ?>
                <div class="listagem_auto">
                    <table class="tablesorter">
                        <thead>
                            <tr>
                                <th><img src="img/icons/dashboard_icon&16.png" /><!--.icone com tipo de documento inserido.--></th>
                                <th>Cliente</th>
                                <th>Veículo</th>
                                <th><!--icones--></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <!--           rotina para criar array com documentos auto                -->
                            <?php
                            while( $autoArray = mysql_fetch_array($autoSql) ) :
                                $cliente = mysql_query("SELECT NOME FROM clientes WHERE ID = ".$autoArray['CLIENTE_ID']);
                                $clientes = mysql_fetch_array($cliente);
                                ?>
                                <tr class="item autoLinha">
                                    <td><a href="documentos.php?acao=editar&tipoEditar=auto&id=<?=$autoArray['ID']?>" id="cliente-<?=$autoArray['ID']?>">
                                            <img src="img/icons/doc_lines_icon&16.png" title="Criar Proposta" />
                                    </a></td>
                                    <td><?php echo $clientes['NOME']; ?></td>
                                    <td><?php echo $autoArray['DESCRICAO']; ?></td>
                                    <td style="text-align: right; padding-right: 10px">
                                    <img alt="Editar" onclick="javascript:window.location='documentos.php?acao=editarCalculo&tipoEditar=auto&id=<?=$autoArray['ID']?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" />
                                    <a href="calculo.php?acao=excluirAuto&id=<?php echo $autoArray['ID']; ?>" id="cliente-<?php echo $autoArray['ID']; ?>" class="excluir">
                                        <img alt="Excluir" class="center-img" style="cursor: pointer;" src="img/icons/trash_icon&16.png" border="0" />
                                    </a>
                                       &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div><!-- listagem auto --> 
            <?endif;
            /**
             * Listando os documentos auto
             */
            $reSql = mysql_query("SELECT * FROM re WHERE TIPO_CADASTRO = 'C'");


            if( $re->listar && mysql_num_rows($reSql) > 0 ) : 
                ?>
                <div class="listagem_re">
                    <table class="tablesorter">
                        <thead>
                            <tr>
                                <th><img src="img/icons/dashboard_icon&16.png" /><!--.icone com tipo de documento inserido.--></th>
                                <th>Cliente</th>
                                <th>Ocupacao</th>
                                <th><!--icones--></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <!--           rotina para criar array com documentos re                -->
                            <?php
                            while( $reArray = mysql_fetch_array($reSql) ) :
                                $cliente = mysql_query("SELECT NOME FROM clientes WHERE ID = ".$reArray['CLIENTE_ID']);
                                $clientes = mysql_fetch_array($cliente);
                                ?>
                                <tr class="item reLinha">
                                    <td><a href="documentos.php?acao=editar&tipoEditar=re&id=<?=$reArray['ID']?>" id="cliente-<?=$reArray['ID']?>">
                                            <img src="img/icons/doc_lines_icon&16.png" title="Criar Proposta" />
                                    </a></td>
                                    <td><?php echo $clientes['NOME']; ?></td>
                                    <td><?php echo $reArray['OCUPACAO']; ?></td>
                                    <td style="text-align: right; padding-right: 10px">
                                    <img alt="Editar" onclick="javascript:window.location='documentos.php?acao=editarCalculo&tipoEditar=re&id=<?=$reArray['ID']?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" />
                                    <a href="calculo.php?acao=excluirRe&id=<?php echo $reArray['ID']; ?>" id="cliente-<?php echo $reArray['ID']; ?>" class="excluir">
                                        <img alt="Excluir" class="center-img" style="cursor: pointer;" src="img/icons/trash_icon&16.png" border="0" />
                                    </a>
                                       &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div><!-- listagem re --> 
            <?endif;?>
        </div><!-- .linha -->
        
    </div><!-- .principal -->
 
    <?php include('_rodape.php') ?>
    
<script type="text/javascript">
    
$(function() {
    
    /* excluindo */
    var $this, id, url;
    $('.excluir').click(function(e) {
        e.preventDefault();
        if( confirm("Deseja excluir o documento?") ) {
            $this = $(this);
            url   = $this.attr('href');
            
            window.location = url;
        }
    });
    
});


</script>
    
</body>
</html>