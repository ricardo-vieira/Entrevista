<?php
	require_once('atrcandidatos.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Atribui Candidato</title>
</head>
<body>
	<form action="POST">
		<table>
			<tr>
				<td colspan="2">
					<select style="width: 400px" id="cboentrevistador">
						<?php 
							$arrayentrevistadores = listarEntrevistadores();

							foreach($arrayentrevistadores as $entrevistador)
								echo "1"
						?>
					</select>
				</td>
				<td><input type="submit" value="Visualizar"></td>
			</tr>
			<tr>
				<td>Marcar</td>
				<td style="text-align: left">Candidato</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td width="300" colspan="2">Alex Diego Araujo da Rocha</td>
			</tr>
		</table>

	</form>
</body>
</html>