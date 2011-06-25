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
        mysql_query("UPDATE tarefas SET SITUACAO = ". $situacao ." WHERE ID = ". set($id));
        $msgErro = "Status atualizado com sucesso";
    }

    //inserir usuario
    $ativo = 0; $admin = 0; 
    if (get("acao") && post('usuario') && (get("acao") == "inserir")) {
        $msgErro = null;
        if (post('Ativo') && post('Ativo')){
            $ativo = 1;
        }
        if (post('Admin') && post('Admin')){
            $admin = 1;
        }

        //verifica se ja existe este usuario cadastrado no sistema.
        $sqlusuario = mysql_query("SELECT USUARIO FROM users WHERE USUARIO = '".addslashes(post('usuario'))."'");
        if (mysql_num_rows($sqlusuario) > 0){
            $msgErro = "*O usuario ".post('usuario')." já está cadastrado no sistema";
        } else {
            $sql = "INSERT INTO users (USUARIO, SENHA, ADMIN, ATIVO) VALUES ('".addslashes(strtolower(post('usuario')))."', ".addslashes(post('senha')).", $admin, $ativo)";
            $query = mysql_query($sql) or die(mysql_error());
            $msgErro = 'Usuario inserido com sucesso!';
            echo "<script>
                alert('Usuario inserido com sucesso!')
                window.location='usuarios.php';
             </script>";
        }
    }

    //verifica se o usuario está selecionado ($_GET[ID]) e busca os dados no banco
    if (get('id')){
        $editar = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE ID = '".addslashes(get('id'))."'"));
    }

    //alteração do usuário
    if (post('alteraUsuario')) {
        if (post('Ativo')){
            $ativo = 1;
        }
        if (post('Admin')){
            $admin = 1;
        }
        //verifica se esta tentando alterar a senha
        if (post('senhaAtual')){
            $sqlSenha = mysql_fetch_array(mysql_query('SELECT SENHA FROM USERS WHERE ID ='.post('usuarioID')));
            //verifica se a senha digitada é igual a do banco
            if (post('senhaAtual') != $sqlSenha['SENHA'] ){
                $msgErro = "A senha atual digitada não confere";
            } else {
                $sql = "UPDATE users SET SENHA = ".addslashes(post('senha')).",
                                         ADMIN = $admin,
                                         ATIVO = $ativo WHERE ID =".post('usuarioID');
                $query = mysql_query($sql) or die(mysql_error());
                $msgErro = 'Usuario alterado com sucesso!';
                echo "<script>
                    alert('Usuario alterado com sucesso!')
                    window.location='usuarios.php';
                 </script>";
            }
        } else {
            $sql = "UPDATE users SET ADMIN = $admin,
                                     ATIVO = $ativo WHERE ID =".post('usuarioID');
            $query = mysql_query($sql) or die(mysql_error());
            $msgErro = 'Usuario alterado com sucesso!';
            echo "<script>
                alert('Usuario alterado com sucesso!')
                window.location='usuarios.php';
             </script>";
        }
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
              <form action="tarefas.php?acao=<?php echo get('acao'); if (editar()){ echo '&id='.get('id');} ?>" method="post">
                <fieldset>
                    <legend>Informa&ccedil;&otilde;es</legend>

                        <div class="item-form">
                            <label class="label">Descrição</label>
                            <textarea cols="5" rows="5" style=""  class="buscar" id="descricao"><?php ?></textarea>
                            <div class="clear"></div>
                        </div><!-- .item-form -->

                        <div class="item-form">
                            <label class="label">Data</label>
                            <input class="buscar" id="senha" style="margin-bottom: 10px;" type="password" name="senha" />
                            <div class="clear"></div>
                        </div><!-- .item-form -->

                        <input class="bt_salvar" id="botaoEnviar" type="submit" value="Salvar"/>
                        <input class="bt_voltar" type="button" onclick="javascript:window.location='usuarios.php'" value="Voltar"/>
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
                        <th>Data Vencimento</th>
                        <th style="text-align: center;">Editar</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = mysql_query("SELECT * FROM TAREFAS");
                        while ($tarefa = mysql_fetch_array($sql)) :
                            if ($tarefa['SITUACAO'] == true){
                                $ativoStatus = 'img/icons/checkbox_checked_icon&16.png';
                            } else {
                                $ativoStatus = 'img/icons/checkbox_unchecked_icon&16.png';
                            }

                            $tarefaRE   = $tarefa['RE_ID'] ? $tarefa['RE_ID'] : 0;
                            $tarefaAUTO = $tarefa['AUTO_ID'] ? $tarefa['AUTO_ID'] : 0;

                            $sqlClietne = mysql_query("SELECT *
                                                         FROM clientes
                                                        WHERE ID IN ( SELECT CLIENTE_ID
                                                                        FROM re
                                                                        WHERE ID = $tarefaRE
                                                                        UNION
                                                                        SELECT CLIENTE_ID
                                                                        FROM auto
                                                                        WHERE ID = $tarefaAUTO)");

                            //Seleciona os dados do cliente de acordo com o cliente_id do RE ou AUTO
                            $sqlCliente = mysql_fetch_array($sqlClietne);

                                                                         
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
        <div class="taskbar">
            <div class="taskbar-action-close">
            </div>
        </div>
        <div class="taskbar-action-open">
        </div>
        <div style="clear:both"></div>
	<div class="rodape">
            <?php include('_rodape.php') ?>
        </div>
    </body>
</html>