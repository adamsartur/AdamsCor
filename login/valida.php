<?php

// Inclui o arquivo com o sistema de segurança
include("seguranca.php");

// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Salva duas variáveis com o que foi digitado no formulário
    // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $senha   = (isset($_POST['senha'])) ? $_POST['senha'] : '';

    
    if ( validaUsuario($usuario, $senha) ) {
        header("Location: ../corretora.php");
    } else {
        expulsaVisitante('Credenciais de login inválidas.');
    }
}
