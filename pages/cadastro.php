<?php 
 
$login = $_POST['USUARIO'];
$senha = MD5($_POST['SENHA']);
$nome = $_POST['NOME'];
$connect = mysql_connect('localhost','id2520344_root','thmpv77d6f');
$db = mysql_select_db('id2520344_dbsusipe');
$query_select = "SELECT USUARIO FROM usuarios WHERE USUARIO = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['USUARIO'];
 
  if(($login == "" || $login == null) || ($nome == "" || $nome == null)){
    echo"<script language='javascript' type='text/javascript'>alert('Os campos login, senha e nome devem ser preenchidos');window.location.href='cadastro.html';</script>";
 
    }else{
      if($logarray == $login){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO usuarios (USUARIO,SENHA,NOME) VALUES ('$login','$senha','$nome')";
        $insert = mysql_query($query,$connect);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastro.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>