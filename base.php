<?php
/**
 * Página de documentos do cliente
 */

require_once '_config.php';
require_once 'inc/classes/cliente.class.php';
require_once 'inc/classes/auto.class.php';
require_once 'inc/classes/re.class.php';
require_once 'inc/classes/cia.class.php';


$acao = request('acao');
$cliente = new Cliente();
$auto = new Auto();
$re = new Re();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <?php include('_head.php') ?>
    <title><?php echo $tittle; ?></title>
</head>
<body class="body">
    <!--topo-->
    <?php include('_topo.php') ?>

    <!-- menu -->
    <?php include('_menu.php') ?>

    <div class="principal">
        
        <div class="botaoadd" style="float: right; width: auto">
          <input class="bt_adicionar" type="button" value="Adicionar" onclick="javascript:window.location='calculo.php?acao=inserir'" title="Adicionar"/>
        </div><!-- .botaoadd -->
        
        <div class="erro">
            <p style="text-align: center; margin-top: 10px;"><?php if (isset($msgErro)){  echo $msgErro;  } ?></p>
        </div><!-- .erro -->
        
        <div class="linha">
        </div><!-- .linha -->
        
    </div><!-- .principal -->
 
    <?php include('_rodape.php') ?>
    
</body>
</html>