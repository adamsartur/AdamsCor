<?php
/**
 * Página do cadastro de calculos auto
 */

require_once '_config.php';
ConectarBanco();


$acao = request('acao', 'listar');
$calculo = new stdClass();
$calculo->valorAcao = null;
$calculo->listar = true;

$calculo->ID = null;
$calculo->TIPO_CADASTRO = null;
$calculo->CLIENTE_ID = null;
$calculo->CIA_ID = null;
$calculo->MARCA_ID = null;
$calculo->DESCRICAO = null;
$calculo->ANO = null;
$calculo->KM_ANUAL = null;
$calculo->ZERO = null;
$calculo->PLACA = null;
$calculo->CHASSI = null;
$calculo->RENAVAM = null;
$calculo->FILHOS = null;
$calculo->COMBUSTIVEL = null;
$calculo->GARAGEM_CASA = null;
$calculo->GARAGEM_TRABALHO = null;
$calculo->GARAGEM_FACULDADE = null;
$calculo->BONUS = null;
$calculo->APOLICE = null;
$calculo->VIGENCIA_INICIO = null;
$calculo->VIGENCIA_FINAL = null;
$calculo->CI = null;
$calculo->PREMIO = null;
$calculo->PARCELAMENTO = null;
$calculo->FORMA_PAGAMENTO = null;
$calculo->DATA_VENCIMENTO = null;
$calculo->DANOS_MORAIS = null;
$calculo->FIPE = null;
$calculo->PFRANQUIAREMIO = null;
$calculo->DM = null;
$calculo->DC = null;
$calculo->APP = null;
$calculo->VIDROS = null;
$calculo->ASSISTENCIA = null;
$calculo->CARRO_RESERVA = null;
$calculo->OBS = null;




/**
 * Excluindo cálculo-auto
 */
