<!--Formulário de inserção / edição-->
<form action="documentos.php" method="post">
    <input type="hidden" name="idCliente" value="<?=$cliente->ID?>" />
    
    <div>
        <label class="label">Ramo </label>
        <input type="radio" value="auto" id="tipo-documento-auto" name="tipoDocumento" checked="checked" class="bt-tipo-documento" />
        <label for="tipo-documento-auto">Auto</label>
        <input type="radio" value="re" id="tipo-documento-re" name="tipoDocumento" class="bt-tipo-documento" />
        <label for="tipo-cliente-re">RE</label>
    </div>

    <div>
        <label for="vigencia_inicio" class="label" >Vigencia:</label>
        <input type="text" id="vigencia_inicio" name="vigencia_inico" value="<?=$auto->VIGENCIA_INICIO?>" />
        <input type="text" id="vigencia_fim" name="vigencia_fim" value="<?=$auto->VIGENCIA_FIM?>" />
    </div>

    <div>
        <!-- fazer box com autocomplete das CIAS-->
    </div>

    <div>
        <!-- fazer o select de Marcas com os cadastrados  -->
    </div>

    <div class="carro">
        <div>
            <label for="cnh" class="label" >Carro</label>
            <input type="text" id="descricao" name="descricao" style="width: 150px" value="<?=$auto->DESCRICAO?>"/>
        </div>

        <div>
            <label for="ano">Ano/Modelo</label>
            <input type="text" id="ano" name="ano" value="<?=$auto->ANO?>" />
        </div>

        <div>
            <label for="placa">Placa</label>
            <input type="text" id="endereco" name="endereco" value="<?=$auto->PLACA?>" />
        </div>

        <div>
            <label for="cep" class="label">Renavam</label>
            <input type="text" id="cep" name="cep" value="<?= $auto->RENAVAM ?>" />
        </div>

        <div>
            <label for="chassi">Chassi</label>
            <input type="text" id="chassi" name="chassi" value="<?=$auto->CHASSI?>" />
        </div>

        <div>
            <label for="combustivel">Combustível</label>
            <select name="combustivel" id="combustivel">
                <option value="gasolina" selected="selected">Gasolina</option>    
                <option value="flex" <?=$auto->COMBUSTIVEL == 'flex' ? 'selected="selected"' : ''?>>Flex</option>    
                <option value="gnv" <?=$auto->COMBUSTIVEL == 'gnv' ? 'selected="selected"' : ''?>>GNV</option>                            
                <option value="diesel" <?=$auto->COMBUSTIVEL == 'diesel' ? 'selected="selected"' : ''?>>Diesel</option>
                <option value="alcool" <?=$auto->COMBUSTIVEL == 'alcool' ? 'selected="selected"' : ''?>>Alcool</option>    
            </select>
        </div>

        <div>
            <label for="zero">Zero km</label>
            <input type="checkbox" id="zero" name="zero" value="<?=$auto->ZERO?>" />
        </div>

    </div><!--carro-->  

    <div class="perfil">

        <div>
            <label for="garagem_casa" class="label">Garagem Residencia</label>
            <select name="garagem_casa" id="garagem_casa">
                <option value="">Selecione</option>
                <option value="1" <?=$auto->GARAGEM_CASA == '1' ? 'selected="selected"' : ''?>>Sim</option>
                <option value="2" <?=$auto->GARAGEM_CASA == '2' ? 'selected="selected"' : ''?>>Não</option>
            </select>
        </div>

        <div>
            <label for="garagem_trabalho" class="label">Garagem Trabalho</label>
            <select name="garagem_trabalho" id="garagem_trabalho">
                <option value="">Selecione</option>
                <option value="1" <?=$auto->GARAGEM_TRABALHO == '1' ? 'selected="selected"' : ''?>>Sim</option>
                <option value="2" <?=$auto->GARAGEM_TRABALHO == '2' ? 'selected="selected"' : ''?>>Não</option>
                <option value="3" <?=$auto->GARAGEM_TRABALHO == '3' ? 'selected="selected"' : ''?>>Não Usa</option>
            </select>
        </div>

        <div>
            <label for="garagem_faculdade" class="label">Garagem Estudo</label>
            <select name="garagem_faculdade" id="garagem_faculdade">
                <option value="">Selecione</option>
                <option value="1" <?=$auto->GARAGEM_FACULDADE == '1' ? 'selected="selected"' : ''?>>Sim</option>
                <option value="2" <?=$auto->GARAGEM_FACULDADE == '2' ? 'selected="selected"' : ''?>>Não</option>
                <option value="3" <?=$auto->GARAGEM_FACULDADE == '3' ? 'selected="selected"' : ''?>>Não Usa</option>
            </select>
        </div>

        <div>
            <label for="filhos">Filhos de 18 a 26</label>
            <input type="checkbox" id="filhos" name="filhos" value="<?=$auto->FILHOS?>" />
        </div>

    </div><!-- perfil -->

    <div class="garantias">
        <div>
            <label for="fipe" class="label" >Fipe</label>
            <input type="text" id="fipe" name="fipe" value="<?=$auto->FIPE?>" />
        </div>

        <div>
            <label for="franquia" class="label" >Franquia</label>
            <input type="text" id="franquia" name="franquia" value="<?=$auto->FRANQUIA?>" />
        </div>

        <div>
            <label for="dm" class="label" >Danos Materiais</label>
            <input type="text" id="dm" name="dm" value="<?=$auto->DM?>" />
        </div>

        <div>
            <label for="dc" class="label" >Danos Corporais</label>
            <input type="text" id="dc" name="dc" value="<?=$auto->DC?>" />
        </div>

        <div>
            <label for="app" class="label" >App</label>
            <input type="text" id="app" name="app" value="<?=$auto->APP?>" />
        </div>

        <div>
            <label for="danos_morais" class="label" >Danos Morais</label>
            <input type="text" id="danos_morais" name="danos_morais" value="<?=$auto->DANOS_MORAIS?>" />
        </div>

        <div>
            <label for="vidros">Vidros</label>
            <input type="checkbox" id="vidros" name="vidros" value="<?=$auto->VIDROS?>" />
        </div>

        <div>
            <label for="assistencia">Assistencia</label>
            <input type="checkbox" id="assistencia" name="assistencia" value="<?=$auto->ASSISTENCIA?>" />
        </div>

        <div>
            <label for="carro_reserva">Carro Reserva</label>
            <input type="checkbox" id="carro_reserva" name="carro_reserva" value="<?=$auto->CARRO_RESERVA?>" />
        </div>      

    </div><!-- garantias-->

    <div class="renovacao">

        <div>
            <label for="bonus" class="label">Bonus</label>
            <imput type="text" id="bonus" name="bonus" value="<?=$auto->BONUS?>" />
        </div>

        <div>
            <label for="apolice" class="label">Apolice</label>
            <imput type="text" id="apolice" name="apolice" value="<?=$auto->APOLICE?>" />
        </div>

        <div>
            <label for="ci" class="label">CI</label>
            <imput type="text" id="ci" name="ci" value="<?=$auto->CI?>" />
        </div>              
    </div><!-- renovacao -->

    <div class="pagamento">
        <div>
            <label for="premio">Premio</label>
            <input type="text" id="premio" name="premio" />
        </div>
        <div>
            <label for="forma_pagamento">Forma de Pagamento</label>
            <select name="forma_pagamento" id="FORMA_PAGAMENTO">
                <option value="1" <?=$auto->FORMA_PAGAMENTO == '1' ? 'selected="selected"' : ''?>>Debito</option>
                <option value="2" <?=$auto->FORMA_PAGAMENTO == '2' ? 'selected="selected"' : ''?>>Cheque</option>
                <option value="3" <?=$auto->FORMA_PAGAMENTO == '3' ? 'selected="selected"' : ''?>>Boleto</option>
            </select>
        </div>
        <div>
            <label>Parcelamento</label>
            <select name="parcelamento" id="parcelamento">
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
            <label for="data_vencimento">Data Vencimento</label>
            <input type="text" id="data_vencimento" id="data_vencimento" value="<?=$auto->DATA_VENCIMENTO?>" />
        </div>
    </div><!-- pagamento -->

    <div class="campo-input">
        <br /><br /><br /><br /><br /><br />
        <input class="bt_voltar campo-input" type="button" onclick="javascript:window.location='clientes.php'" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
        <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#clientes').submit()" title="Salvar" style="float:left;clear:none" />
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