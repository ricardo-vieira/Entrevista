<?php
session_start();
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
			<div id="divcadusu" class="col-xs-12 col-sm-12 col-md-6 col-lg-4" style="border-left-width: 10px">
				<h1 class="certertittles" align="center">Cadastro de Usuários</h1>
				<label for="USUARIO"><b>Login:</b>&nbsp;</label>
				<input class="form-control" type="text" name="txtUsuario" required="" id="USUARIO"><br>
				<label for="SENHA"><b>Senha:</b>&nbsp;</label>
				<input class="form-control" type="password" name="txtSenha" required="" id="SENHA"><br>
				<label  for="NOME"><b>Nome:</b>&nbsp;</label>
				<input class="form-control" type="text" name="txtNome" required="" id="NOME"><br>
				<label  for="telefone"><b>Telefone:</b>&nbsp;</label>
				<input class="form-control" type="tel" name="txttelefone" required="" id="telefone"><br>
				<label  for="email"><b>Email:</b>&nbsp;</label>
				<input class="form-control" type="email" name="txtemail" required="" id="email"><br>
				<label  for="crp"><b>CRP:</b>&nbsp;</label>
				<input class="form-control" type="text" name="txtcrp" required="" id="crp"><br>
				<label  for="cpf"><b>CPF:</b>&nbsp;</label>
				<input class="form-control" type="text" name="txtcpf" required="" id="cpf"><br>
				<input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar" class="btn btn-primary btn-lg btn-block">
				<a href="bemvindofull.html" class="btn btn-primary btn-lg btn-block">Voltar</a>
				<a href="../index.html" class="btn btn-primary btn-lg btn-block">Sair</a>
			</div>
			<div id="divcadusu" class="border-left-5 col-xs-12 col-sm-12 col-md-6 col-lg-8" style="border-left-width: 10px">
				<table class="table table-striped" style="width: 100%">
					<thead>
						<tr>
							<th scope="col" style="text-align: center; width: 20%">Nome</th>
							<th scope="col" style="text-align: center; width: 7.25%">Inscrição</th>
							<th scope="col" style="text-align: center; width: 7.25%">CPF</th>
							<th scope="col" style="text-align: center; width: 7.25%">Organização do Pensamento</th>
							<th scope="col" style="text-align: center; width: 7.25%">Clareza de Resposta</th>
							<th scope="col" style="text-align: center; width: 7.25%">Facilidade de Expressão</th>
							<th scope="col" style="text-align: center; width: 7.25%">Ausencia de Gagueira</th>
							<th scope="col" style="text-align: center; width: 7.25%">Vida Egressa</th>
							<th scope="col" style="text-align: center; width: 7.25%">Nivel de Motivação</th>
							<th scope="col" style="text-align: center; width: 7.25%">Relacionamento Interpessoal</th>
							<th scope="col" style="text-align: center; width: 7.25%">Medicamento de Uso Contínuo</th>
							<th scope="col" style="text-align: center; width: 7.25%">Substâncias Entorpecentes</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</form>
</body>
</html>
