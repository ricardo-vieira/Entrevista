<?php 
  $login = $_POST['USUARIO'];
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['SENHA']);
  $connect = mysql_connect('localhost','id2520344_root','thmpv77d6f');
  $db = mysql_select_db('id2520344_dbsusipe');
    if (isset($entrar)) {
             
      $verifica = mysql_query("SELECT ADM FROM usuarios WHERE USUARIO = '$login' AND SENHA = '$senha'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
          die();
        }else{
          $usu = mysql_fetch_array($verifica);
          if($usu[0] == 1){
          setcookie("USUARIO",$login);
          header("Location:bemvindofull.html");
        }else{
          setcookie("USUARIO",$login);
          header("Location:bemvindo.html");
        }
        }
    }
?>