<?php
 require_once '../dao/DAOCandidatos.php';
 require_once '../dao/DAOUsuarios.php';
 $IDUsuario = $_COOKIE["ID"];
?>
<html>
	<head>
		<title>Bem vindo</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<meta charset="UTF-8">
	</head>
	<style>
		#containers{
			margin: 0 auto;
			width: 80%;
			height: 500px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		#divbemv{
			width: 500px;
			border: 1px solid #bdc3c7;
			padding: 20px;
			border-radius: 10px;
		}
		.centertittle{
			text-align: center;
		}
	</style>
	<body>
		<main id="containers">
		<div id="divbemv" class="container">
			<?php
					$nomeusuario = unicoUsuario($IDUsuario);
					if($IDUsuario == -1){
						echo "<h1 class="."centertittle>"."Bem vindo Jorge!"."<h1>";
					}
					else{
						echo "<h1 class="."centertittle> Bem Vindo ".$nomeusuario['NOME']." !<h1>";
					}
			?>
			<h2 class="centertittle">Escolha uma opção.</h2>
			<br>
			<a href="candidatosEntrevista.php" class="btn btn-primary btn-lg btn-block">Lançar Resultados ou Entrevistas</a>
			<a href="usuarios.php" class="btn btn-primary btn-lg btn-block">Cadastrar Usuários</a>
			<a href="../index.html" class="btn btn-primary btn-lg btn-block">Sair</a>
		</div>
		</main>
	</body>
</html>
