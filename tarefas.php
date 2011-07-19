<?php require_once '_config.php';

    //excluir tarefa
    if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
        $sql = mysql_query('DELETE FROM tarefas WHERE ID = '.$_GET['idTarefa']);
        $msgErro = 'Tarefa deletada com sucesso';
    }

    //faz o update do status
    if (get("update")){
        $id = addslashes(get("id"));
        $situacao = mysql_fetch_array(mysql_query("SELECT SITUACAO FROM tarefas WHERE ID =". set($id)." LIMIT 1"));
        $situacao = $situacao['SITUACAO'] == 0 ? 1 : 0;
        mysql_query("UPDATE tarefas SET SITUACAO = ". $situacao .",
                                        DATA_FINALIZACAO = '".date("Y-m-d")."'
                                  WHERE ID = ". set($id));
        $msgErro = "Status atualizado com sucesso";
    }

    //inserir tarefa
    if (post('tarefa')) {
        $msgErro = null;
        $sql = "INSERT INTO tarefas (DESCRICAO, DATA_VENCIMENTO, DATA_CADASTRO) VALUES ('".addslashes(post('descricao'))."', '".formatarDataBR(addslashes(post('data')))."', '".date("Y-m-d")."')";
        $query = mysql_query($sql) or die(mysql_error());
        $msgErro = 'Tarefa inserida com sucesso!';
    }

    //verifica se o tarefa está selecionado ($_GET[ID]) e busca os dados no banco
    if (get('id')){
        $editar = mysql_fetch_array(mysql_query("SELECT * FROM tarefas WHERE ID = '".addslashes(get('id'))."'"));
    }

    //alteração do tarefa
    if (post('alteraTarefa')) {
            $sql = "UPDATE tarefas SET DESCRICAO = '".addslashes(post('descricao'))."',
                                       DATA_VENCIMENTO = '".formatarDataBR(addslashes(post('data')))."'
                                 WHERE ID =".post('tarefaID');
            $query = mysql_query($sql) or die(mysql_error());
            $msgErro = 'Tarefa alterada com sucesso!';
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include('_head.php') ?>
        <title><?php echo $tittle; ?></title>
    </head>
    <body class="body">
        <script type="text/javascript">
        function excluirTarefa(url) {
            if(confirm("Deseja realmente excluir este Usuário?"))
                window.location = url;
        }
        </script>
        <!--topo-->
        <?php include('_topo.php') ?>

        <!-- menu -->
        <?php include('_menu.php') ?>

        <div class="principal">
          <div class="linha">
              <?php if (!get('acao') && get('acao') != 'excluir'){ ?>
              <div class="botaoadd">
                <p style="padding: 10px; float:left;">Tarefas</p>
                <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='tarefas.php?acao=inserir'" title="Adicionar"/>
              </div>
              <?php } ?>
              <div class="erro">
                <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
              </div>
              <div style="clear:both"></div>

              <?php if (get('acao') && get('acao') != 'excluir') { ?>
              <form action="tarefas.php" method="post">
                <fieldset>
                    <legend>Informa&ccedil;&otilde;es</legend>

                        <div class="item-form">
                            <label class="label">Descrição</label>
                            <textarea cols="59" rows="5" class="buscar" name="descricao" id="descricao"><?php echo get('id') ? $editar['DESCRICAO'] : null; ?></textarea>
                            <div class="clear"></div>
                        </div><!-- .item-form -->

                        <div class="item-form">
                            <label class="label">Data</label>
                            <input id="datepicker" class="buscar" value="<?php echo get('id') ? formatarDataEN($editar['DATA_VENCIMENTO']) : null; ?>" name="data" type="text"/>
                            <div class="clear"></div>
                        </div><!-- .item-form -->
                        <?php
                            if (editar(get('id'))){
                                echo '<input type="hidden" name="alteraTarefa" value="alteraTarefa"/>';
                                echo '<input type="hidden" name="tarefaID" value="'.get('id').'"/>';
                            } else {
                                echo '<input type="hidden" name="tarefa" value="tarefa"/>';
                            }
                        ?>
                        <input class="bt_salvar" id="botaoEnviar" type="submit" value="Salvar"/>
                        <input class="bt_voltar" type="button" onclick="javascript:window.location='tarefas.php'" value="Voltar"/>
                </fieldset>
                </form>
                <?php } else { ?>
                <!--<form action="tarefas.php" method="POST" name="buscar">
                    <fieldset>
                    <legend>Filtros de Pesquisa</legend>
                    <div class="pesquisa">
                        <input class="buscar" type="text" name="buscar" value="<?php if (isset($_POST['buscar'])){ echo $_POST['buscar'];} ?>" />
                        <input class="bt_buscar" type="submit" value="Buscar" title="Buscar"/>
                    </div>
                    </fieldset>
                </form>-->
                <div class="listagem_interno">
                    <table class="tablesorter">
                    <thead>
                    <tr>
                        <!-- <th>&nbsp;</th> -->
                        <th>Cliente</th>
                        <th>Descri&ccedil;&atilde;o</th>
                        <th style="width: 95px;">Data Vencimento</th>
                        <th style="text-align: center;">Editar</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = mysql_query("SELECT * FROM tarefas ORDER BY SITUACAO");
                        while ($tarefa = mysql_fetch_array($sql)) :
                            if ($tarefa['SITUACAO'] == true){
                                $ativoStatus = 'img/icons/checkbox_checked_icon&16.png';
                            } else {
                                $ativoStatus = 'img/icons/checkbox_unchecked_icon&16.png';
                            }

                            $tarefaRE   = $tarefa['RE_ID'] ? $tarefa['RE_ID'] : 0;
                            $tarefaAUTO = $tarefa['AUTO_ID'] ? $tarefa['AUTO_ID'] : 0;

                            $sqlCliente = mysql_query("SELECT *
                                                         FROM clientes
                                                        WHERE ID IN ( SELECT CLIENTE_ID
                                                                        FROM re
                                                                        WHERE ID = $tarefaRE
                                                                        UNION
                                                                        SELECT CLIENTE_ID
                                                                        FROM auto
                                                                        WHERE ID = $tarefaAUTO)");

                            //Seleciona os dados do cliente de acordo com o cliente_id do RE ou AUTO
                            $sqlCliente = mysql_fetch_array($sqlCliente);

                                                                         
                    ?>
                    <tr id="<?php echo $sqlCliente['NOME']; ?>">
                        <td><?php echo $sqlCliente['NOME']; ?></td>
                        <td><?php echo $tarefa['DESCRICAO']; ?></td>
                        <td><?php echo formatarDataEN($tarefa['DATA_VENCIMENTO']); ?></td>
                        <td width="70px" align="center"><img alt="Editar" class="center-img" onclick="javascript:window.location='tarefas.php?acao=editar&id=<?php echo $tarefa['ID']; ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" /></td>
                        <td width="100px" align="center"><img alt="Status" class="center-img" onclick="javascript:window.location='tarefas.php?update=status&id=<?php echo $tarefa['ID']; ?>'" style="cursor: pointer;" src="<?php echo $ativoStatus; ?>" /></td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                    </table>
                </div>
              <?php } ?>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $( "#datepicker" ).datepicker({
                    altFormat: 'dd/mm/yy',
                    dateFormat: 'dd/mm/yy',
                    dayNamesMin: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom']
                });
            });
        </script>
        <?php include('_rodape.php') ?>
    </body>
</html>