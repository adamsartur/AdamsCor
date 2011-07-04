<?php
// Conecta com o banco de dados MySQL
function ConectarBanco() {
    //$CB_conexaoBanco = @mysql_connect(HOST_DB,USUARIO_DB,SENHA_DB) or exit(mysql_error());
    //$CB_baseDeDados = @mysql_select_db(BASE_DB,$CB_conexaoBanco) or exit(mysql_error());
}


// Executa o comando SQL
function ExecutarSQL($sql) {
    $colecao = mysql_query($sql) or exit($sql."<br>".mysql_error());
    return $colecao;
}
// Fecha a conexÃ£o com o banco de dados
function FecharBanco() {
    mysql_close() or exit(mysql_error());
}

function get($var, $valor = null){
    return isset($_GET[$var]) ? $_GET[$var] : $valor;
}

function post($var, $valor = null){
    return isset($_POST[$var]) ? $_POST[$var] : $valor;
}

function set($var, $valor = null){
    return isset($var) ? $var : $valor;
}

function request($var, $valor = null){
    return isset($_REQUEST[$var]) ? $_REQUEST[$var] : $valor;
}

//Função que verifica se o ID está setado e se o valor retornado de ADMIN ou ATIVO
//do banco é = 1
function selectedBox($var, $valor = null){
    return !is_null(get('id')) ? $var == 1 ? 'checked="checked"' : $valor : $valor;
}

function admin($var, $valor = null){
    return !is_null(get('id')) ? $var == 1 ? true : false : $valor;
}

function editar($var){
    return !is_null($var) ? true : false;
}
//$acao = get('acao', 'teste');


function formatarDataBR($data){
    $data = implode("-", array_reverse(explode("/", $data)));
    return $data;
}

function formatarDataEN($data){
    $data = implode("/", array_reverse(explode("-", $data)));
    return $data;
}

function dataNull($campo) {
    $null = post($campo) != '' ? "'".formatarDataBR(addslashes(post($campo)))."'" : 'NULL';
    return $null;
}

function bancoCpf($cpf, $id = null) {
    if (!is_null($id)) {
        $id = " AND ID <> '$id'";
    }
    $sql = mysql_query("SELECT CPF FROM CLIENTES WHERE CPF = '$cpf' $id");
    if ($cpf == "") {
        return true;
    } else {
        if (mysql_num_rows($sql) > 0) {
            return false;
        } else {
            return true;
        }
    }
}

function bancoCnpj($cnpj, $id = null) {
    if (!is_null($id)) {
        $id = " AND ID <> '$id'";
    }
    $sql = mysql_query("SELECT CNPJ FROM CLIENTES WHERE CNPJ = '$cnpj' $id");
    if ($cnpj == "") {
        return true;
    } else {
        if (mysql_num_rows($sql) > 0) {
            return false;
        } else {
            return true;
        }
    }
}

function selectEstados($idEstado = 23){
    $sql = mysql_query("SELECT * FROM estados");
    $estadosArray = mysql_fetch_array($sql);
    $html = '<select name="estado" id="estado">';
    while($estadosArray = mysql_fetch_array($sql)) {
        $selecionado = $estadosArray['id'] == $idEstado ? 'selected="selected"' : '';
        $html .= '<option value="'.$estadosArray['id'].'" '.$selecionado.'>'.$estadosArray['nome'].'</option>';
    }
    $html .= '</select>';

    return $html;
}

function selectCidades($idEstado, $idCidade = 7707){
    $sql = mysql_query("SELECT * FROM cidades WHERE estado = '$idEstado'");
    $cidadesArray = mysql_fetch_array($sql);
    $html = '<select name="cidade" id="cidade">';
    while($cidadesArray = mysql_fetch_array($sql)){
        $selecionado = $cidadesArray['id'] == $idCidade ? 'selected="selected"' : '';
        $html .= '<option value="'.$cidadesArray['id'].'" '.$selecionado.'>'.$cidadesArray['nome'].'</option>';
    }
    $html .= '</select>';

    return $html;
}