<!--Formulário de inserção / edição-->
<form id="formRe" action="documentos.php" method="post">
    <input type="hidden" name="acao" value="inserirRe" />
    <input type="hidden" name="idCliente" value="<?=$cliente->ID?>" />
    <input type="hidden" name="ID" value="<?=$re->ID?>" />
   
    <div>
        <label for="vigencia_inicio" class="label" >Vigencia:</label>
        <input type="text" id="VIGENCIA_INICIO" name="VIGENCIA_INICIO" value="<?=$re->VIGENCIA_INICIO?>" />
        <input type="text" id="VIGENCIA_FIM" name="VIGENCIA_FIM" value="<?=$re->VIGENCIA_FIM?>" />
    </div>

    <div>
        <!-- fazer box com autocomplete das CIAS-->
    </div>

    <div>
        <!-- fazer o select de Marcas com os cadastrados  -->
    </div>


    
        <div class="garantias-re">
        <div>
            <label class="label" for="INCENDIO" class="label" >Incendio</label>
            <input type="text" id="INCENDIO" name="INCENDIO" value="<?=$re->INCENDIO?>" />
        </div>

        <div>
            <label for="VENDAVAL" class="label" >Vendaval</label>
            <input type="text" id="VENDAVAL" name="VENDAVAL" value="<?=$re->VENDAVAL?>" />
        </div>

        <div>
            <label for="DANO_ELETRICO" class="label" >Danos Eletricos</label>
            <input type="text" id="DANO_ELETRICO" name="DANO_ELETRICO" value="<?=$re->DANO_ELETRICO?>" />
        </div>

        <div>
            <label for="ROUBO" class="label" >Roubo</label>
            <input type="text" id="ROUBO" name="ROUBO" value="<?=$re->ROUBO?>" />
        </div>

        <div>
            <label for="RCF" class="label" >RC FAMILIAR</label>
            <input type="text" id="RCF" name="RCF" value="<?=$re->RCF?>" />
        </div>

        <div>
            <label for="VIDROS" class="label" >Quebra de Vidros</label>
            <input type="text" id="VIDROS" name="VIDROS" value="<?=$re->VIDROS?>" />
        </div>

        <div>
            <label class="label" for="PERDA_ALUGUEL">Perda Pagamento de Aluguel</label>
            <input type="text" id="PERDA_ALUGUEL" name="PERDA_ALUGUEL" value="<?=$re->PERDA_ALUGUEL?>" />
        </div>

        <div>
            <label class="label" for="PERIODO_INDENITARIO">PI</label>
            <input type="text" id="PERIODO_INDENITARIO" name="PERIODO_INDENITARIO" value="<?=$re->PERIODO_INDENITARIO?>" />
        </div>

        <div>
            <label class="label" for="EQUIPAMENTOS_ELETRONICOS">Equipamentos Eletronicos</label>
            <input type="text" id="EQUIPAMENTOS_ELETRONICOS" name="EQUIPAMENTOS_ELETRONICOS" value="<?=$re->EQUIPAMENTOS_ELETRONICOS?>" />
        </div>      

    </div><!-- garantias-re-->    
    
        <div class="endereco-re">
        <div>
            <label for="CEP" class="label" >Cep</label>
            <input type="text" id="CEP" name="CEP" value="<?=$re->CEP?>" />
        </div>

        <div>
            <!-- estado -->
        </div>

        <div>
            <!-- cidade -->
        </div>
             
        <div>
            <label for="ENDERECO" class="label" >Rua</label>
            <input type="text" id="ENDERECO" name="ENDERECO" value="<?=$re->ENDERECO?>" />
        </div>

        <div>
            <label for="NUMERO" class="label" >Nº</label>
            <input type="text" id="NUMERO" name="NUMERO" value="<?=$re->NUMERO?>" />
        </div>

        <div>
            <label for="COMPLEMENTO" class="label" >Complemento</label>
            <input type="text" id="COMPLEMENTO" name="COMPLEMENTO" value="<?=$re->COMPLEMENTO?>" />
        </div>            
     </div><!-- endereco-re-->

     <div class="risco-re">
         
         <div>
            <label for="OCUPACAO" class="label" >Ocupacao</label>
            <input type="text" id="OCUPACAO" name="OCUPACAO" value="<?=$re->OCUPACAO?>" />
        </div> 
         
        <div>
            <label for="CONSTRUCAO" class="label" >Construcao</label>
            <select id="CONSTRUCAO" value="CONSTRUCAO">
                <option value="superior" <?=$re->CONSTRUCAO == 'superior' ? 'selected="selected"' : ''?>>Superior</option>
                <option value="solida" <?=$re->CONSTRUCAO == 'solida' ? 'selected="selected"' : ''?>>Solida</option>
                <option value="inferior" <?=$re->CONSTRUCAO == 'inferior' ? 'selected="selected"' : ''?>>Inferior</option>
            </select>
        </div> 
         
     </div>     
     
    <div class="renovacao apolice">
        <div>
            <label for="APOLICE" class="label">Apolice</label>
            <input type="text" id="APOLICE" name="APOLICE" value="<?=$re->APOLICE?>" />
        </div>
        <div class="clear"></div>
    </div><!-- renovacao -->

    <div class="pagamento">
        <div>
            <label class="label" for="PREMIO">Premio</label>
            <input type="text" id="PREMIO" name="PREMIO" value="<?=$re->PREMIO?>" />
        </div>
        <div>
            <label class="label" for="FORMA_PAGAMENTO">Forma de Pagamento</label>
            <select name="FORMA_PAGAMENTO" id="FORMA_PAGAMENTO">
                <option value="1" <?=$re->FORMA_PAGAMENTO == '1' ? 'selected="selected"' : ''?>>Debito</option>
                <option value="2" <?=$re->FORMA_PAGAMENTO == '2' ? 'selected="selected"' : ''?>>Cheque</option>
                <option value="3" <?=$re->FORMA_PAGAMENTO == '3' ? 'selected="selected"' : ''?>>Boleto</option>
            </select>
        </div>
        <div>
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
        </div>
        <div>
            <label class="label" for="DATA_VENCIMENTO">Data Vencimento</label>
            <input type="text" id="DATA_VENCIMENTO" id="DATA_VENCIMENTO" value="<?=$re->DATA_VENCIMENTO?>" />
        </div>
    </div><!-- pagamento -->

    <div class="campo-input">
        <br /><br /><br /><br /><br /><br />
        <input class="bt_voltar campo-input" type="button" onclick="javascript:window.location='documentos.php'" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
        <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#formRe').submit()" title="Salvar" style="float:left;clear:none" />
    </div><!-- .botaoadd -->

</form>
