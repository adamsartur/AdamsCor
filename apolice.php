<?php
/**
 * Form pra inserir apolices auto
 */
if($auto->acao == 'apoliceAuto'){?>
<form id="formAutoApolice" action="documentos.php" method="post">
    <div class="renovacao apolice auto">
        <input type="hidden" value="<?=$auto->ID?>" id="ID" name="ID" />
        <input type="hidden" value="insereApoliceAuto" id="acao" name="acao" />
        <div>
            <label for="APOLICE" class="label">Apolice</label>
            <input type="text" id="APOLICE" name="APOLICE" value="<?=$auto->APOLICE?>" />
        </div>

        <div>
            <label for="CI" class="label">CI</label>
            <input type="text" id="CI" name="CI" value="<?=$auto->CI?>" />
        </div>              
        <div class="campo-input">
            <input class="bt_voltar campo-input" type="button" onclick="javascript:history.back()" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
            <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#formAutoApolice').submit()" title="Salvar" style="float:left;clear:none" />
        </div><!-- .botaoadd -->
    </div><!-- renovacao auto apolice -->
</form>
<? } 

/**
 * Form pra inserir apolices re
 */

 if($re->acao == 'apoliceRe'){?>
    <form id="formReApolice" action="documentos.php" method="post">
        <input type="hidden" value="<?=$re->ID?>" id="ID" name="ID" />
        <input type="hidden" value="insereApoliceRe" id="acao" name="acao" />
        <div class="renovacao apolice re">
            <div>
                <label for="APOLICE" class="label">Apolice</label>
                <input type="text" id="APOLICE" name="APOLICE" value="<?=$re->APOLICE?>" />
            </div>
            <div class="clear"></div>
        </div><!-- renovacao -->
        <div class="campo-input">
            <input class="bt_voltar campo-input" type="button" onclick="javascript:history.back()" value="Voltar" style="float:left;margin-right:15px;clear:none"  />
            <input class="bt_salvar campo-input" type="button" value="Salvar" onclick="$('#formReApolice').submit()" title="Salvar" style="float:left;clear:none" />
        </div><!-- .botaoadd -->
</form>
<? } 
