<?php
require_once "../dao/DAOUsuarios.php";
session_start();

if (isset($_COOKIE["ID"]) && $_COOKIE["ID"] == -1){
	$IDUsuario = $_COOKIE["ID"];
} else{ ?>

	<script language='javascript' type='text/javascript'>
	alert('Usuario sem acesso.');
	window.location.href='../index.html';
	</script>

<?php }

$edicaousuario = false;
$inclusaousuario = false;

if (isset($_GET["codigo"]) && !isset($_GET["Inclusao"]))
{
	$codusuarioedicao = filter_var($_GET["codigo"], FILTER_SANITIZE_NUMBER_INT);

	if (is_numeric($codusuarioedicao) && unicoUsuario($codusuarioedicao) != NULL){
		$usuarioedicao = unicoUsuario($codusuarioedicao);
		$edicaousuario = true;
	}
	else { ?>

		<script language='javascript' type='text/javascript'>
		alert('Codigo de usuario informado invalido.');
		window.location.href='usuarios.php';
		</script>

	<?php } }

	if (isset($_GET["Inclusao"]) && !isset($_GET["codigo"]))
	{
		$inclusaousuario = true;
	}

	?>
	<html>
	<head>
		<title> Cadastro de Usuário </title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<meta charset="UTF-8">
	</head>
	<style>
	#divcadusu{
		width: 500px;
		border: 1px solid #bdc3c7;
		padding: 20px;
		border-radius: 10px;
	}
	.centertittles{
		text-align: center;
	}
</style>
<body>
	<form class="px-4 py-3" method="POST" action="cadastro.php">
		<div class="row">
			<?php if ($edicaousuario || $inclusaousuario) {?>
				<div id="divcadusu" class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
					<h1 class="certertittles" align="left"><?php echo ($edicaousuario) ? "Edicao de usuario [".$usuarioedicao["USUARIO"]."]" : "Inclusao de usuario" ?></h1>
					<label for="USUARIO"><b>Login:</b>&nbsp;</label>
					<input class="form-control" type="text" name="txtUsuario" required="" id="USUARIO" value="<?php echo ($edicaousuario) ? $usuarioedicao["USUARIO"] : "" ?>"><br>
					<label for="SENHA"><b>Senha:</b>&nbsp;</label>
					<input class="form-control" type="password" name="txtSenha" required="" id="SENHA" value="<?php echo ($edicaousuario) ? $usuarioedicao["SENHA"] : "" ?>"><br>
					<label  for="NOME"><b>Nome:</b>&nbsp;</label>
					<input class="form-control" type="text" name="txtNome" required="" id="NOME" value="<?php echo ($edicaousuario) ? $usuarioedicao["NOME"] : "" ?>"><br>
					<label  for="telefone"><b>Telefone:</b>&nbsp;</label>
					<input class="form-control" type="tel" name="txttelefone" required="" id="telefone" value="<?php echo ($edicaousuario) ? $usuarioedicao["telefone"] : "" ?>"><br>
					<label  for="email"><b>Email:</b>&nbsp;</label>
					<input class="form-control" type="email" name="txtemail" required="" id="email" value="<?php echo ($edicaousuario) ? $usuarioedicao["email"] : "" ?>"><br>
					<label  for="crp"><b>CRP:</b>&nbsp;</label>
					<input class="form-control" type="text" name="txtcrp" required="" id="crp" value="<?php echo ($edicaousuario) ? $usuarioedicao["crp"] : "" ?>"><br>
					<label  for="cpf"><b>CPF:</b>&nbsp;</label>
					<input class="form-control" type="text" name="txtcpf" required="" id="cpf" value="<?php echo ($edicaousuario) ? $usuarioedicao["cpf"] : "" ?>"><br>
					<input type="submit" value="<?php echo  ($edicaousuario) ? "Salvar" : "Incluir" ?>" id="cadastrar" name="btnCadastrar" class="btn btn-primary btn-lg btn-block">
					<input type="button" class="btn btn-primary btn-lg btn-block" onclick="cancelaredicaousuario()" value="Cancelar"></a>

					<?php if ($edicaousuario){?>
					<input type="hidden" name="hdusuarioedicao" value=<?php echo $usuarioedicao["ID"] ?> />
					<?php } // fim if ($edicaousuario) ?>

					<script type="text/javascript">
					function cancelaredicaousuario(proximoregistro){
						var resposta = confirm("Deseja realmente cancelar <?php echo ($edicaousuario) ? "a edicao do usuario ".$usuarioedicao["USUARIO"] : "inclusao do usuario" ?> ?");

						if (resposta == true)
						{
							window.location.href= "usuarios.php".concat(proximoregistro != undefined ? "?".concat(proximoregistro) : "");
						}
						return;
					}
					</script>
				</div>
			<?php } // fim do if ($usuarioedicao)?>

			<div id="divlista" class="container">
				<a href="?Inclusao" class="btn btn-info" onclick="<?php echo ($edicaousuario || $inclusaousuario) ? "cancelaredicaousuario()" : "" ?>">Incluir</a>
				<br><br>

				<table class="table table-striped" style="width: 100%">
					<thead>
						<tr>
							<th scope="col" style="text-align: center; width: 2%">Código</th>
							<th scope="col" style="text-align: left; width: 30%">Nome</th>
							<th scope="col" style="text-align: center;">CPF</th>
							<th scope="col" style="text-align: center;">CRP</th>
							<th scope="col" style="text-align: center;">E-Mail</th>
							<th scope="col" style="text-align: center;">Telefone</th>
							<th scope="col" style="text-align: center;">Usuario</th>
							<th scope="col" style="text-align: center; width: 50px"></th>
						</tr>
					</thead>
					<tbody>

						<?php
						$arrayusuarios = listarUsuarios();
						foreach ($arrayusuarios as $itemusuario) {?>
							<tr>
								<th scope="row"><?php echo $itemusuario["ID"] ?></th>
								<td style="text-align: left"><?php echo $itemusuario["NOME"] ?></td>
								<td style="text-align: center"><?php echo $itemusuario["cpf"] ?></td>
								<td style="text-align: center"><?php echo $itemusuario["crp"] ?></td>
								<td style="text-align: center"><?php echo $itemusuario["email"] ?></td>
								<td scope="col" style="text-align: center"><?php echo $itemusuario["telefone"] ?></td>
								<td style="text-align: center"><?php echo $itemusuario["USUARIO"] ?></td>
								<td scope="col" style="text-align: center"><a href="?codigo=<?php echo $itemusuario["ID"] ?>" class="btn btn-info" onclick="<?php echo ($edicaousuario || $inclusaousuario) ? "cancelaredicaousuario(".$itemusuario["ID"].")" : "" ?>">Editar<a/></td>
								</tr>
							<?php }// final do foreach ($arrayusuarios as $itemusuario) ?>

						</tbody>
					</table>
				</div>
			</div>
		</form>
	</body>
	</html>
