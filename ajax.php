<?php
    require_once '_config.php';


    switch (post('evento')) {
        case 'updateStatus':
            $id = addslashes(post("id"));
            $situacao = mysql_fetch_array(mysql_query("SELECT SITUACAO FROM tarefas WHERE ID =". set($id)." LIMIT 1"));
            $situacao = $situacao['SITUACAO'] == 0 ? 1 : 0;
            mysql_query("UPDATE tarefas SET SITUACAO = ". $situacao .",
                                            DATA_FINALIZACAO = '".date("Y-m-d")."'
                                      WHERE ID = ". set($id));
            echo 'Status atualizado com sucesso';
            break;
    }

?>
