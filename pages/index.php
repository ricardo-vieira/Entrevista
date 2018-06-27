<?php
  require_once '../dao/DAOUsuarios.php';
//      echo $_POST['txtUsuario'];
//      echo $_POST['txtSenha'];
      $ArrayUsuarios = encontraUsuarios($_POST['txtUsuario'], $_POST['txtSenha']);

        if ($ArrayUsuarios == NULL){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
          die();
        }else{
          if($ArrayUsuarios['ADM'] == 1){
          setcookie("USUARIO",$_POST['txtUsuario']);
          setcookie("ID",-1);
          header("Location:bemvindofull.html");
        }else{
          setcookie("USUARIO",$_POST['txtUsuario']);
          setcookie("ID",$ArrayUsuarios['ID']);
          header("Location:bemvindo.html");
        }
      }

?>
