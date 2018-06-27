<html>
	<head>
		<title>Candidatos</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<meta charset="UTF-8">
	</head>
	<style>
		.certertittlescand{
			text-align: center;

		}
	</style>
	<body>
		<form class="px-4 py-3" method="POST" action="Entrevistas.php">
			<div>
			<h1 class="certertittlescand"><CENTER>Cadastro e alteração dos dados de Candidatos</CENTER></h1>
			<table class="table table-striped">
	      <thead>
	        <tr>
	          <th scope="col" style="text-align: center">Nome</th>
	          <th scope="col" style="text-align: center">Inscrição</th>
	          <th scope="col" style="text-align: center">CPF</th>
	          <th scope="col" style="text-align: center">Organização do Pensamento</th>
	          <th scope="col" style="text-align: center">Clareza de Resposta</th>
	          <th scope="col" style="text-align: center">Facilidade de Expressão</th>
	          <th scope="col" style="text-align: center">Ausencia de Gagueira</th>
	          <th scope="col" style="text-align: center">Vida Egressa</th>
	          <th scope="col" style="text-align: center">Nivel de Motivação</th>
	          <th scope="col" style="text-align: center">Relacionamento Interpessoal</th>
	          <th scope="col" style="text-align: center">Medicamento de Uso Contínuo</th>
	          <th scope="col" style="text-align: center">Substâncias Entorpecentes</th>
	        </tr>
	      </thead>
	      <tbody>
	        <?php
	        require_once '../dao/DAOCandidatos.php';
					$IDUsuario = $_COOKIE["ID"];
	        $arrayCandidatos = listarcandidato($IDUsuario);
	        foreach ($arrayCandidatos as $itemcandidato)
	        {
	            echo "<tr><th scope=\"row\">".$itemcandidato['nome']."</th><td>".$itemcandidato['inscricao']."</td><td>".$itemcandidato['cpf']."</td>";
	            echo "
	            <td><select name=\"".$itemcandidato['ID']."\"1\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementByName('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td>";
	            echo "
	            <td><select id=\"select\" class=\"form-control\">
	              <option selected>Favorável</option>
	              <option>Desfavorável</option>
	            </select>
	              <script type=\"text/java\">
	                var selectElem = document.getElementById('select')

	                selectElem.addEventListener('change', function() {
	                  var index = selectElem.selectedIndex;
	                })
	              </script>
	                </td> </tr>";

	        }

	         ?>
				 </tbody>
	    </table>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    	<a href="javascript:window.history.go(-1)" class="btn btn-primary btn-lg btn-block">Voltar</a>
    	<a href="index.html" class="btn btn-primary btn-lg btn-block">Sair</a>
		</div>
		</form>
	</body>
</html>
