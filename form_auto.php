<!--Formulário de inserção / edição-->
<form id="formAuto" action="documentos.php" method="post">
    <input type="hidden" name="acao" value="inserirAuto" />
    <input type="hidden" name="idCliente" value="<?=$cliente->ID?>" />
    <input type="hidden" name="ID" value="<?=$auto->ID?>" />

    <div>
        <label for="VIGENCIA_INICIO" class="label" >Vigencia:</label>
        <input type="text" id="VIGENCIA_INICIO" name="VIGENCIA_INICIO" value="<?=$auto->VIGENCIA_INICIO?>" />
        <input type="text" id="VIGENCIA_FIM" name="VIGENCIA_FIM" value="<?=$auto->VIGENCIA_FIM?>" />
    </div>

    <div>
        <label for="CIA_ID" class="label" >Cia</label>
        <select id="CIA_ID" name="CIA_ID">
            <option value="1" select="selected">HDI</option>
        </select>
    </div>

    <div>
        <label for="MARCA_ID" class="label" >Marca</label>
        <select id="MARCA_ID" name="MARCA_ID">
            <option value="1" select="selected">Volkswagen</option>
        </select>
    </div>

    <div class="carro">
        <div>
            <label for="DESCRICAO" class="label" >Carro</label>
            <input type="text" id="DESCRICAO" name="DESCRICAO" style="width: 150px" value="<?=$auto->DESCRICAO?>"/>
        </div>

        <div>
            <label class="label" for="ANO">Ano/Modelo</label>
            <input type="text" id="ANO" name="ANO" value="<?=$auto->ANO?>" />
        </div>

        <div>
            <label class="label" for="placa">Placa</label>
            <input type="text" id="PLACA" name="PLACA" value="<?=$auto->PLACA?>" />
        </div>

        <div>
            <label for="RENAVAM" class="label">Renavam</label>
            <input type="text" id="RENAVAM" name="RENAVAM" value="<?= $auto->RENAVAM ?>" />
        </div>

        <div>
            <label class="label" for="chassi">Chassi</label>
            <input type="text" id="CHASSI" name="CHASSI" value="<?=$auto->CHASSI?>" />
        </div>

        <div>
            <label class="label" for="COMBUSTIVEL">Combustível</label>
            <select name="COMBUSTIVEL" id="COMBUSTIVEL">
                <option value="gasolina" selected="selected">Gasolina</option>    
                <option value="flex" <?=$auto->COMBUSTIVEL == 'flex' ? 'selected="selected"' : ''?>>Flex</option>    
                <option value="gnv" <?=$auto->COMBUSTIVEL == 'gnv' ? 'selected="selected"' : ''?>>GNV</option>                            
                <option value="diesel" <?=$auto->COMBUSTIVEL == 'diesel' ? 'selected="selected"' : ''?>>Diesel</option>
                <option value="alcool" <?=$auto->COMBUSTIVEL == 'alcool' ? 'selected="selected"' : ''?>>Alcool</option>    
            </select>
        </div>

        <div>
            <label class="label" for="ZERO">Zero km</label>
            <input type="checkbox" id="ZERO" name="ZERO" value="<?=$auto->ZERO?>" />
        </div>

    </div><!--carro-->  

    <div class="perfil">

        <div>
            <label for="GARAGEM_CASA" class="label">Garagem Residencia</label>
            <select name="GARAGEM_CASA" id="GARAGEM_CASA">
                <option value="">Selecione</option>
                <option value="1" <?=$auto->GARAGEM_CASA == '1' ? 'selected="selected"' : ''?>>Sim</option>
                <option value="2" <?=$auto->GARAGEM_CASA == '2' ? 'selected="selected"' : ''?>>Não</option>
            </select>
        </div>

        <div>
            <label for="GARAGEM_TRABALHO" class="label">Garagem Trabalho</label>
            <select name="GARAGEM_TRABALHO" id="GARAGEM_TRABALHO">
                <option value="">Selecione</option>
                <option value="1" <?=$auto->GARAGEM_TRABALHO == '1' ? 'selected="selected"' : ''?>>Sim</option>
                <option value="2" <?=$auto->GARAGEM_TRABALHO == '2' ? 'selected="selected"' : ''?>>Não</option>
                <option value="3" <?=$auto->GARAGEM_TRABALHO == '3' ? 'selected="selected"' : ''?>>Não Usa</option>
            </select>
        </div>

        <div>
            <label for="GARAGEM_FACULDADE" class="label">Garagem Estudo</label>
            <select name="GARAGEM_FACULDADE" id="GARAGEM_FACULDADE">
                <option value="">Selecione</option>
                <option value="1" <?=$auto->GARAGEM_FACULDADE == '1' ? 'selected="selected"' : ''?>>Sim</option>
                <option value="2" <?=$auto->GARAGEM_FACULDADE == '2' ? 'selected="selected"' : ''?>>Não</option>
                <option value="3" <?=$auto->GARAGEM_FACULDADE == '3' ? 'selected="selected"' : ''?>>Não Usa</option>
            </select>
        </div>

        <div>
            <label class="label" for="FILHOS">Filhos de 18 a 26</label>
            <input type="checkbox" id="FILHOS" name="FILHOS" value="<?=$auto->FILHOS?>" />
        </div>

    </div><!-- perfil -->

    <div class="garantias-auto">
        <div>
            <label for="FIPE" class="label" >Fipe</label>
            <input type="text" id="FIPE" name="FIPE" value="<?=$auto->FIPE?>" />
        </div>

        <div>
            <label for="FRANQUIA" class="label" >Franquia</label>
            <input type="text" id="FRANQUIA" name="FRANQUIA" value="<?=$auto->FRANQUIA?>" />
        </div>

        <div>
            <label for="DM" class="label" >Danos Materiais</label>
            <input type="text" id="DM" name="DM" value="<?=$auto->DM?>" />
        </div>

        <div>
            <label for="DC" class="label" >Danos Corporais</label>
            <input type="text" id="DC" name="dc" value="<?=$auto->DC?>" />
        </div>

        <div>
            <label for="APP" class="label" >App</label>
            <input type="text" id="APP" name="APP" value="<?=$auto->APP?>" />
        </div>

        <div>
            <label for="DANOS_MORAIS" class="label" >Danos Morais</label>
            <input type="text" id="DANOS_MORAIS" name="DANOS_MORAIS" value="<?=$auto->DANOS_MORAIS?>" />
        </div>

        <div>
            <label class="label" for="VIDROS">Vidros</label>
            <input type="checkbox" id="VIDROS" name="VIDROS" value="<?=$auto->VIDROS?>" />
        </div>

        <div>
            <label class="label" for="ASSISTENCIA">Assistencia</label>
            <input type="checkbox" id="ASSISTENCIA" name="ASSISTENCIA" value="<?=$auto->ASSISTENCIA?>" />
        </div>

        <div>
            <label class="label" for="CARRO_RESERVA">Carro Reserva</label>
            <input type="checkbox" id="CARRO_RESERVA" name="CARRO_RESERVA" value="<?=$auto->CARRO_RESERVA?>" />
        </div>              
        
    </div><!-- garantias-auto-->

    <div class="renovacao apolice">

        <div>
            <label for="BONUS" class="label">Bonus</label>
            <select name="BONUS" id="BONUS">
                <option value="0" <?=$auto->BONUS == '0' ? 'selected="selected"' : ''?>>0</option>                
                <option value="1" <?=$auto->BONUS == '1' ? 'selected="selected"' : ''?>>1</option>
                <option value="2" <?=$auto->BONUS == '2' ? 'selected="selected"' : ''?>>2</option>
                <option value="3" <?=$auto->BONUS == '3' ? 'selected="selected"' : ''?>>3</option>
                <option value="4" <?=$auto->BONUS == '4' ? 'selected="selected"' : ''?>>4</option>
                <option value="5" <?=$auto->BONUS == '5' ? 'selected="selected"' : ''?>>5</option>
                <option value="6" <?=$auto->BONUS == '6' ? 'selected="selected"' : ''?>>6</option>
                <option value="7" <?=$auto->BONUS == '7' ? 'selected="selected"' : ''?>>7</option>
                <option value="8" <?=$auto->BONUS == '8' ? 'selected="selected"' : ''?>>8</option> 
                <option value="9" <?=$auto->BONUS == '9' ? 'selected="selected"' : ''?>>9</option>
                <option value="10" <?=$auto->BONUS == '10' ? 'selected="selected"' : ''?>>10</option>
            </select>
        </div>

        <div>
            <label for="APOLICE" class="label">Apolice</label>
            <input type="text" id="APOLICE" name="APOLICE" value="<?=$auto->APOLICE?>" />
        </div>

        <div>
            <label for="CI" class="label">CI</label>
            <input type="text" id="CI" name="CI" value="<?=$auto->CI?>" />
        </div>              
    </div><!-- renovacao -->

    <div class="pagamento">
        <div>
            <label class="label" for="PREMIO">Premio</label>
            <input type="text" id="PREMIO" name="PREMIO" value="<?=$auto->PREMIO?>" />
        </div>
        <div>
            <label class="label" for="FORMA_PAGAMENTO">Forma de Pagamento</label>
            <select name="FORMA_PAGAMENTO" id="FORMA_PAGAMENTO">
                <option value="1" <?=$auto->FORMA_PAGAMENTO == '1' ? 'selected="selected"' : ''?>>Debito</option>
                <option value="2" <?=$auto->FORMA_PAGAMENTO == '2' ? 'selected="selected"' : ''?>>Cheque</option>
                <option value="3" <?=$auto->FORMA_PAGAMENTO == '3' ? 'selected="selected"' : ''?>>Boleto</option>
            </select>
        </div>
        <div>
            <label class="label" for="PARCELAMENTO">Parcelamento</label>
            <select name="PARCELAMENTO" id="PARCELAMENTO">
                <option value="1" <?=$auto->PARCELAMENTO == '1' ? 'selected="selected"' : ''?>>1</option>
                <option value="2" <?=$auto->PARCELAMENTO == '2' ? 'selected="selected"' : ''?>>2</option>
                <option value="3" <?=$auto->PARCELAMENTO == '3' ? 'selected="selected"' : ''?>>3</option>
                <option value="4" <?=$auto->PARCELAMENTO == '4' ? 'selected="selected"' : ''?>>4</option>
                <option value="5" <?=$auto->PARCELAMENTO == '5' ? 'selected="selected"' : ''?>>5</option>
                <option value="6" <?=$auto->PARCELAMENTO == '6' ? 'selected="selected"' : ''?>>6</option>
                <option value="7" <?=$auto->PARCELAMENTO == '7' ? 'selected="selected"' : ''?>>7</option>
                <option value="8" <?=$auto->PARCELAMENTO == '8' ? 'selected="selected"' : ''?>>8</option> 
                <option value="9" <?=$auto->PARCELAMENTO == '9' ? 'selected="selected"' : ''?>>9</option>
                <option value="10" <?=$auto->PARCELAMENTO == '10' ? 'selected="selected"' : ''?>>10</option>
                <option value="11" <?=$auto->PARCELAMENTO == '11' ? 'selected="selected"' : ''?>>11</option>
                <option value="12" <?=$auto->PARCELAMENTO == '12' ? 'selected="selected"' : ''?>>12</option>
                <option value="0+1" <?=$auto->PARCELAMENTO == '0+1' ? 'selected="selected"' : ''?>>0+1</option>
                <option value="0+2" <?=$auto->PARCELAMENTO == '0+2' ? 'selected="selected"' : ''?>>0+2</option>
                <option value="0+3" <?=$auto->PARCELAMENTO == '0+3' ? 'selected="selected"' : ''?>>0+3</option>
                <option value="0+4" <?=$auto->PARCELAMENTO == '0+4' ? 'selected="selected"' : ''?>>0+4</option>
                <option value="0+5" <?=$auto->PARCELAMENTO == '0+5' ? 'selected="selected"' : ''?>>0+5</option>
                <option value="0+6" <?=$auto->PARCELAMENTO == '0+6' ? 'selected="selected"' : ''?>>0+6</option>
                <option value="0+7" <?=$auto->PARCELAMENTO == '0+7' ? 'selected="selected"' : ''?>>0+7</option>
                <option value="0+8" <?=$auto->PARCELAMENTO == '0+8' ? 'selected="selected"' : ''?>>0+8</option> 
                <option value="0+9" <?=$auto->PARCELAMENTO == '0+9' ? 'selected="selected"' : ''?>>0+9</option>
                <option value="0+10" <?=$auto->PARCELAMENTO == '0+10' ? 'selected="selected"' : ''?>>0+10</option>
                <option value="0+11" <?=$auto->PARCELAMENTO == '0+11' ? 'selected="selected"' : ''?>>0+11</option>
                <option value="0+12" <?=$auto->PARCELAMENTO == '0+12' ? 'selected="selected"' : ''?>>0+12</option>                               
            </select>
        </div>
        <div>
            <label class="label" for="DATA_VENCIMENTO">Data Vencimento</label>
            <input type="text" name="DATA_VENCIMENTO" id="DATA_VENCIMENTO" value="<?=$auto->DATA_VENCIMENTO?>" />
        </div>
    </div><!-- pagamento -->

    <div class="campo-input">
        <br /><br /><br /><br /><br /><br />
        <input class="bt_voltar campo-input" type="button" onclick="javascript:window.location='documentos.php'" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
        <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#formAuto').submit()" title="Salvar" style="float:left;clear:none" />
    </div><!-- .botaoadd -->

</form>

<!--<script type="text/javascript">
    /*esconder auto/re */
//    $(function() {
//        var
//        tipo,
//        $this,
//        $auto   = $('.campo-documento-auto'),
//        $re = $('.campo-documento-re');
//
//        $re.hide();
//
//        $('.bt-tipo-documento').click(function(e) {
//            $this = $(this);
//
//            tipo = $this.attr('id').split('-');
//

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


</script>-->