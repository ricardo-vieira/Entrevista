<?php
  require_once '../dao/DAOUsuarios.php';
  $usuario = encontraUsuarios($_POST['txtUsuario'], $_POST['txtSenha']);

  if(($_POST['txtUsuario'] == "" || $_POST['txtUsuario'] == null) || ($_POST['txtSenha'] == "" || $_POST['txtSenha'] == null)){
    echo"<script language='javascript' type='text/javascript'>alert('Os campos login, senha e nome devem ser preenchidos');window.location.href='cadastro.html';</script>";

    }else{
      if($usuario != null){
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();
      }else{
        $insert = inserirUsuario($_POST['txtNome'], $_POST['txtUsuario'], $_POST['txtSenha'], 0);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastro.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>
