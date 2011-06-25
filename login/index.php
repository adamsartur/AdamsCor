<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <style type="text/css">
            * { margin: 0; padding: 0; }
            body { font-family: Georgia, serif; background: url(../img/bglogin.jpg) top center no-repeat #c4c4c4; color: #3a3a3a;  }
            .clear { clear: both; }
            form { width: 406px; margin: 190px auto 0; }
            legend { display: none; }
            fieldset { border: 0; }
            label { width: 115px; text-align: right; float: left; margin: 0 10px 0 0; padding: 9px 0 0 0; font-size: 16px; }
            input { width: 220px; display: block; padding: 4px; margin: 0 0 10px 0; font-size: 18px;
                    color: #3a3a3a; font-family: Georgia, serif;}
            .button { background: url(../img/button-bg.png) repeat-x top center; border: 1px solid #999;
                      -moz-border-radius: 5px; padding: 5px; color: black; font-weight: bold;
                      -webkit-border-radius: 5px; font-size: 13px;  width: 70px; }
            .button:hover { background: white; color: black; }
        </style>
    <body>
        <form id="login-form" action="valida.php" method="post">
            <fieldset>
                <legend>Log in</legend>
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario">
                <div class="clear"></div>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha">
                <?php
                if (isset($_SESSION['ERROR']) && $_SESSION['ERROR'] != '') {
                    echo '<spam style="color: red">' . $_SESSION['ERROR'] . '</spam>';
                    unset($_SESSION['ERROR']);
                }
                ?>
                <div class="clear"></div>
                <br>
                <input type="submit" style="margin: -15px 0 0 287px;" class="button" name="commit" value="Log in">
            </fieldset>
        </form>
    </body>
</html>