<?php
require_once '_config.php';

ConectarBanco();

switch (@$_POST['tipo']){
    case 'apo':
        echo 'apo';
        break;
    case 'cli':
        echo 'cli';
        break;
}

?>
