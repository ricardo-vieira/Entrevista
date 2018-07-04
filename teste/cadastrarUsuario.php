<?php
require_once 'selectUsuarios.php';

// Se existir a variavel do botao btnCadastrar no escopo do POST
if (isset($_POST["btnCadastrar"])):
    $nome    = filter_input(INPUT_POST, "txtNome", FILTER_SANITIZE_STRING);
    $usuario = filter_input(INPUT_POST, "txtUsuario", FILTER_SANITIZE_STRING);
    $senha   = filter_input(INPUT_POST, "txtSenha", FILTER_SANITIZE_STRING);
    $adm     = filter_input(INPUT_POST, "cboAdm", FILTER_VALIDATE_BOOLEAN);
    
    //se cadastrar retornar verdadeiro, printar cadastrar
    if(cadastrar($nome, $usuario, $senha, $adm)):
        echo 'Cadastrado';
    else:
        echo 'Erro ao realizar cadastro';
    endif;
    
endif;

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            Nome : <input type="text" name="txtNome" /><br>
            Usuario : <input type="text" name="txtUsuario" /><br>
            Senha : <input type="text" name="txtSenha" /><br>
            Adm : <input type="checkbox" name="cboAdm" /><br>
            
            <input type="submit" name="btnCadastrar" value="Enviar" />
        </form>
    </body>
</html>
