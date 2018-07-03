<?php
 require_once '../dao/DAOCandidatos.php';
 require_once '../dao/DAOUsuarios.php';
 $IDUsuario = $_COOKIE["ID"];
?>
<html>
	<head>
		<title>Relação de Entrevistas Realizadas</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta charset="UTF-8">
	</head>
	<style>
		.certertittlescand{
			text-align: center;
		}

    hr {
				display: block;
				margin-top: 0.5em;
				margin-bottom: 0.5em;
				margin-left: auto;
				margin-right: auto;
				border-style: inset;
				border-width: 3px;
		}
	</style>
	<body>
		<form class="px-4 py-3" method="POST">
			<div>

				<?php
						$nomeusuario = unicoUsuario($IDUsuario);
						if($IDUsuario == -1){
							echo "<h4 align=\"right\"> Usuário: "."Jorge"."<h4>";
						}
						else{
							echo "<h4 align=\"right\"> Usuário: ".$nomeusuario['NOME']."<h4>";
						}
				?>

			<h1 class="certertittlescand"><CENTER>Relação de Entrevistas Realizadas</CENTER></h1>
				<div class="input-group">
			     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			     <input id="inscricao" type="text" class="form-control" name="inscricao" placeholder="Inscrição">
			  </div>
				<input type="submit" name="btnPesquisar" class="btn btn-primary btn-lg" value="Pesquisar"/>
				<input type="submit" name="btnSalvar" class="btn btn-primary btn-lg" value="Salvar"/>
  			<a href="javascript:window.history.go(-1)" class="btn btn-primary btn-lg">Voltar</a>
	  		<a href="../index.html" class="btn btn-primary btn-lg">Sair</a>
			</div>
			<div>
				<?php
				require_once '../dao/DAOCandidatos.php';
				$IDUsuario = $_COOKIE["ID"];
				$IDCandidatoEditar;

          if (isset ($_POST["btnPesquisar"])) {
						  $Inscricao = $_POST["inscricao"];
						  $CandidatoEditar = CandidatoInscricao($IDUsuario, $Inscricao);

							if ($CandidatoEditar == NULL) {
								echo"<script language='javascript' type='text/javascript'>alert('Inscrição não existente!');</script>";
							}
							else { ?>
                                                            <table class="table table-striped" style="width: 100%">
							      <thead>
							        <tr>
							          <th scope="col" style="text-align: center; width: 20%; padding: center">Nome</th>
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
							    <tbody>

                                                <?php
									$selectedorganizapensamento  = ($CandidatoEditar['ORGANIZAPENSAMENTO']==1)?("selected"):("");
									$selectedclarezaresposta  = ($CandidatoEditar['CLAREZARESPOSTA']==1)?("selected"):("");
									$selectedfacilexpressao  = ($CandidatoEditar['FACILEXPRESSAO']==1)?("selected"):("");
									$selectedausenciagagueira = ($CandidatoEditar['AUSENGAGUEIRA']==1)?("selected"):("");
									$selectedvidaegressa = ($CandidatoEditar['VIDAEGRESSA']==1)?("selected"):("");
									$selectednivelmotivacao = ($CandidatoEditar['NIVELMOTIVACAO']==1)?("selected"):("");
									$selectedrelacionamentointerpesssoal  = ($CandidatoEditar['RELACIONAMENTOINTERPESSOAL']==1)?("selected"):("");
									$selectedmedcontinuo  = ($CandidatoEditar['MEDCONTINUO']==1)?("selected"):("");
                                                    			$selectedsubstanciasintorpecentes  = ($CandidatoEditar['SUBSTANCIASINTORPECENTES']==1)?("selected"):("");

								echo  "<input type=\"hidden\" name=\"HDIDCandidatoEditar\" value=\"".$CandidatoEditar['ID']."\"/>";
								echo "<tr><th scope=\"row\">".utf8_encode($CandidatoEditar['nome'])."</th><td>".$CandidatoEditar['inscricao']."</td><td>".$CandidatoEditar['cpf']."</td>";

                echo "<td><select name=\"OP\" class=\"form-control form-control-lg\" style=\"line-height:\">
  								<option value = 0 >Inapto</option>
		              <option value = 1 ".$selectedorganizapensamento.">Apto</option>
		            </select>
		              <script type=\"text/java\">
		                var selectElem = document.getElementByName('select')

		                selectElem.addEventListener('change', function() {
		                  var index = selectElem.selectedIndex;
		                })
		              </script>
		                </td>";
										echo "<td><select name=\"CR\" class=\"form-control form-control-lg\">
  										<option value = 0 >Inapto</option>
				              <option value = 1 ".$selectedclarezaresposta.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"FE\" class=\"form-control form-control-lg\">
  										<option value = 0 >Inapto</option>
				              <option value = 1 ".$selectedfacilexpressao.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"AG\" class=\"form-control form-control-lg\">
				              <option value = 0 >Inapto</option>
											<option value = 1 ".$selectedausenciagagueira.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"VE\" class=\"form-control form-control-lg\">
				              <option value = 0 >Inapto</option>
											<option value = 1 ".$selectedvidaegressa.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"NM\" class=\"form-control form-control-lg\">
				              <option value = 0 >Inapto</option>
											<option value = 1 ".$selectednivelmotivacao.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"RI\" class=\"form-control form-control-lg\">
				              <option value = 0 >Inapto</option>
											<option value = 1 ".$selectedrelacionamentointerpesssoal.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"MC\" class=\"form-control form-control-lg\">
				              <option value = 0 >Inapto</option>
											<option value = 1 ".$selectedmedcontinuo.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td>";
				            echo "<td><select name=\"SE\" class=\"form-control form-control-lg\">
				              <option value = 0 >Inapto</option>
											<option value = 1 ".$selectedsubstanciasintorpecentes.">Apto</option>
				            </select>
				              <script type=\"text/java\">
				                var selectElem = document.getElementById('select')

				                selectElem.addEventListener('change', function() {
				                  var index = selectElem.selectedIndex;
				                })
				              </script>
				                </td> </tr>";

							}
          }

					if (isset($_POST["btnSalvar"])) {
						$id 													= $_POST["HDIDCandidatoEditar"];
						$organizapensamento   				= $_POST["OP"];
						$clarezaresposta  						= $_POST["CR"];
						$facilexpressao  							= $_POST["FE"];
						$ausenciagagueira 						= $_POST["AG"];
						$vidaegressa 									= $_POST["VE"];
						$nivelmotivacao 							= $_POST["NM"];
						$relacionamentointerpesssoal  = $_POST["RI"];
						$medcontinuo  								= $_POST["MC"];
						$substanciasintorpecentes  		= $_POST["SE"];
						$entrevistador  							= $IDUsuario;

						$Resultado = DefinirResultado ($organizapensamento, $clarezaresposta, $facilexpressao,
						                           $ausenciagagueira, $vidaegressa, $nivelmotivacao, $relacionamentointerpesssoal,
						                           $medcontinuo, $substanciasintorpecentes);

						$CandidatoAtualizado = atualizarCandidato($id, $organizapensamento, $clarezaresposta, $facilexpressao,
						                           $ausenciagagueira, $vidaegressa, $nivelmotivacao, $relacionamentointerpesssoal,
						                           $medcontinuo, $substanciasintorpecentes, $entrevistador,$Resultado);
  				  if ($CandidatoAtualizado) {
							echo"<script language='javascript' type='text/javascript'>alert('Inscrição Atualizada!');</script>";
						}
						else {
							echo"<script language='javascript' type='text/javascript'>alert('Dados não Atualizados! Verificar com administrador!');</script>";
						}
					}
					?>
				</tbody>
			</div>
		 </table>
		 <div>
			 <BR>
			<hr>
			<h1 class="certertittlescand"><CENTER>Candidatos Editados</CENTER></h1>
      <?php
  			if ($IDUsuario == -1) {?>
					<div class="form">
					   <label for="cidade">Cidade:</label>
					   <select class="form" style="width:200px" name="cidade">
					     <option value="Altamira">  Altamira </option>
					     <option value="Belem">     Belém    </option>
					     <option value="Castanhal"> Castanhal</option>
					     <option value="Itaituba">  Itaituba </option>
							 <option value="Maraba">    Marabá   </option>
							 <option value="Santarem">  Santarém </option>
					   </select>
						 <input type="submit" name="btnPesquisarCidade" class="btn btn-primary btn-lg" value="Pesquisar"/>
						 </div>
					<?php }
				 ?>
		 </div>
		<div>
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
					 <?php
			  			if ($IDUsuario == -1)
			    			echo "<th scope="."col"." style="."text-align: center".">Resultado</th>";
			  			?>
				 </tr>
			 </thead>
			 <tbody>
				 <?php
          if (isset ($_POST["btnPesquisarCidade"])) {
						$Cidade = $_POST["cidade"];
						$arrayCandidatos = listarcandidatoCidade($Cidade);
					}
					else {
						$arrayCandidatos = listarcandidato($IDUsuario);
					}
	        foreach ($arrayCandidatos as $itemcandidato)
	        {
						$organizapensamento  					= ($itemcandidato['ORGANIZAPENSAMENTO']==1)?("Apto"):("Inapto");
						$clarezaresposta     					= ($itemcandidato['CLAREZARESPOSTA']==1)?("Apto"):("Inapto");
						$facilexpressao      					= ($itemcandidato['FACILEXPRESSAO']==1)?("Apto"):("Inapto");
						$ausenciagagueira    					= ($itemcandidato['AUSENGAGUEIRA']==1)?("Apto"):("Inapto");
						$vidaegressa 				 					= ($itemcandidato['VIDAEGRESSA']==1)?("Apto"):("Inapto");
						$nivelmotivacao 		 					= ($itemcandidato['NIVELMOTIVACAO']==1)?("Apto"):("Inapto");
						$relacionamentointerpesssoal  = ($itemcandidato['RELACIONAMENTOINTERPESSOAL']==1)?("Apto"):("Inapto");
						$medcontinuo  								= ($itemcandidato['MEDCONTINUO']==1)?("Apto"):("Inapto");
						$substanciasintorpecentes  		= ($itemcandidato['SUBSTANCIASINTORPECENTES']==1)?("Apto"):("Inapto");
						$aprovado                     = ($itemcandidato['resultado']==1)?("Aprovado"):("Reprovado");


	            echo "<tr><th scope=\"row\">".utf8_encode($itemcandidato['nome'])."</th>";
							echo "<td style=\"text-align: center\">".$itemcandidato['inscricao']."</td>";
							echo "<td style=\"text-align: center\">".$itemcandidato['cpf']."</td>";
	            echo "<td style=\"text-align: center\">".$organizapensamento."</td>";
							echo "<td style=\"text-align: center\">".$clarezaresposta."</td>";
							echo "<td style=\"text-align: center\">".$facilexpressao."</td>";
							echo "<td style=\"text-align: center\">".$ausenciagagueira."</td>";
							echo "<td style=\"text-align: center\">".$vidaegressa."</td>";
							echo "<td style=\"text-align: center\">".$nivelmotivacao."</td>";
							echo "<td style=\"text-align: center\">".$relacionamentointerpesssoal."</td>";
							echo "<td style=\"text-align: center\">".$medcontinuo."</td>";
							echo "<td style=\"text-align: center\">".$substanciasintorpecentes."</td>";
							if ($IDUsuario == -1)	{
    							echo "<td style=\"text-align: center\">".$aprovado."</td>";
							}
	            echo "</tr>";
	        }
	         ?>
				 </tbody>
	    </table>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		</div>
		</form>
	</body>
</html>
