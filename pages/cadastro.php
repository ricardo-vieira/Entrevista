<?php require_once '../dao/DAOUsuarios.php';


//valida os campos para a inclusao ou edicao das informacoes
if(($_POST['txtUsuario'] == "" ||
$_POST['txtUsuario'] == null) ||
($_POST['txtSenha'] == "" || $_POST['txtSenha'] == null)) { ?>

  <script language='javascript' type='text/javascript'>
  alert('Os campos login, senha e nome devem ser preenchidos');window.location.href='usuarios.php';
  </script>

  <?php die();} /* fim do if(($_POST['txtUsuario'] == "" || $_POST['txtUsuario'] == null) || ($_POST['txtSenha'] == "" || $_POST['txtSenha'] == null)) */

  // verifica se esta sendo editado atraves do input hdusuarioedicao
  if (isset($_POST["hdusuarioedicao"])){

    $usuariocodigo = $_POST["hdusuarioedicao"];

    if (!is_numeric($usuariocodigo) || unicoUsuario($usuariocodigo) == NULL) { ?>

      <script language='javascript' type='text/javascript'>
      alert('Codigo de usuario invalido ou inexistente.');window.location.href='usuarios.php';
      </script>

      <?php die();
    }else{

      //caso o $codusuarioedicao for valido entao atualiza as informacoes
      $usuarionome     = filter_var($_POST['txtNome'], FILTER_SANITIZE_STRING);
      $usuariologin    = filter_var($_POST['txtUsuario'], FILTER_SANITIZE_STRING);
      $usuariossenha   = filter_var($_POST['txtSenha'], FILTER_SANITIZE_STRING);
      $usuariotelefone = filter_var($_POST['txttelefone'], FILTER_SANITIZE_STRING);
      $usuarioemail    = filter_var($_POST['txtemail'], FILTER_SANITIZE_STRING);
      $usuariocrp      = filter_var($_POST['txtcrp'], FILTER_SANITIZE_STRING);
      $usuariocpf      = filter_var($_POST['txtcpf'], FILTER_SANITIZE_STRING);

      $resultadousuario = atualizarUsuario($usuariocodigo,
                                           $usuarionome,
                                           $usuariologin,
                                           $usuariossenha,
                                           $usuariotelefone,
                                           $usuarioemail,
                                           $usuariocrp,
                                           $usuariocpf);


      if ($resultadousuario == true){?>

        <script language='javascript' type='text/javascript'>
        alert('Usuário atualizado com sucesso!');
        window.location.href='usuarios.php';
        </script>

        <?php } else{ ?>

          <script language='javascript' type='text/javascript'>
          alert('Não foi possível atualizar esse usuário');
          window.location.href='usuarios.php';
          </script>

          <?php }
        die();
      }
    }

    //caso nao for uma edicao sera entao uma inclusao.
    //verifica se existe um usuario com o mesmo login e senha
    if (encontraUsuarios($_POST['txtUsuario'], $_POST['txtSenha']) != NULL){ ?>

      <script language='javascript' type='text/javascript'>
      alert('Esse login já existe');window.location.href='usuarios.php';
      </script>

      <?php die();
    } else {
      $inclusaosucedida = inserirUsuario($_POST['txtNome'], $_POST['txtUsuario'], $_POST['txtSenha'], $_POST['txttelefone'], $_POST['txtemail'], $_POST['txtcrp'], $_POST['txtcpf']);

      // caso a inclusao ocorra com sucesso
      if($inclusaosucedida) { ?>

        <script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');
        window.location.href='usuarios.php';
        </script>

      <?php } else { ?>

        <script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário');
        window.location.href='usuarios.php';
        </script>

        <?php die(); }
      } ?>
