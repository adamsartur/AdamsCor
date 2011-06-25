<?php
require_once '_config.php';
ConectarBanco();
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

    <div class="documentos">
    <h1>Documentos</h1>

        <div class="botaoadd" style="float: right; width: auto">
          <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='documentos.php?acao=inserir'" title="Adicionar"/>
        </div><!-- .botaoadd -->

        <div class="erro">
            <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
        </div><!-- .erro -->

        <div class="linha">
            <!--Formulário de inserção / edição-->
            <form action="post" >
                <div>
                    <label class="label">Ramo </label>
                    <input type="radio" value="auto" id="tipo-documento-auto" name="tipoDocumento" checked="checked" class="bt-tipo-documento" />
                    <label for="tipo-documento-auto">Auto</label>
                    <input type="radio" value="re" id="tipo-documento-re" name="tipoDocumento" class="bt-tipo-documento" />
                    <label for="tipo-cliente-re">RE</label>
                </div>

                <div>
                    <label for="vigencia_inicio" class="label" >Vigencia:</label>
                    <input type="text" id="vigencia_inicio" name="vigencia_inico" tabindex="1" />
                    <input type="text" id="vigencia_fim" name="vigencia_fim" tabindex="2" />
                </div>

                <div>
                    <!-- fazer box com autocomplete das CIAS-->
                    <selec type="text" id="cia"
                </div>

                <div>
                    <label for="orgao" class="label" >Org&atilde;o Expedidor</label>
                    <select type="text" id="orgao" name="orgao" style="width: 150px" tabindex="5">
                    <option value="ssp" <?=$cliente->ORG_EXPEDIDOR == 'ssp' ? 'selected="selected"' : null;?>>SSP RS</option>
                    <option value="sjs" <?=$cliente->ORG_EXPEDIDOR == 'sjs' ? 'selected="selected"' : null;?>>SJS RS</option>
                    </select>
                </div>

                <div>
                    <label for="cnh" class="label" >CNH</label>
                    <input type="text" id="cnh" name="cnh" style="width: 150px" value="<?=$cliente->CNH?>" tabindex="7" />
                </div>

                <div>
                    <label class="label"> Sexo</label>
                    <input type="radio" id="sexoM" name="sexo" value="M" checked="checked" tabindex="9" />
                    <label for="sexoM" >M</label>
                    <input type="radio" id="sexoF" name="sexo" value="F"<?=$cliente->SEXO == 'sexoF' ? 'checked="checked"' : null;?> />
                    <label for="sexoF" >F</label>
                </div>

                <div>
                    <label for="endereco" class="label">Endere&ccedil;o</label>
                    <input type="text" id="endereco" name="endereco" value="<?=$cliente->ENDERECO?>" tabindex="11"/>
                </div>

                <div>
                    <label for="complemento" class="label">Complemento</label>
                    <input type="text" id="complemento" name="complemento" value="<?=$cliente->COMPLEMENTO?>" tabindex="13" />
                </div>

                <div>
                    <label for="cep" class="label">CEP</label>
                    <input type="text" id="cep" name="cep" value="<?=$cliente->CEP?>" tabindex="15" />
                </div>

                <div>
                    <label for="fone" class="label">Fone</label>
                    <input type="text" id="fone" name="fone" value="<?=$cliente->FONE?>" tabindex="17"/>
                </div>

                <div>
                    <label for="obs" class="label">Observacao</label>
                    <textarea id="obs" name="obs" style="resize:none" rows="10" cols="30" tabindex="19" ><?=$cliente->OBS?></textarea>
                </div>

                <div>
                    <label for="cpf" class="label" >CPF</label>
                    <input type="text" id="cpf" name="cpf" value="<?=$cliente->CPF?>" tabindex="2" />
                </div>

                <div>
                    <label for="cnpj" class="label" >CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" value="<?=$cliente->CNPJ?>" tabindex="2" />
                </div>

                <div>
                    <label for="rg" class="label" >RG</label>
                    <input type="text" id="rg" name="rg" value="<?=$cliente->RG?>" tabindex="4" />
                </div>

                <div>
                    <label for="dataExpedicao" class="label" >Data Expedi&ccedil;&atilde;o</label>
                    <input type="text" id="dataExpedicao" name="dataExpedicao" style="width: 150px" value="<?=formatarDataBR($cliente->ORG_DATA_EXPEDICAO)?>" tabindex="6" />
                </div>

                <div>
                    <label for="data_cnh" class="label" >Data CNH</label>
                    <input type="text" id="data_cnh" name="data_cnh" style="width: 150px" value="<?=formatarDataBR($cliente->CNH_DATA_EXPEDICAO)?>" tabindex="8" />
                </div>

                <div>
                    <label for="estadoCivil" class="label">Estado Civil</label>
                    <select id="estadoCivil" name="estadoCivil" tabindex="10">
                        <option value="casado" <?=$cliente->ESTADO_CIVIL == 'casado' ? 'selected="selected"' : null;?>>Casado</option>
                        <option value="solteiro" <?=$cliente->ESTADO_CIVIL == 'solteiro' ? 'selected="selected"' : null;?>>Solteiro</option>
                        <option value="outro" <?=$cliente->ESTADO_CIVIL == 'outro' ? 'selected="selected"' : null;?>>Outro</option>
                    </select>
                </div>

                <div>
                    <label for="numero" class="label">Numero</label>
                    <input type="text" id="numero" name="numero" value="<?=$cliente->NUMERO?>" tabindex="12" />
                </div>

                <div>
                    <label for="bairro" class="label">Bairro</label>
                    <input type="text" id="bairro" name="bairro" value="<?=$cliente->BAIRRO?>" tabindex="14" />
                </div>

                <div>
                    <label for="email" class="label">Email</label>
                    <input type="text" id="email" name="email" value="<?=$cliente->EMAIL?>" tabindex="16" />
                </div>

                <div>
                    <label for="fone2" class="label">Fone 2</label>
                    <input type="text" id="fone2" name="fone2" value="<?=$cliente->FONE2?>" tabindex="18" />
                </div>

                <div class="campo-input">
                    <br /><br /><br /><br /><br /><br />
                    <input class="bt_voltar campo-input" type="button" onclick="javascript:window.location='clientes.php'" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
                    <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#clientes').submit()" title="Salvar" style="float:left;clear:none" />
                </div><!-- .botaoadd -->
            </form>
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
    
    <script type="text/javascript">
        /*esconder auto/re */
        $(function() {
            var
            tipo,
            $this,
            $auto   = $('.campo-documento-auto'),
            $re = $('.campo-documento-re');

            $re.hide();

            $('.bt-tipo-documento').click(function(e) {
                $this = $(this);

                tipo = $this.attr('id').split('-');


//                Parte que limpa campo cpf ou cnpj
//                if( tipo[2] == 'auto' ) {
//                    $('#cnpj').val('');
//                    $juridica.hide();
//                    $fisica.fadeIn(250);
//                } else {
//                    $('#cpf').val('');
//                    $juridica.fadeIn(250);
//                    $fisica.hide();
//                }
            });
            /*validando campos*/
//            $('#clientes').validate({
//                rules:{
//                    'nome': {required: true},
//                    'email': {email: true},
//                    'DATA_NASC' : {dataBR : true},
//                    'data_cnh' : {dataBR : true},
//                    'cpf' : {cpf : 'both'},
//                    'cnpj' : {cnpj : 'both'},
//                    'dataExpedicao' : {dataBR : true}
//                }
//            });
            /*setando mascaras*/
//            $("#fone").setMask("(99)9999-9999");
//            $("#fone2").setMask("(99)9999-9999");
//            $("#cpf").setMask("999.999.999-99");
//            $("#cnpj").setMask("99.999.999/9999-99");
//            $("#cep").setMask("99999-999");
//            $("#DATA_NASC").setMask("99/99/9999");
//            $("#data_cnh").setMask("99/99/9999");
//            $("#dataExpedicao").setMask("99/99/9999");
//            $("#rg").setMask("9999999999");
//            $("#cnh").setMask("99999999999")
//


            /* excluindo */

        });

        
    </script>
    
</body>
</html>