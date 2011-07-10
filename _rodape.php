<div class="taskbar">
    <div class="taskbar-action-close">
    </div>
    <h2 style="text-align: center;">Tarefas</h2>
    <div class="task-tarefa">
        <?php
            $sql = mysql_query('SELECT * FROM tarefas WHERE SITUACAO <> 1 OR SITUACAO IS NULL ORDER BY DATA_VENCIMENTO');
            while($linhaTarefa = mysql_fetch_array($sql)): ?>
                <div>
                    <img alt="Status" onclick="javascript:window.location='tarefas.php?update=status&id=<?php echo $linhaTarefa['ID']; ?>'" style="cursor: pointer;" src="img/icons/checkbox_unchecked_icon&16.png" />
                    <?php echo $linhaTarefa['DESCRICAO'];
                          echo '  '.formatarDataEN($linhaTarefa['DATA_VENCIMENTO']);
                    ?>
                </div>
            <?php endwhile;
        ?>
    </div>
</div>
<div class="taskbar-action-open">
</div>
<div style="clear:both"></div>
<div class="rodape">
    <address class="">Adams Seg</address>
</div>
<script type="text/javascript" >
    $(document).ready(function() {

        //Pega o heigh da tela e ajusta o position
        /*    heighScreen = window.innerHeight;
        if (heighScreen >= 649) {
            $('.rodape').css({'position':'absolute', 'bottom':'0px'});
        } else {
            $('.rodape').css({'position':'static'});
        }*/
        
        /* selecionando um estado */
        $('#estado').change(function(e) {
            var ESTADO_ID = $(this).val();
            $.post('clientes.php', { acao : 'gerar-cidades', ESTADO_ID : ESTADO_ID }, function(data) {
                $('#box-cidades').html(data);
            });
        });

        <?php if (isset($msgErro) && $msgErro != '') : ?>
            window.setTimeout(function() {
                $('.erro').slideUp(250);
            }, 2000);        
        <?php endif; ?>


        $('.taskbar-action-close').click(function(){
            window.setTimeout(function() {
                $(".principal").animate({"width": "90%"}, 450);
            }, 50);
            $(".taskbar").animate({
                "width": "1%"
            }, 450);
            window.setTimeout(function() {
                $(".taskbar-action-close").hide();
                $('.taskbar-action-open').show();
            }, 350);
        });

        $('.taskbar-action-open').click(function(){
            //window.setTimeout(function() {
            $('.taskbar-action-open').hide();
            $(".principal").animate({"width": "73%"}, 350);
            //}, 50);
            $(".taskbar").animate({
                "width": "18%"
            }, 350);

            window.setTimeout(function() {
                $(".taskbar-action-close").show();
            }, 50);
        });


        /* hover do menu */
        $('.menu > a, .transparencia').hover(
        function() {
            $(this).stop().animate({
                'opacity' : '0.5'
            }, 250);
        }, function() {
            $(this).animate({
                'opacity' : '1'
            }, 50);
        }
    );
    });
</script>