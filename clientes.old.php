<?php require_once '_config.php';

ConectarBanco();
//
//    if (isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
//        $sql = mysql_query('DELETE FROM USERS WHERE ID = '.$_GET['idUsuario']);
//        $msg = 'Usuário deletado com sucesso';
//    }
//    $ativo = 0; $admin = 0; $msgErro = null;
//    if (get("acao") && post('usuario') && (get("acao") == "inserir")) {
//        if (post('Ativo') && post('Ativo')){
//            $ativo = 1;
//        }
//        if (post('Admin') && post('Admin')){
//            $admin = 1;
//        }




//        $sqlusuario = mysql_query("SELECT USUARIO FROM users WHERE USUARIO = '".addslashes(post('usuario'))."'");
//        if (mysql_num_rows($sqlusuario) > 0){
//            $msgErro = "*O usuario ".post('usuario')." já está cadastrado no sistema";
//        } else {
//            $sql = "INSERT INTO users (USUARIO, SENHA, ADMIN, ATIVO) VALUES ('".addslashes(strtolower(post('usuario')))."', ".addslashes(post('senha')).", $admin, $ativo)";
//            $query = mysql_query($sql) or die(mysql_error());
//            $msgErro = 'Usuario inserido com sucesso!';
//            echo "<script>
//                alert('Usuario inserido com sucesso!')
//                window.location='usuarios.php';
//             </script>";
//        }
//    }

