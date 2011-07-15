<?php
/**
 * Página de documentos do cliente
 */

require_once '_config.php';
require_once 'inc/classes/cliente.class.php';
require_once 'inc/classes/auto.class.php';
require_once 'inc/classes/re.class.php';
require_once 'inc/classes/cia.class.php';


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
 * Update para Auto
 */
if( $acao == 'editarAuto' ) {
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
    
    $auto->editar();
}


/**
 * Update para RE
 */
if( $acao == 'editarRe' ) {
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
    
    $re->editar();
}

/**
 * Form pra inserir
 */
if( $acao == 'inserir' ) {
    $auto->form   = true;
    $auto->listar = false;
    $re->listar   = false;
    $auto->acao   = 'inserirAuto';
    $re->acao     = 'inserirRe';
}


/**
 * Editando um item
 */
if( $acao == 'editar' ) {
    $tipoEditar = get('tipoEditar');
    
    if( $tipoEditar == 'auto' ) {
        $auto->ID = get('id');
        if( !$auto->informacoes() )
            header('Location: documentos.php');
        
        $auto->form   = true;
        $auto->listar = false;
        $re->listar   = false;
        $auto->acao   = 'editarAuto';
    } else {
        $re->ID = get('id');
        if( !$re->informacoes() )
            header('Location: documentos.php');
        
        $auto->form   = true;
        $auto->listar = false;
        $re->listar   = false;
        $re->acao   = 'editarRe';
    }
}

/**
 * Endossando um item
 */
if( $acao == 'endossar' ) {
    $tipoEndossar = get('tipoEndossar');
    
    if( $tipoEndossar == 'auto' ) {
        $auto->ID = get('id');
        if( !$auto->informacoes() )
            header('Location: documentos.php');
        
        $auto->form   = true;
        $auto->listar = false;
        $re->listar   = false;
        $auto->acao   = 'inserirAuto';
    } else {
        $re->ID = get('id');
        if( !$re->informacoes() )
            header('Location: documentos.php');
        
        $re->form   = true;
        $auto->listar = false;
        $re->listar   = false;
        $re->acao   = 'inserirRe';
        $re->endossar = true;
    }
}


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


/**
 * Form pra apolcie auto
 */
if( $acao == 'novaApoliceAuto' ) {
    $auto->ID = get('id');
    $auto->informacoes();
    $auto->form   = false;
    $auto->listar = false;
    $re->listar   = false;
    $re->form     = false;
    $auto->acao   = 'apoliceAuto';
}


/**
 * Form pra apolcie re
 */
if( $acao == 'novaApoliceRe' ) {
    $re->ID = get('id');
    $re->informacoes();
    $auto->form   = false;
    $auto->listar = false;
    $re->listar   = false;
    $re->form     = false;
    $re->acao     = 'apoliceRe';
}

/**
 * Inserindo apolice re
 */
if( $acao == 'insereApoliceRe' ) {
    $re->ID = post('ID');
    $re->APOLICE = post('APOLICE');
    $re->apolice();
}

/**
 * Inserindo apolice auto
 */