if( $acao == "excluir" ){
    $idCalculo = get("id");
    $consultaCalculos = mysql_query("
        DELETE FROM auto
        WHERE ID = '".$idCalculo."'
    ");

    header('Location: calculos-auto.php');
}


/**
 * Inserir
 */
if( $acao == "inserir" ) {
    $calculo->valorAcao = 'inserirCalculo';
}


/**
 * Inserindo calculos auto
 */
if( $acao == "editar" ){
    $idCalculo = get("id");
    $consultaCalculo = mysql_query("
        SELECT * FROM auto
        WHERE ID = '".$idCalculo."'
    ");
   $arrayCalculos = mysql_fetch_array($consultaCalculo);
    //
    //RELACIONAR AQUI OS CAMPOS DO BANCO COMO NOME
    //
    $calculo->ID = $arrayCliente['ID'];
    $calculo->TIPO_CADASTRO = null;
    $calculo->CLIENTE_ID = null;
    $calculo->CIA_ID = null;
    $calculo->MARCA_ID = null;
    $calculo->DESCRICAO = null;
    $calculo->ANO = null;
    $calculo->KM_ANUAL = null;
    $calculo->ZERO = null;
    $calculo->PLACA = null;
    $calculo->CHASSI = null;
    $calculo->RENAVAM = null;
    $calculo->FILHOS = null;
    $calculo->COMBUSTIVEL = null;
    $calculo->GARAGEM_CASA = null;
    $calculo->GARAGEM_TRABALHO = null;
    $calculo->GARAGEM_FACULDADE = null;
    $calculo->BONUS = null;
    $calculo->APOLICE = null;
    $calculo->VIGENCIA_INICIO = null;
    $calculo->VIGENCIA_FINAL = null;
    $calculo->CI = null;
    $calculo->PREMIO = null;
    $calculo->PARCELAMENTO = null;
    $calculo->FORMA_PAGAMENTO = null;
    $calculo->DATA_VENCIMENTO = null;
    $calculo->DANOS_MORAIS = null;
    $calculo->FIPE = null;
    $calculo->PFRANQUIAREMIO = null;
    $calculo->DM = null;
    $calculo->DC = null;
    $calculo->APP = null;
    $calculo->VIDROS = null;
    $calculo->ASSISTENCIA = null;
    $calculo->CARRO_RESERVA = null;
    $calculo->OBS = null;


    $calculo->valorAcao = 'editarCalculo';
    $calculo->listar   = false;


}

//
//Editando Calculos
//

if ( $acao == "editarCalculo" ) {
    $sql = "
    UPDATE auto SET
          CIDADE_ID          =  NULL,
          TIPO_CLIENTE       = '".addslashes(post('tipoCliente'))."',
          CPF                = '".addslashes(post('cpf'))."',
          CNPJ               = '".addslashes(post('cnpj'))."',
          NOME               = '".addslashes(post('nome'))."',
          DATA_NASC          = '".addslashes(post('DATA_NASC'))."',
          RG                 = '".addslashes(post('rg'))."',
          ORG_EXPEDIDOR      = '".addslashes(post('orgao'))."',
          ORG_DATA_EXPEDICAO = '".addslashes(post('dataExpedicao'))."',
          ENDERECO           = '".addslashes(post('endereco'))."',
          NUMERO             = '".addslashes(post('numero'))."',
          COMPLEMENTO        =  '".addslashes(post('complemento'))."',
          BAIRRO             = '".addslashes(post('bairro'))."',
          CEP                = '".addslashes(post('cep'))."',
          CNH                = '".addslashes(post('cnh'))."',
          CNH_DATA_EXPEDICAO = '".addslashes(post('data_cnh'))."',
          SEXO               = '".addslashes(post('sexo'))."',
          ESTADO_CIVIL       = '".addslashes(post('estadoCivil'))."',
          FONE               = '".addslashes(post('fone'))."',
          FONE2              = '".addslashes(post('fone2'))."',
          EMAIL              = '".addslashes(post('email'))."',
          SITUACAO           = '".addslashes(post('situacao'))."',
          OBS                = '".addslashes(post('obs'))."'

          WHERE ID = '".addslashes(post('id'))."'
    ";
    mysql_query($sql) or die( mysql_error());

    header('Location: clientes.php');
}

/**
 * Inserindo cliente
 */

if ($acao == "inserirCliente"){
    $data = implode("-", array_reverse(explode("/", $data)));
    $sql = "
    INSERT INTO clientes (
	CIDADE_ID, TIPO_CLIENTE, CPF, CNPJ, NOME, DATA_NASC, RG, ORG_EXPEDIDOR, ORG_DATA_EXPEDICAO, ENDERECO, NUMERO, COMPLEMENTO, BAIRRO, CEP, CNH, CNH_DATA_EXPEDICAO, SEXO, ESTADO_CIVIL, FONE, FONE2, EMAIL, SITUACAO, OBS
    ) VALUES (
            NULL,
            '".addslashes(post('tipoCliente'))."',
            '".addslashes(post('cpf'))."',
            '".addslashes(post('cnpj'))."',
            '".addslashes(post('nome'))."',
            ".$dataNasc.",
            '".addslashes(post('rg'))."',
            '".addslashes(post('orgao'))."',
            '".addslashes(post('dataExpedicao'))."',
            '".addslashes(post('endereco'))."',
            '".addslashes(post('numero'))."',
            '".addslashes(post('complemento'))."',
            '".addslashes(post('bairro'))."',
            '".addslashes(post('cep'))."',
            '".addslashes(post('cnh'))."',
            '".addslashes(post('data_cnh'))."',
            '".addslashes(post('sexo'))."',
            '".addslashes(post('estadoCivil'))."',
            '".addslashes(post('fone'))."',
            '".addslashes(post('fone2'))."',
            '".addslashes(post('email'))."',
            '".addslashes(post('situacao'))."',
            '".addslashes(post('obs'))."'
    );
    ";
    mysql_query($sql) or die(mysql_error());

    header('Location: clientes.php');

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
        <div class="linha">

            <? if ( $acao != "inserir" && $acao != "editar" ){ ?>
            <div class="botaoadd">
                <p style="padding: 10px; float:left;">Clientes</p>
                <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='clientes.php?acao=inserir'" title="Adicionar"/>
            </div><!-- .botaoadd -->
           <? }else{ ?>
            <div class="botaoadd">
                <p style="padding: 10px; float:left;">Clientes</p>
                <input class="bt_salvar" type="button" value="Salvar" onclick="$('#clientes').submit()" title="Salvar"/>
            </div><!-- .botaoadd -->
           <? } ?>

            <?php
            /**
             * Listando os clientes
             */
            if( $calculo->listar ) :
                ?>
                <div class="listagem_interno">
                    <table class="tablesorter">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Endereço</th>
                                <th>Número</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th><!--editar--></th>
                                <th><!--excluir--></th>
                            </tr>
                        </thead>
                        <tbody>
                        <!--           rotina para criar array com clientes                 -->
                            <?php
                            $sql = mysql_query("SELECT * FROM clientes");
                            while( $clientes = mysql_fetch_array($sql) ) :
                                ?>
                                <tr>
                                    <td><?php echo $clientes['NOME']; ?></td>
                                    <td><?php echo $clientes['ENDERECO']; ?></td>
                                    <td><?php echo $clientes['NUMERO']; ?></td>
                                    <td><?php echo $clientes['FONE']; ?></td>
                                    <td><?php echo $clientes['EMAIL']; ?></td>
                                    <td><img alt="Editar" class="center-img" onclick="javascript:window.location='clientes.php?acao=editar&id=<?php echo $clientes['ID']; ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" /></td>
                                    <td>
                                        <a href="clientes.php?acao=excluir&id=<?php echo $clientes['ID']; ?>" id="cliente-<?php echo $clientes['ID']; ?>" class="excluir">
                                            <img alt="Excluir" class="center-img" style="cursor: pointer;" src="img/icons/trash_icon&16.png" border="0" />
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
            endif;

            /**
             * Formulário de inserção / edição
             */
            if( $acao == 'inserir' || $acao == 'editar' ) :
                ?>
                <form action="clientes.php?acao=<?=$calculo->valorAcao?>" method="post" id="clientes">
                    <input type="hidden" value="<?=$calculo->ID?>" name="id" id="id" />
                    <div style="margin-left: 10px">
                        <label for="tipo-cliente-fisica">Física</label>
                        <input type="radio" value="F" id="tipo-cliente-fisica" name="tipoCliente" checked="checked" class="bt-tipo-pessoa" />

                        <label for="tipo-cliente-juridica">Jurídica</label>
                        <input type="radio" value="J" id="tipo-cliente-juridica" name="tipoCliente" class="bt-tipo-pessoa" />
                    </div>

                    <div class="float-left">
                        <div>
                            <label for="nome" class="label" >Nome</label>
                            <input type="text" id="nome" name="nome" style="width: 150px" value="<?=$calculo->NOME?>" />
                        </div>

                        <div class="campo-pessoa-fisica">
                           <label for="DATA_NASC" class="label" >Nascimento</label>
                           <input type="text" id="DATA_NASC" name="DATA_NASC" value="<?=$calculo->DATA_NASC?>" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-fisica">
                            <label for="orgao" class="label" >Org&atilde;o Expedidor</label>
                            <select type="text" id="orgao" name="orgao" style="width: 150px">
                                <option value="ssp" <?=$calculo->ORG_EXPEDIDOR == 'ssp' ? 'selected="selected"' : null;?>>SSP RS</option>
                                <option value="sjs" <?=$calculo->ORG_EXPEDIDOR == 'sjs' ? 'selected="selected"' : null;?>>SJS RS</option>
                            </select>
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-fisica">
                            <label for="cnh" class="label" >CNH</label>
                            <input type="text" id="cnh" name="cnh" style="width: 150px" value="<?=$calculo->CNH?>" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-fisica">
                            Sexo:
                            <label for="sexoF" >F</label>
                            <input type="radio" id="sexoF" name="sexo" value="F"<?=$calculo->SEXO == 'sexoF' ? 'selected="checked"' : null;?> />
                            <label for="sexoM" >M</label>
                            <input type="radio" id="sexoM" name="sexo" value="M"<?=$calculo->SEXO == 'sexoM' ? 'selected="checked"' : null;?> />
                        </div><!-- .campo-pessoa-fisica -->

                        <div>
                            <label for="endereco" class="label">Endere&ccedil;o</label>
                            <input type="text" id="endereco" name="endereco" value="<?=$calculo->ENDERECO?>"/>
                        </div>

                        <div>
                            <label for="complemento" class="label">Complemento</label>
                            <input type="text" id="complemento" name="complemento" value="<?=$calculo->COMPLEMENTO?>" />
                        </div>

                        <div>
                            <label for="cep" class="label">CEP</label>
                            <input type="text" id="cep" name="cep" value="<?=$calculo->CEP?>" />
                        </div>

                        <div>
                            <label for="fone" class="label">Fone</label>
                            <input type="text" id="fone" name="fone" value="<?=$calculo->FONE?>" />
                        </div>

                        <div>
                            <label for="obs" class="label">Observacao</label>
                            <textarea id="obs" name="obs" style="resize:none" rows="10" cols="30" ><?=$calculo->OBS?></textarea>
                        </div>

                    </div><!-- .float-left -->


                    <div class="float-right">
                        <div class="campo-pessoa-fisica">
                            <label for="cpf" class="label" >CPF</label>
                            <input type="text" id="cpf" name="cpf" value="<?=$calculo->CPF?> "/>
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-juridica">
                            <label for="cnpj" class="label" >CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" value="<?=$calculo->CNPJ?>" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div id="select-cidades">
                            <!--             AQUI VAI O SELECT COM AS CIDADES-->
                        </div><!-- #select-cidades -->

                        <div class="campo-pessoa-fisica">
                            <label for="rg" class="label" >RG</label>
                            <input type="text" id="rg" name="rg" value="<?=$calculo->RG?>" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-fisica">
                            <label for="dataExpedicao" class="label" >Data Expedi&ccedil;&atilde;o</label>
                            <input type="text" id="dataExpedicao" name="dataExpedicao" style="width: 150px" value="<?=$calculo->ORG_DATA_EXPEDICAO?>" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-fisica">
                            <label for="data_cnh" class="label" >Data Primeira CNH</label>
                            <input type="text" id="data_cnh" name="data_cnh" style="width: 150px" value="<?=$calculo->CNH_DATA_EXPEDICAO?>" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-pessoa-fisica">
                            <label for="estadoCivil" class="label">Estado Civil</label>
                            <select id="estadoCivil" name="estadoCivil">
                                <option value="casado" <?=$calculo->ESTADO_CIVIL == 'casado' ? 'selected="selected"' : null;?>>Casado</option>
                                <option value="solteiro" <?=$calculo->ESTADO_CIVIL == 'solteiro' ? 'selected="selected"' : null;?>>Solteiro</option>
                                <option value="outro" <?=$calculo->ESTADO_CIVIL == 'outro' ? 'selected="selected"' : null;?>>Outro</option>
                            </select>
                        </div><!-- .campo-pessoa-fisica -->

                        <!--AQUI VAI SER COLOCADA UMA FUNCAO PARA EXIBIR OS DADOS ADICIONAIS PARA PESSOA FISICA-->

                        <div>
                            <label for="numero" class="label">Numero</label>
                            <input type="text" id="numero" name="numero" value="<?=$calculo->NUMERO?>"/>
                        </div>

                        <div>
                            <label for="bairro" class="label">Bairro</label>
                            <input type="text" id="bairro" name="bairro" value="<?=$calculo->BAIRRO?>" />
                        </div>

                        <div>
                            <label for="email" class="label">Email</label>
                            <input type="text" id="email" name="email" value="<?=$calculo->EMAIL?>" />
                        </div>

                        <div>
                            <label for="fone2" class="label">Fone 2</label>
                            <input type="text" id="fone2" name="fone2" value="<?=$calculo->FONE2?>" />
                        </div>
                    </div>
                </form>
                <?php
            endif;
            ?>
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
    <!-- esconder campos fisica/ juridica -->

    <script type="text/javascript">
        $(function() {
            var
            tipo,
            $this,
            $fisica   = $('.campo-pessoa-fisica'),
            $juridica = $('.campo-pessoa-juridica');

            $juridica.hide();

            $('.bt-tipo-pessoa').click(function(e) {
                $this = $(this);

                tipo = $this.attr('id').split('-');

                if( tipo[2] == 'fisica' ) {
                    $('#cnpj').val('');
                    $juridica.hide();
                    $fisica.fadeIn(250);
                } else {
                    $('#cpf').val('');
                    $juridica.fadeIn(250);
                    $fisica.hide();
                }
            });

            $('#clientes').validate({
                rules:{
                    'nome': {required: true},
                    'email': {email: true},
                    'DATA_NASC' : {minlength : 10},
                    'data_cnh' : {minlength : 10},
                    'cpf' : {cpf : 'both'},
                    'cnpj' : {cnpj : 'both'}
                }
            });

            $("#fone").setMask("9999-9999");
            $("#fone2").setMask("9999-9999");
            $("#cpf").setMask("999.999.999-99");
            $("#cnpj").setMask("99.999.999/9999-99");
            $("#cep").setMask("99999-999");
            $("#DATA_NASC").setMask("99/99/9999");
            $("#data_cnh").setMask("99/99/9999");
            $("#dataExpedicao").setMask("99/99/9999");
            $("#rg").setMask("9999999999");



            /* excluindo */
            var $this, id, url;
            $('.excluir').click(function(e) {
                e.preventDefault();
                if( confirm("Deseja excluir o cliente?") ) {
                    $this = $(this);
                    id    = $this.attr('id').split('-');
                    url   = $this.attr('href');

                    $.get('clientes.php', { acao : 'confirmar-exclusao', id : id[1] }, function(data) {
                        if( data == 'S' ) {
                            if( !confirm("O cliente possui documento(s) cadastrado(s), deseja mesmo excluir?") ) {
                                return false;
                            } else {
                                window.location = url;
                            }
                        } else {
                            window.location = url;
                        }
                    });
                }
            })
        });





    </script>

</body>
</html>