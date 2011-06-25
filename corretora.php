<?php require_once '_config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include('_head.php') ?>
        <title><?php echo $tittle; ?></title>
    </head>
    <body class="body">
        <!--topo-->
        <?php include('_topo.php') ?>
        <!-- div "menu"-->
        <?php include('_menu.php') ?>
        <div class="principal">&nbsp;
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