if( $acao == 'insereApoliceAuto' ) {
    $auto->ID = post('ID');
    $auto->APOLICE = post('APOLICE');
    $auto->CI = post('CI');
    $auto->apolice();
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
                                <th><!--.icone com tipo de documento inserido.--></th>
                                <th>Vigencia</th>
                                <th>Veículo</th>
                                <th>Placa</th>
                                <th>CIA</th>
                                <th><!--icones--></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <!--           rotina para criar array com documentos auto                -->
                            <?php
                            while( $autoArray = mysql_fetch_array($autoSql) ) :
                                ?>
                                <tr class="item autoLinha">
                                    <td><?php if ($autoArray['TIPO_CADASTRO'] == 'A'){echo '<img src="img/icons/case_icon&16.png" title="Apolice" />';};
                                              if ($autoArray['TIPO_CADASTRO'] == 'P'){echo '<a href="documentos.php?acao=novaApoliceAuto&id='.$autoArray['ID'].'" id="cliente-'.$autoArray['ID'].'"> <img src="img/icons/doc_lines_icon&16.png" title="Atualizar Proposta" /></a>';};                                              
                                              if ($autoArray['TIPO_CADASTRO'] == 'C'){echo '<img src="img/icons/calc_icon&16.png" title="->Calculo" />';}; ?>
                                    </td>
                                    <td><?php echo formatarDataEN($autoArray['VIGENCIA_FIM']); ?></td>
                                    <td><?php echo $autoArray['DESCRICAO']; ?></td>
                                    <td><?php echo $autoArray['PLACA']; ?></td>
                                    <td><?php echo Cia::nomeCia( $autoArray['CIA_ID'] ) ?></td>
                                    <td style="text-align: right; padding-right: 10px">
                                        <img src="img/icons/doc_plus_icon&16.png" title="Renovar" />
                                        <img src="img/icons/doc_new_icon&16.png" title="Endosso" />                                    
                                        <img alt="Editar" onclick="javascript:window.location='documentos.php?acao=editar&tipoEditar=auto&id=<?=$autoArray['ID']?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" />
                                        <a href="documentos.php?acao=excluirAuto&id=<?php echo $autoArray['ID']; ?>" id="cliente-<?php echo $autoArray['ID']; ?>" class="excluir">
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
                                    <th><!-- .tipo do documento. --></th>
                                    <th>Vigencia</th>
                                    <th>Endereço</th>
                                    <th>Ocupacao</th>
                                    <th>CIA</th>
                                    <th><!--icones--></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!--           rotina para criar array com documentos re                -->
                                <?php
                                while( $reArray = mysql_fetch_array($reSql) ) :
                                    ?>
                                    <tr class="item reLinha">
                                        <td><?php if ($reArray['TIPO_CADASTRO'] == 'A'){echo '<img src="img/icons/case_icon&16.png" title="Apolice" />';};
                                                  if ($reArray['TIPO_CADASTRO'] == 'P'){echo '<a href="documentos.php?acao=novaApoliceRe&id='.$reArray['ID'].'" id="cliente-'.$reArray['ID'].'"> <img src="img/icons/doc_lines_icon&16.png" title="Atualizar Proposta" /></a>';};  
                                                  if ($reArray['TIPO_CADASTRO'] == 'C'){echo '<img src="img/icons/calc_icon&16.png" title="->Calculo" />';}; ?>
                                        </td>
                                        <td><?php echo formatarDataEN($reArray['VIGENCIA_FIM']); ?></td>
                                        <td><?php echo $reArray['ENDERECO']; echo ' '.$reArray['NUMERO']; echo " ".$reArray['COMPLEMENTO']; ?></td>
                                        <td><?php echo $reArray['OCUPACAO']; ?></td>
                                        <td><?php echo Cia::nomeCia( $reArray['CIA_ID'] ) ?></td>
                                        <td style="text-align: right; padding-right: 10px">
                                            <img onclick="javascript:window.location='documentos.php?acao=renovar&tipoRenovar=re&id=<?=$reArray['ID']?>'" style="cursor: pointer;" src="img/icons/doc_plus_icon&16.png" title="Renovar" />
                                            <img onclick="javascript:window.location='documentos.php?acao=endossar&tipoEndossar=re&id=<?=$reArray['ID']?>'" style="cursor: pointer;" src="img/icons/doc_new_icon&16.png" title="Endosso" />
                                            <img alt="Editar" onclick="javascript:window.location='documentos.php?acao=editar&tipoEditar=re&id=<?=$reArray['ID']?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" />
                                            <a href="documentos.php?acao=excluirRe&id=<?php echo $reArray['ID']; ?>" id="cliente-<?php echo $reArray['ID']; ?>" class="excluir">
                                                <img alt="Excluir"  style="cursor: pointer;" src="img/icons/trash_icon&16.png" border="0" />
                                            </a>
                                            &nbsp;
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
            if( $auto->form || $re->form ) : 
                ?>
                <div class="tabs">
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
                </div>
                <?php
            endif;
            ?>
                    
            <div class="form-apolice">
                <?include_once('apolice.php'); ?>
            </div><!-- .form-apolice -->
                    
        </div><!-- .linha -->
    </div><!-- .principal -->
 
    <?php include('_rodape.php') ?>
    
    
<script type="text/javascript">
    
$(function() {
    var 
        $this, 
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
    
    
    /* trocando ano da vigencia */
    $('input[name="VIGENCIA_INICIO"]').blur(function(e) {
        $this = $(this);
        var data = $this.val().split('/');
        
        data[2] = parseInt( data[2] ) + 1;
        
        $('input[name="VIGENCIA_FIM"]').val(data[0] + '/' + data[1] + '/' + data[2]);
    });
    
    <?php
    if( $re->acao == 'editarRe' ) {
        echo "$('#tipo-documento-re').click();";
    }
    if( $re->endossar ) {
        echo "$('#tipo-documento-re').click();";
    }
    
    ?>
});


</script>
</body>
</html>