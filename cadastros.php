<?php require_once '_config.php';

    //excluir tarefa
    if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
        $sql = mysql_query('DELETE FROM '.get('tipo').' WHERE ID = '.get('id'));
        $msgErro = get('tipo') == 'marcas' ? 'Marca deletada com sucesso!' : 'Cia deletada com sucesso';
    }

    //inserir tarefa
    if (post('tabela')) {
        $sql = "INSERT INTO ".post('tabela'). " (DESCRICAO) VALUES ('".addslashes(post('descricao'))."')";
        $query = mysql_query($sql) or die(mysql_error());
        $msgErro = post('tabela') == 'marcas' ? 'Marca inserida com sucesso!' : 'Cia inserida com sucesso!';
    }

    //verifica se o tarefa está selecionado ($_GET[ID]) e busca os dados no banco
    if (get('id')){
        $editar = mysql_fetch_array(mysql_query("SELECT * FROM ".get('tipo')." WHERE ID = '".addslashes(get('id'))."'"));
    }

    //alteração do tarefa
    if (post('alterar')) {
            $sql = "UPDATE ".post('alterar')." SET DESCRICAO = '".addslashes(post('descricao'))."'
                                            WHERE ID = ".post('id');
            $query = mysql_query($sql) or die(mysql_error());
            $msgErro = post('alterar') == 'marcas' ? 'Marca alterada com sucesso!' : 'Cia alterada com sucesso!';
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
        function excluirCadastro(url, coisa) {
            if(confirm("Deseja realmente excluir esta "+coisa+"?")){
                window.location = url;
            }
        }
        </script>
        <!--topo-->
        <?php include('_topo.php') ?>

        <!-- menu -->
        <?php include('_menu.php') ?>

        <div class="principal">
            <div class="linha">
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-marcas">Marcas</a></li>
                        <li><a href="#tabs-cia">Cia</a></li>
                    </ul>
                    <div id="tabs-marcas">
                      <?php if (!get('acao') || get('acao') == 'excluir'){ ?>
                      <div class="botaoadd">
                          <p style="padding: 10px; float:left;"> Marcas </p>
                        <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='cadastros.php?acao=inserir&tipo=marcas'" title="Adicionar"/>
                      </div>
                      <?php } ?>
                      <div class="erro">
                        <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
                      </div>

                      <?php if (get('acao') && get('acao') != 'excluir') { ?>
                      <form action="cadastros.php" method="post">
                        <fieldset style="clear:both">
                            <legend>Informa&ccedil;&otilde;es</legend>
                                <div class="item-form">
                                    <label class="label">Descrição</label>
                                    <input class="buscar" id="descricao" style="width: 260px !important;" type="text" name="descricao" value="<?php echo get('id') ? $editar['DESCRICAO'] : null; ?>" />
                                    <div class="clear"></div>
                                </div><!-- .item-form -->
                                <?php
                                    if (editar(get('id'))){
                                        echo '<input type="hidden" name="alterar" value="marcas"/>';
                                        echo '<input type="hidden" name="id" value="'.get('id').'"/>';
                                    } else {
                                        echo '<input type="hidden" name="tabela" value="marcas"/>';
                                    }
                                ?>
                                <input class="bt_salvar" id="botaoEnviar" type="submit" value="Salvar"/>
                                <input class="bt_voltar" type="button" onclick="javascript:window.location='cadastros.php'" value="Voltar"/>
                        </fieldset>
                        </form>
                        <?php } else { ?>
                        <div class="listagem_interno">
                            <table class="tablesorter">
                            <thead>
                            <tr>
                                <!-- <th>&nbsp;</th> -->
                                <th>Descri&ccedil;&atilde;o</th>
                                <th style="text-align: center;">Editar</th>
                                <th style="text-align: center;" >Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = mysql_query("SELECT * FROM marcas");
                                while ($tarefa = mysql_fetch_array($sql)) : ?>
                                    <tr>
                                        <td><?php echo $tarefa['DESCRICAO']; ?></td>
                                        <td width="70px" align="center"><img alt="Editar" class="center-img" onclick="javascript:window.location='cadastros.php?tipo=marcas&acao=editar&id=<?php echo $tarefa['ID']; ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" /></td>
                                        <td width="70px" align="center"><img alt="Excluir" class="center-img" onclick="excluirCadastro('cadastros.php?tipo=marcas&acao=excluir&id=<?php echo $tarefa['ID']; ?>', 'Marca')" style="cursor: pointer;" src="img/icons/trash_icon&16.png" /></td>
                                    </tr>
                            <?php endwhile; ?>
                            </tbody>
                            </table>
                        </div>
                        <div style="clear:both"></div>
                      <?php } ?>
                    </div>
                    <div id="tabs-cia">
                      <?php if (!get('acao') || get('acao') == 'excluir'){ ?>
                      <div class="botaoadd">
                          <p style="padding: 10px; float:left;">Cias</p>
                        <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='cadastros.php?acao=inserir&tipo=cia'" title="Adicionar"/>
                      </div>
                      <?php } ?>
                      <div class="erro">
                        <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
                      </div>
                      

                      <?php if (get('acao') && get('acao') != 'excluir') { ?>
                      <form action="cadastros.php?tipo=cia" method="post">
                        <fieldset style="clear:both">
                            <legend>Informa&ccedil;&otilde;es</legend>
                                <div class="item-form">
                                    <label class="label">Descrição</label>
                                    <input class="buscar" id="descricao" style="width: 260px !important;" type="text" name="descricao" value="<?php echo get('id') ? $editar['DESCRICAO'] : null; ?>" />
                                    <div class="clear"></div>
                                </div><!-- .item-form -->
                                <?php
                                    if (editar(get('id'))){
                                        echo '<input type="hidden" name="alterar" value="cia"/>';
                                        echo '<input type="hidden" name="id" value="'.get('id').'"/>';
                                    } else {
                                        echo '<input type="hidden" name="tabela" value="cia"/>';
                                    }
                                ?>
                                <input class="bt_salvar" id="botaoEnviar" type="submit" value="Salvar"/>
                                <input class="bt_voltar" type="button" onclick="javascript:window.location='cadastros.php'" value="Voltar"/>
                        </fieldset>
                        </form>
                        <?php } else { ?>
                        <div class="listagem_interno">
                            <table class="tablesorter">
                            <thead>
                            <tr>
                                <!-- <th>&nbsp;</th> -->
                                <th>Descri&ccedil;&atilde;o</th>
                                <th style="text-align: center;">Editar</th>
                                <th style="text-align: center;" >Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = mysql_query("SELECT * FROM cia");
                                while ($tarefa = mysql_fetch_array($sql)) : ?>
                                    <tr>
                                        <td><?php echo $tarefa['DESCRICAO']; ?></td>
                                        <td width="70px" align="center"><img alt="Editar" class="center-img" onclick="javascript:window.location='cadastros.php?tipo=cia&acao=editar&id=<?php echo $tarefa['ID']; ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" /></td>
                                        <td width="70px" align="center"><img alt="Excluir" class="center-img" onclick="excluirCadastro('cadastros.php?tipo=cia&acao=excluir&id=<?php echo $tarefa['ID']; ?>', 'Cia')" style="cursor: pointer;" src="img/icons/trash_icon&16.png" /></td>
                                    </tr>
                            <?php endwhile; ?>
                            </tbody>
                            </table>
                        </div>
                        <div style="clear:both"></div>
                      <?php } ?>
                    </div>
                </div><!-- div -->
          </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $( "#tabs" ).tabs(<?=get('tipo') == 'cia' ? '{ selected : 1 }' : ''?>);
            });
        </script>
        <?php include('_rodape.php') ?>
    </body>
</html>