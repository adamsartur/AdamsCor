<?php
session_start();
$_SG['conectaServidor'] = true;
$_SG['abreSessao'] = true;

$_SG['caseSensitive'] = false;

$_SG['validaSempre'] = true;

$_SG['servidor'] = 'localhost'; 
$_SG['usuario'] = 'root';      
$_SG['senha'] = '';            
$_SG['banco'] = 'adamscor';     


//$_SG['servidor'] = '186.202.13.12';
//$_SG['usuario'] = 'luisdalmolin2';   
//$_SG['senha'] = 'abc123';            
//$_SG['banco'] = 'luisdalmolin2';

$_SG['paginaLogin'] = 'index.php';
$_SG['tabela'] = 'users';


if ($_SG['conectaServidor'] == true) {
    $_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Nao foi possivel conectar-se ao servidor [" . $_SG['servidor'] . "].");
    mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [" . $_SG['banco'] . "].");

    //mysql_query("SET NAMES 'utf8'");
    //mysql_query("SET character_set_results = 'utf8'");
    //mysql_query("SET character_set_client = 'utf8'");
    //mysql_query("SET character_set_connection = 'utf8'");
}



/**
 * Função que valida um usuario e senha
 *
 * @param string $usuario - O usuario a ser validado
 * @param string $senha - A senha a ser validada
 *
 * @return bool - Se o usuario foi validado ou nao (true/false)
 */
function validaUsuario($usuario, $senha) {
    global $_SG;

    $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';


    $nusuario = addslashes($usuario);
    $nsenha = addslashes($senha);


    $sql = "SELECT id, usuario, admin, ativo FROM users WHERE USUARIO = '".$nusuario."' AND SENHA = '".$nsenha."' LIMIT 1";
    $query = mysql_query($sql) or die(mysql_error());
    
	//echo mysql_num_rows($query);echo $sql;
	//die;


    if( mysql_num_rows($query) == 0 ) {
        return false;
    } else {
		$resultado = mysql_fetch_array($query);
        $_SESSION['ID'] = $resultado['id'];
        $_SESSION['USUARIO'] = $resultado['usuario']; 
        $_SESSION['ADMIN'] = $resultado['admin'];
        $_SESSION['ATIVO'] = $resultado['ativo'];

        if( $_SG['validaSempre'] == true ) {            
            $_SESSION['usuarioLogin'] = $usuario;
            $_SESSION['usuarioSenha'] = $senha;            
        }
        return true;
    }
}



function protegePagina() {
   global $_SG;

   if (!isset($_SESSION['ID']) OR !isset($_SESSION['USUARIO'])) {
       expulsaVisitante('Você deve fazer login para acessar esta página.');
    } else if (!isset($_SESSION['ID']) OR !isset($_SESSION['USUARIO'])) {        
        if ($_SG['validaSempre'] == true) {            
            if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {            
                expulsaVisitante('Credenciais de login inválida.');
            }
        }
    }
}




function expulsaVisitante($msg) {
    global $_SG;

    
    unset($_SESSION['ID'], $_SESSION['USUARIO'], $_SESSION['ADMIN'], $_SESSION['usuarioSenha'], $_SESSION['usuarioGrupo'], $_SESSION['ATIVO']);

    $_SESSION['ERROR'] = $msg;
    header("Location: " . $_SG['paginaLogin']);
}