//    if (get('id')){
//        $cliente = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE ID = '".addslashes(get('id'))."'"));
//    }
//
//    if (get("acao") && post('cliente') && (get("acao") == "editar")) {
//        if (post('Ativo') && post('Ativo')){
//            $ativo = 1;
//
//        }
//        if (post('Admin') && post('Admin')){
//            $admin = 1;
//        }
//
//        $sql = "UPDATE users SET (SENHA = ".addslashes(post('senha')).",
//                                  ADMIN = $admin,
//                                  ATIVO = $ativo)";
//        $query = mysql_query($sql) or die(mysql_error());
//        $msgErro = 'Usuario alterado com sucesso!';
//        echo "<script>
//            alert('Usuario alterado com sucesso!')
//            window.location='usuarios.php';
//         </script>";
//    }
//
//?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include('_head.php') ?>
        <title><?php $title ?></title>
    </head>
    <body class="body">
        <script type="text/javascript">
        function excluirUsuario(url) {
            if(confirm("Deseja realmente excluir este Usuário?"))
                window.location = url;
        }
        $(document).ready(function(){
            $('#usuarios').validate({
                rules:{
                    usuario:{
                        required: true
                    },
                    senha:{
                        minlength: 6
                        <?php if (get("acao") == "inserir") { echo ', required: true'; } ?>
                    },
                    senhare:{
                        equalTo: "#senha"
                    }
                },
                menssages:{
                    usuario:{ require: "O campo nome é obrigatorio"},
                    senha:{ minlength: "A senha deve ter pelo menos 6 digitos" },
                    senhare:{ equalTo: "O campo confirmação de senha deve ser identico ao campo senha."}
                }
            });
        });
        </script>
        <!--topo-->
        <?php include('_topo.php') ?>

        <!-- menu -->
        <?php include('_menu.php') ?>

        <div class="principal">
          <div class="linha">
              <?php if (!get('acao') && get('acao') != 'excluir'){ ?>
              <div class="botaoadd">
                <p style="padding: 10px; float:left;">Usu&aacute;rios</p>
                <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='usuarios.php?acao=inserir'" title="Adicionar"/>
              </div>
              <?php } ?>
              <div class="erro">
                <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
              </div>
              <div style="clear:both"></div>
              <?php if (get('acao') && get('acao') != 'excluir') { ?>
              <form action="usuarios.php?acao=<?php echo get('acao'); ?>" method="post" id="usuarios">
                <fieldset>
                    <legend>Informa&ccedil;&otilde;es</legend>
                        <div>
                            <label class="label">Usu&aacute;rio</label>
                            <input class="buscar" id="usuario" style="width: 260px !important; margin-bottom: 10px;" <?php if(get('acao') == 'editar'){ echo 'disabled=disabled'; } ?> type="text" name="usuario" value="<?php echo set(isset($usuario['USUARIO'])) ? $usuario['USUARIO'] : null ?>" />
                        </div>
                        <?php if (editar(isset($usuario['ADMIN']) ? $usuario['ADMIN'] : false)) { ?>
                        }
                        <div>
                            <label class="label">Senha Atual</label>
                            <input class="buscar" id="senhaatual" style="margin-bottom: 10px;" type="password" name="senha" />
                        </div>
                        <?php } ?>
                        <div>
                            <label class="label">Senha</label>
                            <input class="buscar" id="senha" style="margin-bottom: 10px;" type="password" name="senha" />
                        </div>
                            <label class="label">Repetir a Senha</label>
                            <input class="buscar" id="senhare" style="margin-bottom: 10px;" type="password" name="senhare" />
                        <div>
                            <label class="label">Administrador</label>
                            <input class="checkbox" style="margin-bottom: 10px;" <?php echo selectedBox(isset($usuario['ADMIN']) ? $usuario['ADMIN'] : null); ?> type="checkbox" name="Admin"></input>
                        </div>
                        <div>
                            <label class="label">Ativo</label>
                            <input class="checkbox" type="checkbox" style="margin-bottom: 10px;"  <?php echo selectedBox(isset($usuario['ATIVO']) ? $usuario['ATIVO'] : null); ?> name= "Ativo"></input>
                        </div>
                        <input class="bt_salvar" id="botaoEnviar" type="submit" value="Salvar"/>
                        <input class="bt_voltar" type="button" onclick="javascript:window.location='usuarios.php'" value="Voltar"/>
                        <input type="hidden" name="formUsuario" value="formUsuario"/>
                </fieldset>
                </form>
                <?php } else { ?>
                <!--<form action="usuarios.php" method="POST" name="buscar">
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
                        <th>Usu&aacute;rio</th>
                        <th style="text-align: center;" >Administrador</th>
                        <th style="text-align: center;" >Ativo</th>
                        <th style="text-align: center;" >Editar</th>
                        <th style="text-align: center;" >Excluir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = mysql_query("SELECT * FROM USERS");
                        while ($usuario = mysql_fetch_array($sql)) :
                            if ($usuario['ADMIN'] == true) {
                                $adminStatus = 'img/icons/checkbox_checked_icon&16.png';
                            } else {
                                $adminStatus = 'img/icons/checkbox_unchecked_icon&16.png';
                            }

                            if ($usuario['ATIVO'] == true){
                                $ativoStatus = 'img/icons/checkbox_checked_icon&16.png';
                            } else {
                                $ativoStatus = 'img/icons/checkbox_unchecked_icon&16.png';
                            }
                    ?>
                    <tr id="<?php echo $usuario['USUARIO']; ?>">
                        <!--<td width="30px" align="center"><input type="checkbox" value="20" name="productBox[]" style="border:none;"></th> -->
                        <td><?php echo $usuario['USUARIO']; ?></td>
                        <td width="100px" align="center"><img alt="Administrador" class="center-img" src="<?php echo $adminStatus; ?>" /></td>
                        <td width="100px" align="center"><img alt="Status" class="center-img" src="<?php echo $ativoStatus; ?>" /></td>
                        <td width="70px" align="center"><img alt="Editar" class="center-img" onclick="javascript:window.location='usuarios.php?acao=editar&id=<?php echo $usuario['ID']; ?>'" style="cursor: pointer;" src="img/icons/doc_edit_icon&16.png" /></td>
                        <td width="70px" align="center"><img alt="Excluir" class="center-img" onclick="excluirUsuario('usuarios.php?acao=excluir&idUsuario=<?php echo $usuario['ID']; ?>')" style="cursor: pointer;" src="img/icons/trash_icon&16.png" /></td>
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