<!--Formulário de inserção / edição-->
<form id="formRe" action="documentos.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="acao" value="<?=$re->acao?>" />
    <input type="hidden" name="idCliente" value="<?=$cliente->ID?>" />
    <input type="hidden" name="ID" value="<?=$re->ID?>" />
    <?php if(!$calculo){ ?>
        <?// setando tipo de cadastro para proposta caso não seja apolice
            if($re->TIPO_CADASTRO != 'A'){?>
            <input type="hidden" name="TIPO_CADASTRO" value="P" />
        <?};
        };
    if($calculo){            
        echo '<input type="hidden" name="TIPO_CADASTRO" value="C" />';};
    //passando valores para endossar 
    if( $re->endossar ) : ?>
    <input type="hidden" name="endosso" value="S" />
    <input type="hidden" name="IDOLD" value="<?=$re->ID?>" />
    <?php endif; 
    if(!$calculo){ ?>
        <div class="item-input">
            <label for="vigencia_inicio" class="label" >Vigencia:</label>
            <input type="text" size="8" id="VIGENCIA_INICIO" name="VIGENCIA_INICIO" value="<?=!$re->endossar ? formatarDataEN($re->VIGENCIA_INICIO) : date('d/m/Y')?>" />
            <input type="text" size="8" id="VIGENCIA_FIM" name="VIGENCIA_FIM" value="<?=  formatarDataEN($re->VIGENCIA_FIM)?>" />
        </div>

        <div class="item-input">
            <label for="CIA_ID" class="label" >Cia</label>
            <?php echo Cia::listar( $re->CIA_ID ); ?>
        </div>
    <?};?>
        <div class="endereco-re item-input">
            <div>
                <label for="CEP" size="8" class="label" >Cep</label>
                <input type="text" id="CEP" name="CEP" value="<?=$re->CEP?>" />
            </div>
    <?php if(!$calculo){ ?>
            <div>
                <!-- estado -->
            </div>

            <div>
                <!-- cidade -->
            </div>

            <div class="item-input">
                <label for="ENDERECO" class="label" >Rua</label>
                <input type="text" id="ENDERECO" name="ENDERECO" value="<?=$re->ENDERECO?>" />
                
                <div class="clear"></div>
            </div>

            <div class="item-input">
                <label for="NUMERO" class="label" >Nº</label>
                <input type="text" id="NUMERO" name="NUMERO" value="<?=$re->NUMERO?>" />
                
                <div class="clear"></div>
            </div>

            <div class="item-input">
                <label for="COMPLEMENTO" class="label" >Complemento</label>
                <input type="text" id="COMPLEMENTO" name="COMPLEMENTO" value="<?=$re->COMPLEMENTO?>" />
                
                <div class="clear"></div>
            </div>
    <?};?>
        </div><!-- endereco-re-->

     
     <div class="risco-re">         
         <div class="item-input">
            <label for="OCUPACAO" class="label" >Ocupacao</label>
            <input type="text" id="OCUPACAO" name="OCUPACAO" value="<?=$re->OCUPACAO?>" />
            
            <div class="clear"></div>
        </div> 
         
        <div class="item-input">
            <label for="CONSTRUCAO" class="label" >Construcao</label>
            <select id="CONSTRUCAO" value="CONSTRUCAO">
                <option value="superior" <?=$re->CONSTRUCAO == 'superior' ? 'selected="selected"' : ''?>>Superior</option>
                <option value="solida" <?=$re->CONSTRUCAO == 'solida' ? 'selected="selected"' : ''?>>Solida</option>
                <option value="inferior" <?=$re->CONSTRUCAO == 'inferior' ? 'selected="selected"' : ''?>>Inferior</option>
            </select>
            
            <div class="clear"></div>
        </div> 
     </div><!-- .risco-re --> 

    
    <div class="garantias-re">
        <div class="item-input">
            <label class="label" for="INCENDIO" class="label" >Incendio</label>
            <input type="text" id="INCENDIO" name="INCENDIO" value="<?=$re->INCENDIO?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label for="VENDAVAL" class="label" >Vendaval</label>
            <input type="text" id="VENDAVAL" name="VENDAVAL" value="<?=$re->VENDAVAL?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label for="DANO_ELETRICO" class="label" >Danos Eletricos</label>
            <input type="text" id="DANO_ELETRICO" name="DANO_ELETRICO" value="<?=$re->DANO_ELETRICO?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label for="ROUBO" class="label" >Roubo</label>
            <input type="text" id="ROUBO" name="ROUBO" value="<?=$re->ROUBO?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label for="RCF" class="label" >RC Familiar</label>
            <input type="text" id="RCF" name="RCF" value="<?=$re->RCF?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label for="VIDROS" class="label" >Quebra de Vidros</label>
            <input type="text" id="VIDROS" name="VIDROS" value="<?=$re->VIDROS?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label class="label" for="PERDA_ALUGUEL">Perda Pagamento de Aluguel</label>
            <input type="text" id="PERDA_ALUGUEL" name="PERDA_ALUGUEL" value="<?=$re->PERDA_ALUGUEL?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label class="label" for="PERIODO_INDENITARIO">PI</label>
            <input type="text" id="PERIODO_INDENITARIO" name="PERIODO_INDENITARIO" value="<?=$re->PERIODO_INDENITARIO?>" />
            
            <div class="clear"></div>
        </div>

        <div class="item-input">
            <label class="label" for="EQUIPAMENTOS_ELETRONICOS">Equipamentos Eletronicos</label>
            <input type="text" id="EQUIPAMENTOS_ELETRONICOS" name="EQUIPAMENTOS_ELETRONICOS" value="<?=$re->EQUIPAMENTOS_ELETRONICOS?>" />
            
            <div class="clear"></div>
        </div>
    </div><!-- garantias-re-->    

    <?php if(!$calculo){ ?>
        <div class="pagamento">
            <div class="item-input">
                <label class="label" for="PREMIO">Premio</label>
                <input type="text" id="PREMIO" name="PREMIO" value="<?=$re->PREMIO?>" />
                
                <div class="clear"></div>
            </div>
            
            <div class="item-input">
                <label class="label" for="FORMA_PAGAMENTO">Forma de Pagamento</label>
                <select name="FORMA_PAGAMENTO" id="FORMA_PAGAMENTO">
                    <option value="1" <?=$re->FORMA_PAGAMENTO == '1' ? 'selected="selected"' : ''?>>Debito</option>
                    <option value="2" <?=$re->FORMA_PAGAMENTO == '2' ? 'selected="selected"' : ''?>>Cheque</option>
                    <option value="3" <?=$re->FORMA_PAGAMENTO == '3' ? 'selected="selected"' : ''?>>Boleto</option>
                </select>
                
                <div class="clear"></div>
            </div>
            
            <div class="item-input">
                <label class="label" for="PARCELAMENTO">Parcelamento</label>
                <select name="PARCELAMENTO" id="PARCELAMENTO">
                    <option value="1" <?=$re->PARCELAMENTO == '1' ? 'selected="selected"' : ''?>>1</option>
                    <option value="2" <?=$re->PARCELAMENTO == '2' ? 'selected="selected"' : ''?>>2</option>
                    <option value="3" <?=$re->PARCELAMENTO == '3' ? 'selected="selected"' : ''?>>3</option>
                    <option value="4" <?=$re->PARCELAMENTO == '4' ? 'selected="selected"' : ''?>>4</option>
                    <option value="5" <?=$re->PARCELAMENTO == '5' ? 'selected="selected"' : ''?>>5</option>
                    <option value="6" <?=$re->PARCELAMENTO == '6' ? 'selected="selected"' : ''?>>6</option>
                    <option value="7" <?=$re->PARCELAMENTO == '7' ? 'selected="selected"' : ''?>>7</option>
                    <option value="8" <?=$re->PARCELAMENTO == '8' ? 'selected="selected"' : ''?>>8</option> 
                    <option value="9" <?=$re->PARCELAMENTO == '9' ? 'selected="selected"' : ''?>>9</option>
                    <option value="10" <?=$re->PARCELAMENTO == '10' ? 'selected="selected"' : ''?>>10</option>
                    <option value="11" <?=$re->PARCELAMENTO == '11' ? 'selected="selected"' : ''?>>11</option>
                    <option value="12" <?=$re->PARCELAMENTO == '12' ? 'selected="selected"' : ''?>>12</option>
                    <option value="0+1" <?=$re->PARCELAMENTO == '0+1' ? 'selected="selected"' : ''?>>0+1</option>
                    <option value="0+2" <?=$re->PARCELAMENTO == '0+2' ? 'selected="selected"' : ''?>>0+2</option>
                    <option value="0+3" <?=$re->PARCELAMENTO == '0+3' ? 'selected="selected"' : ''?>>0+3</option>
                    <option value="0+4" <?=$re->PARCELAMENTO == '0+4' ? 'selected="selected"' : ''?>>0+4</option>
                    <option value="0+5" <?=$re->PARCELAMENTO == '0+5' ? 'selected="selected"' : ''?>>0+5</option>
                    <option value="0+6" <?=$re->PARCELAMENTO == '0+6' ? 'selected="selected"' : ''?>>0+6</option>
                    <option value="0+7" <?=$re->PARCELAMENTO == '0+7' ? 'selected="selected"' : ''?>>0+7</option>
                    <option value="0+8" <?=$re->PARCELAMENTO == '0+8' ? 'selected="selected"' : ''?>>0+8</option> 
                    <option value="0+9" <?=$re->PARCELAMENTO == '0+9' ? 'selected="selected"' : ''?>>0+9</option>
                    <option value="0+10" <?=$re->PARCELAMENTO == '0+10' ? 'selected="selected"' : ''?>>0+10</option>
                    <option value="0+11" <?=$re->PARCELAMENTO == '0+11' ? 'selected="selected"' : ''?>>0+11</option>
                    <option value="0+12" <?=$re->PARCELAMENTO == '0+12' ? 'selected="selected"' : ''?>>0+12</option>                               
                </select>
                
                <div class="clear"></div>
            </div>

            <div style="clear:both"></div>

            <div class="anexo">
                <label class="label" for="ANEXO">Anexo</label>
                <input type="file" name="ANEXO" id="ANEXO" />

                <div class="clear"></div>

                <?php
                if( $re->ANEXO != '' ) {
                    $re->pegarPasta();

                    echo '<p>Arquivo atual: <a target="_blank" href="'.$re->pasta . $re->ANEXO.'">'.$re->ANEXO.'</a></p>';
                }
                ?>
            </div><!-- .anexo -->

        </div><!-- pagamento -->

        <?if($re->TIPO_CADASTRO == 'A' && $acao != 'renovar'){ ?>
            <div class="renovacao apolice re">
                <div>
                    <label for="APOLICE" class="label">Apolice</label>
                    <input type="text" id="APOLICE" name="APOLICE" value="<?=$re->APOLICE?>" />
                    
                    <div class="clear"></div>
                </div>
                <input type="hidden" name="TIPO_CADASTRO" value="A" />
            </div>
        <?};?>
    <?};?>
        
    <div class="clear"></div>
    
    <div class="campo-input">
        <br /><br /><br /><br /><br /><br />
        <input class="bt_voltar campo-input" type="button" onclick="javascript:window.location='documentos.php'" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
        <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#formRe').submit()" title="Salvar" style="float:left;clear:none" />
    </div><!-- .botaoadd -->

</form>

<script type="text/javascript">
    
$(function() {
    $('#formRe').validate({
        rules:{
            'ENDERECO': {required: true},
            'DATA_VENCIMENTO' : {dataBR : true},
            'VIGENCIA_INICIO' : {dataBR : true},
            'VIGENCIA_FIM' : {dataBR : true}
        }
    });
});
</script>
