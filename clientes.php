<?php
/**
 * Página do cadastro de clientes
 */

require_once '_config.php';
require_once 'inc/classes/cliente.class.php';


ConectarBanco();


$acao = request('acao', 'listar');
$cliente = new Cliente();



/**
 * Confirmar a exclusão
 */
if( $acao == 'confirmar-exclusao' ) {
    $id = get('id');
    $excluir = mysql_query("
        SELECT CLIENTE_ID FROM re
        WHERE CLIENTE_ID = ".$id."
            UNION
        SELECT CLIENTE_ID FROM auto
        WHERE CLIENTE_ID = ".$id." 
    ");

    if( mysql_num_rows($excluir) > 0 )
        echo 'S';
    
    exit();
}


/**
 * Gerando as cidades
 */
if( $acao == 'gerar-cidades' ) {
    echo selectCidades( post('ESTADO_ID') );

    exit();
}


/**
 * Excluidno cliente
 */
if( $acao == "excluir" ){
    $idCliente = get("id");
    $consultaClientes = mysql_query("
        DELETE FROM CLIENTES
        WHERE ID = '".$idCliente."'
    ");

    header('Location: clientes.php?msg=excluido');
}


/**
 * Inserir
 */
if( $acao == "inserir" ) {
    $cliente->valorAcao = 'inserirCliente';
    $cliente->listar   = false;
}


/**
 * Editando cliente
 */
if( $acao == "editar" ){
    $cliente->ID = get('id');
    if( !$cliente->informacoes() )
        header('Location: clientes.php');


    $cliente->valorAcao = 'editarCliente';
    $cliente->listar   = false;
    $cliente->editar   = true;


}

//
//Editando Clientes
//

if ( $acao == "editarCliente" ) {
    $dataNasc = dataNull('DATA_NASC');
    $dataExpedicao = dataNull('dataExpedicao');
    $dataCnh = dataNull('data_cnh');

    $cliente->ID = $idCliente;
    $cliente->ESTADO_ID = post('estado');
    $cliente->CIDADE_ID = post('cidade');
    $cliente->TIPO_CLIENTE = post('tipoCliente');
    $cliente->CPF = post('cpf');
    $cliente->CNPJ = post('cnpj');
    $cliente->NOME = post('nome');
    $cliente->DATA_NASC = dataNullSql(post('DATA_NASC'));
    $cliente->RG = post('rg');
    $cliente->ORG_EXPEDIDOR = post('orgao');
    $cliente->ORG_DATA_EXPEDICAO = dataNullSql(post('dataExpedicao'));
    $cliente->ENDERECO = post('endereco');
    $cliente->NUMERO = post('numero');
    $cliente->COMPLEMENTO = post('complemento');
    $cliente->BAIRRO = post('bairro');
    $cliente->CEP = post('cep');
    $cliente->CNH = post('cnh');
    $cliente->CNH_DATA_EXPEDICAO = dataNullSql(post('dataExpedicao'));
    $cliente->SEXO = post('sexo');
    $cliente->ESTADO_CIVIL = post('estadoCivil');
    $cliente->FONE = post('fone');
    $cliente->FONE2 = post('fone2');
    $cliente->EMAIL = post('email');
    $cliente->SITUACAO = post('situacao');
    $cliente->OBS = post('obs');

    

    if( post('tipoCliente') == 'F' ) {
        $valida = bancoCpf(post('cpf'), post('id'));
        $msgErro = "O CPF já está cadastrado para outro cliente, insira outro cpf";
    } else {
        $valida = bancoCnpj(post('cnpj'), post('id'));
        $msgErro = "O CNPJ já está cadastrado para outro cliente, insira outro cpf";
    }

    if( $valida ){
        $sql = "
        UPDATE clientes SET
              ESTADO_ID          = '".addslashes(post('estado'))."',
              CIDADE_ID          = '".addslashes(post('cidade'))."',
              TIPO_CLIENTE       = '".addslashes(post('tipoCliente'))."',
              CPF                = '".addslashes(post('cpf'))."',
              CNPJ               = '".addslashes(post('cnpj'))."',
              NOME               = '".addslashes(post('nome'))."',
              DATA_NASC          = ".$dataNasc.",
              RG                 = '".addslashes(post('rg'))."',
              ORG_EXPEDIDOR      = '".addslashes(post('orgao'))."',
              ORG_DATA_EXPEDICAO = ".$dataExpedicao.",
              ENDERECO           = '".addslashes(post('endereco'))."',
              NUMERO             = '".addslashes(post('numero'))."',
              COMPLEMENTO        = '".addslashes(post('complemento'))."',
              BAIRRO             = '".addslashes(post('bairro'))."',
              CEP                = '".addslashes(post('cep'))."',
              CNH                = '".addslashes(post('cnh'))."',
              CNH_DATA_EXPEDICAO = ".$dataCnh.",
              SEXO               = '".addslashes(post('sexo'))."',
              ESTADO_CIVIL       = '".addslashes(post('estadoCivil'))."',
              FONE               = '".addslashes(post('fone'))."',
              FONE2              = '".addslashes(post('fone2'))."',
              EMAIL              = '".addslashes(post('email'))."',
              SITUACAO           = '".addslashes(post('situacao'))."',
              OBS                = '".addslashes(post('obs'))."'
              WHERE ID = '".addslashes(post('id'))."'
        ";
        mysql_query($sql) or die(mysql_error() . $sql);

        header('Location: clientes.php?msg=editado');
    } else {
        header('Location: clientes.php?msg=erro-cpf&acao=editar&id='.post('id').'');
    }
}


/**
 * Inserindo cliente
 */
if( $acao == "inserirCliente" ) {
    if( post('tipoCliente') == 'F' ) {
        $valida = bancoCpf(post('cpf'), post('id'));
        $msgErro = "O CPF já está cadastrado para outro cliente, insira outro cpf";
        $parametro = "erro-cpf";
        
    } else {
        $valida = bancoCnpj(post('cnpj'), post('id'));
        $msgErro = "O CNPJ já está cadastrado para outro cliente, insira outro cpf";
        $parametro = "erro-cnpj";
    }
    
    $idCliente = get("id");
    $cliente->ID = $idCliente;
    $cliente->ESTADO_ID = post('estado');
    $cliente->CIDADE_ID = post('cidade');
    $cliente->TIPO_CLIENTE = post('tipoCliente');
    $cliente->CPF = post('cpf');
    $cliente->CNPJ = post('cnpj');
    $cliente->NOME = post('nome');
    $cliente->DATA_NASC = dataNullSql( post('DATA_NASC') );
    $cliente->RG = post('rg');
    $cliente->ORG_EXPEDIDOR = post('orgao');
    $cliente->ORG_DATA_EXPEDICAO = dataNullSql( post('dataExpedicao') );
    $cliente->ENDERECO = post('endereco');
    $cliente->NUMERO = post('numero');
    $cliente->COMPLEMENTO = post('complemento');
    $cliente->BAIRRO = post('bairro');
    $cliente->CEP = post('cep');
    $cliente->CNH = post('cnh');
    $cliente->CNH_DATA_EXPEDICAO = dataNullSql( post('dataExpedicao') );
    $cliente->SEXO = post('sexo');
    $cliente->ESTADO_CIVIL = post('estadoCivil');
    $cliente->FONE = post('fone');
    $cliente->FONE2 = post('fone2');
    $cliente->EMAIL = post('email');
    $cliente->SITUACAO = post('situacao');
    $cliente->OBS = post('obs');

    if( $valida ) {
        if( $cliente->inserir() ) {
            header('Location: clientes.php?msg=inserido');
        } else {
            header('Location: clientes.php?acao=inserir');
        }
    }else{
        //header('Location: clientes.php?msg='.$parametro.'&acao=inserir&id='.$idCliente);
        
        $cliente->valorAcao = 'inserirCliente';
        $cliente->listar   = false;
        $cliente->inserir   = true;
        $acao = "inserir";
        
        if($parametro == "erro-cpf"){
            $cliente->CPF = '';
            $msgErro = 'O cpf já está cadastrado para outro cliente, favor inserir outro cpf!';
        }else{
            $cliente->CNPJ = '';
            $msgErro = 'O cnpj já está cadastrado para outro cliente, favor inserir outro cpnj!';
        }
    }

}


switch (request('msg')) {
    case 'excluido' :
        $msgErro = 'Excluido com sucesso!';
        break;
    case 'inserido' :
        $msgErro = 'Inserido com sucesso!';
        break;
    case 'editado' :
        $msgErro = 'Editado com sucesso!';
        break;
    case 'erro-cpf' :
        $msgErro = 'O cpf já está cadastrado para outro cliente, favor inserir outro cpf!';
        break;
    case 'erro-cnpj' :
        $msgErro = 'O cnpj já está cadastrado para outro cliente, favor inserir outro cnpj!';
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

    <div class="principal clientes">
    <h1>Clientes</h1>

    <? if ( $acao != "inserir" && $acao != "editar" ){ ?>

        <div class="botaoadd" style="float: right; width: auto">
          <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='clientes.php?acao=inserir'" title="Adicionar" />
        </div><!-- .botaoadd -->

    <? }?>

        <div class="erro">
            <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
        </div><!-- .erro -->

    <? if ( $acao != "inserir" && $acao != "editar" ){ ?>
        <div class="pesquisa" style="width: 100%">
            <form name="buscar">
                <fieldset>
                <legend>Busca</legend>

                    <input class="buscar" type="text" name="buscar" value="<?php if (isset($_POST['buscar'])){ echo $_POST['buscar'];} ?>" onkeydown="buscaCliente();" />
                    <img src="img/pesquisa.png" />
                </fieldset>
            </form>
        </div><!-- .pesquisa -->

    <? }?>
        <div class="linha">

            <?php
            /**
             * Listando os clientes
             */
            if( $cliente->listar ) :
                ?>
                <div class="listagem_interno">
                    <table class="tablesorter">
                        <thead>
                            <tr>
                                <th><!--calculo--></th>
                                <th>Cliente</th>
                                <th>Endereço</th>
                                <th>Número</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th><!--documentos--></th>
                                <th><!--editar--></th>
                                <th><!--excluir--></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <!--           rotina para criar array com clientes                 -->
                            <?php
                            $sql = mysql_query("SELECT * FROM clientes ORDER BY nome");
                            while( $clientes = mysql_fetch_array($sql) ) :
                                ?>
                                <tr nome="<?php echo strtolower($clientes['NOME']); ?>" class="clienteLinha">
                                    <td>
                                    <img id="cliente-<?php echo $clientes['ID']; ?>" class="lista" src="img/icons/zoom_icon&16.png" title="Visualizar" />
                                    <a href="documentos.php?acao=calculo&idCliente=<?php echo $clientes['ID']; ?>" id="cliente-<?php echo $clientes['ID']; ?>">
                                        <img alt="Calculo" src="img/icons/calc_icon&16.png"/>
                                    </a>
                                    
                                    </td>
                                    <td><?php echo $clientes['NOME']; ?></td>
                                    <td><?php echo $clientes['ENDERECO']; ?></td>
                                    <td><?php echo $clientes['NUMERO']; ?></td>
                                    <td><?php echo $clientes['FONE']; ?></td>
                                    <td><?php echo $clientes['EMAIL']; ?></td>
                                    <td><img alt="Documentos" class="center-img" onclick="javascript:window.location='documentos.php?idCliente=<?php echo $clientes['ID']; ?>'" style="cursor: pointer;" src="img/icons/folder_open_icon&16.png" /></td>
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
                <form action="clientes.php?acao=<?=$cliente->valorAcao?>" method="post" id="clientes">
                    <input type="hidden" value="<?=$cliente->ID?>" name="id" id="id" />
                    <div class="campo-input" style="margin-left: 10px">
                        <label class="label">Tipo de Pessoa </label>
                        <input type="radio" value="F" id="tipo-cliente-fisica" name="tipoCliente" checked="checked" class="bt-tipo-pessoa" />
                        <label for="tipo-cliente-fisica">Física</label>

                        <input type="radio" value="J" id="tipo-cliente-juridica" name="tipoCliente" <?=$cliente->TIPO_CLIENTE == "J" ? 'checked="checked"' : '';?> class="bt-tipo-pessoa" />
                        <label for="tipo-cliente-juridica">Jurídica</label>
                    </div>

                    <div class="float-left">
                        <div class="campo-input">
                            <label for="nome" class="label" >Nome</label>
                            <input type="text" id="nome" name="nome" style="width: 150px" value="<?=$cliente->NOME?>" tabindex="1" />
                        </div>

                        <div class="campo-input campo-pessoa-fisica">
                           <label for="DATA_NASC" class="label">Nascimento</label>
                           <input type="text" id="DATA_NASC" name="DATA_NASC" value="<?=formatarDataEN($cliente->DATA_NASC)?>" tabindex="3" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label for="orgao" class="label" >Org&atilde;o Expedidor</label>
                            <select type="text" id="orgao" name="orgao" style="width: 150px" tabindex="5">
                                <option value="ssp" <?=$cliente->ORG_EXPEDIDOR == 'ssp' ? 'selected="selected"' : null;?>>SSP RS</option>
                                <option value="sjs" <?=$cliente->ORG_EXPEDIDOR == 'sjs' ? 'selected="selected"' : null;?>>SJS RS</option>
                            </select>
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label for="cnh" class="label" >CNH</label>
                            <input type="text" id="cnh" name="cnh" style="width: 150px" value="<?=$cliente->CNH?>" tabindex="7" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label class="label"> Sexo</label>
                            <input type="radio" id="sexoM" name="sexo" value="M" checked="checked" tabindex="9" />
                            <label for="sexoM" >M</label>
                            <input type="radio" id="sexoF" name="sexo" value="F"<?=$cliente->SEXO == 'sexoF' ? 'checked="checked"' : null;?> />
                            <label for="sexoF" >F</label>
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-select">
                            <label for="estado" class="label">Estado</label>
                            <?echo selectEstados($cliente->ESTADO_ID);?>
                        </div>

                        <div class="campo-input">
                            <label for="endereco" class="label">Endereço</label>
                            <input type="text" id="endereco" name="endereco" value="<?=$cliente->ENDERECO?>" tabindex="11"/>
                        </div>

                        <div class="campo-input">
                            <label for="complemento" class="label">Complemento</label>
                            <input type="text" id="complemento" name="complemento" value="<?=$cliente->COMPLEMENTO?>" tabindex="13" />
                        </div>

                        <div class="campo-input">
                            <label for="cep" class="label">CEP</label>
                            <input type="text" id="cep" name="cep" value="<?=$cliente->CEP?>" tabindex="15" />
                        </div>

                        <div class="campo-input">
                            <label for="fone" class="label">Fone</label>
                            <input type="text" id="fone" name="fone" value="<?=$cliente->FONE?>" tabindex="17"/>
                        </div>



                    </div><!-- .float-left -->


                    <div class="campo-input float-left">
                        <div class="campo-input campo-pessoa-fisica">
                            <label for="cpf" class="label" >CPF</label>
                            <input type="text" id="cpf" name="cpf" value="<?=$cliente->CPF?>" tabindex="2" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-juridica">
                            <label for="cnpj" class="label" >CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" value="<?=$cliente->CNPJ?>" tabindex="2" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label for="rg" class="label" >RG</label>
                            <input type="text" id="rg" name="rg" value="<?=$cliente->RG?>" tabindex="4" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label for="dataExpedicao" class="label" >Data Expedi&ccedil;&atilde;o</label>
                            <input type="text" id="dataExpedicao" name="dataExpedicao" style="width: 150px" value="<?=formatarDataEN($cliente->ORG_DATA_EXPEDICAO)?>" tabindex="6" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label for="data_cnh" class="label" >Data CNH</label>
                            <input type="text" id="data_cnh" name="data_cnh" style="width: 150px" value="<?=formatarDataEN($cliente->CNH_DATA_EXPEDICAO)?>" tabindex="8" />
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-pessoa-fisica">
                            <label for="estadoCivil" class="label">Estado Civil</label>
                            <select id="estadoCivil" name="estadoCivil" tabindex="10">
                                <option value="C" <?=$cliente->ESTADO_CIVIL == 'C' ? 'selected="selected"' : null;?>>Casado</option>
                                <option value="S" <?=$cliente->ESTADO_CIVIL == 'S' ? 'selected="selected"' : null;?>>Solteiro</option>
                                <option value="D" <?=$cliente->ESTADO_CIVIL == 'D' ? 'selected="selected"' : null;?>>Divorciado</option>
                                <option value="V" <?=$cliente->ESTADO_CIVIL == 'V' ? 'selected="selected"' : null;?>>Viuvo</option>
                            </select>
                        </div><!-- .campo-pessoa-fisica -->

                        <div class="campo-input campo-select">
<<<<<<< HEAD
                            <label for="box-cidades" class="label">Cidade</label>
=======
                            <label for="box" class="label">Cidade</label>
>>>>>>> f1a59bc5f20f657f65c1c071af943356acd3a464
                            <span id="box-cidades"><?echo selectCidades($cliente->ESTADO_ID, $cliente->CIDADE_ID);?></span>
                        </div>

                        <div class="campo-input">
                            <label for="numero" class="label">Numero</label>
                            <input type="text" id="numero" name="numero" value="<?=$cliente->NUMERO?>" tabindex="12" />
                        </div>

                        <div class="campo-input">
                            <label for="bairro" class="label">Bairro</label>
                            <input type="text" id="bairro" name="bairro" value="<?=$cliente->BAIRRO?>" tabindex="14" />
                        </div>

                        <div class="campo-input">
                            <label for="email" class="label">Email</label>
                            <input type="text" id="email" name="email" value="<?=$cliente->EMAIL?>" tabindex="16" />
                        </div>

                        <div class="campo-input">
                            <label for="fone2" class="label">Fone 2</label>
                            <input type="text" id="fone2" name="fone2" value="<?=$cliente->FONE2?>" tabindex="18" />
                        </div>

                        <div class="campo-input">
                            <br /><br /><br /><br /><br /><br />
                            <input class="bt_voltar campo-input" type="button" onclick="javascript:window.location='clientes.php'" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
                            <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#clientes').submit()" title="Salvar" style="float:left;clear:none" />
                            
                        </div><!-- .botaoadd -->
                    </div><!-- .floar-left -->

                    <div class="float-left">
                        <div class="campo-input">
                            <label for="obs" class="label">Observacao</label>
                            <textarea id="obs" name="obs" style="resize:none" rows="10" cols="30" tabindex="19" ><?=$cliente->OBS?></textarea>
                        </div>
                    </div><!-- float left -->
                    <div style="clear: both"></div>
                </form>
                <?php
            endif;
            ?>
        </div><!-- .linha -->
    </div><!-- .principal -->
    <?php include('_rodape.php') ?>
 
    <script type="text/javascript">
        /*esconder fisica/ juridica */

        var $tempo = "";
        function buscaCliente(){
            clearTimeout($tempo);
            $tempo = setTimeout(buscar, 500);
        }

        function buscar(){
            var cliente = $('.buscar').val();
            if( cliente.length > 0 ){
                $('.clienteLinha').each(function() {
                    var $this = $(this);
                    
                    if( strstr( $this.attr('nome'), cliente ) ) {
                        
                        $this.show();
                    } else {
                        $this.hide();
                    }
                });
            } else {
                $('.clienteLinha').show();
            }
        }

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
            /*validando campos*/
            $('#clientes').validate({
                rules:{
                    'nome': {required: true},
                    'email': {email: true},
                    'DATA_NASC' : {dataBR : true},
                    'data_cnh' : {dataBR : true},
                    'cpf' : {cpf : 'both'},
                    'cnpj' : {cnpj : 'both'},
                    'dataExpedicao' : {dataBR : true}
                }
            });
            /*setando mascaras*/
            $("#fone").setMask("(99)9999-9999");
            $("#fone2").setMask("(99)9999-9999");
            $("#cpf").setMask("999.999.999-99");
            $("#cnpj").setMask("99.999.999/9999-99");
            $("#cep").setMask("99999-999");
            $("#DATA_NASC").setMask("99/99/9999");
            $("#data_cnh").setMask("99/99/9999");
            $("#dataExpedicao").setMask("99/99/9999");
            $("#rg").setMask("9999999999");
            $("#cnh").setMask("99999999999")


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
            });



            <?php
            if( $cliente->editar ) {
                $tipoPessoa = $cliente->TIPO_CLIENTE == 'J' ? 'tipo-cliente-juridica' : 'tipo-cliente-fisica';
                echo "$('#".$tipoPessoa."').click();";
            }
            ?>
        });




        function strstr(haystack, needle) {
            if( haystack.indexOf(needle) > -1 ) {
                return true;
            }

            return false;
        }


        
    </script>
    
</body>
</html>