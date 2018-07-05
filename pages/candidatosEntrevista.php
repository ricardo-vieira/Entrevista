<?php
  session_start();
  require_once '../dao/DAOCandidatos.php';
  require_once '../dao/DAOUsuarios.php';
  $IDUsuario = $_COOKIE["ID"];

  //Valores padão dos filtros
  $filtroCidade = isset($_SESSION['filtroCidade']) ? $_SESSION['filtroCidade'] : "";
  $filtroEntrevistador = isset($_SESSION['filtroEntrevistador']) ? $_SESSION['filtroEntrevistador'] : -1;

  if (isset ($_POST["btnFiltroPesquisar"])){
    //usados como parâmetro para o método listarcandidatos;
    $filtroCidade        = $_POST["selectFiltroCidade"];
    $filtroEntrevistador = $_POST['selectFiltroEntrevistador'];

    //usados para controlar os filtros;
    unset($_SESSION['filtroCidade']);
    unset($_SESSION['filtroEntrevistador']);
    $_SESSION['filtroCidade']        = $_POST["selectFiltroCidade"];;
    $_SESSION['filtroEntrevistador'] = $_POST['selectFiltroEntrevistador'];
  }

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

      if($IDUsuario == -1){ ?>
        <h4 align="right">Usuário: Jorge<h4><?php }
        else{ ?>
          <h4 align="right">Usuário: <?php echo $nomeusuario['NOME'] ?><h4>
          <?php }?>

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
                <tbody>
                  <?php
                  $selectedorganizapensamento           = ($CandidatoEditar['ORGANIZAPENSAMENTO']==1)?("selected"):("");
                  $selectedclarezaresposta              = ($CandidatoEditar['CLAREZARESPOSTA']==1)?("selected"):("");
                  $selectedfacilexpressao               = ($CandidatoEditar['FACILEXPRESSAO']==1)?("selected"):("");
                  $selectedausenciagagueira             = ($CandidatoEditar['AUSENGAGUEIRA']==1)?("selected"):("");
                  $selectedvidaegressa                  = ($CandidatoEditar['VIDAEGRESSA']==1)?("selected"):("");
                  $selectednivelmotivacao               = ($CandidatoEditar['NIVELMOTIVACAO']==1)?("selected"):("");
                  $selectedrelacionamentointerpesssoal  = ($CandidatoEditar['RELACIONAMENTOINTERPESSOAL']==1)?("selected"):("");
                  $selectedmedcontinuo                  = ($CandidatoEditar['MEDCONTINUO']==1)?("selected"):("");
                  $selectedsubstanciasintorpecentes     = ($CandidatoEditar['SUBSTANCIASINTORPECENTES']==1)?("selected"):("");

                  ?>

                  <input type="hidden" name="HDIDCandidatoEditar" value=<?php echo $CandidatoEditar['ID'] ?>/>
                  <th scope="row"><?php echo utf8_encode($CandidatoEditar['nome']) ?></th>
                  <td style="text-align: center"><?php echo $CandidatoEditar['inscricao'] ?></td>
                  <td style="text-align: center"><?php echo $CandidatoEditar['cpf'] ?></td>
                  <td>
                    <select name="selectOP" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedorganizapensamento ?>>Apto</option>
                    </select>
                  </td>
                  <td>
                    <select name="selectCR" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedclarezaresposta ?>>Apto</option>
                    </select>
                  </td>
                  <td>
                    <select name="selectFE" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedfacilexpressao ?>>Apto</option>
                    </td>
                    <td>
                      <select name="selectAG" class="form-control form-control-lg">
                        <option value = 0 >Inapto</option>
                        <option value = 1 <?php echo $selectedausenciagagueira ?>>Apto</option>
                      </select>
                    </td>
                    <td><select name="selectVE" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedvidaegressa ?>>Apto</option>
                    </select>
                  </td>
                  <td>
                    <select name="selectNM" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectednivelmotivacao ?>>Apto</option>
                    </select>
                  </td>
                  <td>
                    <select name="selectRI" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedrelacionamentointerpesssoal ?>>Apto</option>
                    </select>
                  </td>
                  <td>
                    <select name="selectMC" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedmedcontinuo ?>>Apto</option>
                    </select>
                  </td>
                  <td>
                    <select name="selectSE" class="form-control form-control-lg">
                      <option value = 0 >Inapto</option>
                      <option value = 1 <?php echo $selectedsubstanciasintorpecentes ?>>Apto</option>
                    </select>
                  </td>
                </tr>

              <?php		}
            }

            //se o btnSalvar for invocado no post e a variavel hideen for invocada no post
            if (isset($_POST["btnSalvar"]) && isset($_POST["HDIDCandidatoEditar"]))
            {
              $id 													= $_POST["HDIDCandidatoEditar"];
              $organizapensamento   				= $_POST["selectOP"];
              $clarezaresposta  						= $_POST["selectCR"];
              $facilexpressao  							= $_POST["selectFE"];
              $ausenciagagueira 						= $_POST["selectAG"];
              $vidaegressa 									= $_POST["selectVE"];
              $nivelmotivacao 							= $_POST["selectNM"];
              $relacionamentointerpesssoal  = $_POST["selectRI"];
              $medcontinuo  								= $_POST["selectMC"];
              $substanciasintorpecentes  		= $_POST["selectSE"];
              $entrevistador  							= $IDUsuario;

              $Resultado = DefinirResultado ($organizapensamento, $clarezaresposta, $facilexpressao,
              $ausenciagagueira, $vidaegressa, $nivelmotivacao, $relacionamentointerpesssoal,
              $medcontinuo, $substanciasintorpecentes);

              $CandidatoAtualizado = atualizarCandidato($id, $organizapensamento, $clarezaresposta, $facilexpressao,
              $ausenciagagueira, $vidaegressa, $nivelmotivacao, $relacionamentointerpesssoal,
              $medcontinuo, $substanciasintorpecentes, $entrevistador,$Resultado);

              if ($CandidatoAtualizado) { ?>
                <script language='javascript' type='text/javascript'>
                alert('Inscrição Atualizada!');
                </script>

              <?php } else { ?>
                <script language='javascript' type='text/javascript'>
                alert('Dados não Atualizados! Verificar com administrador!');
                </script>
              <?php }
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
          if ($IDUsuario == -1) {

            ?>
            <div class="form">
              <label for="cidade">Cidade:</label>

              <select class="form" style="width:200px" name="selectFiltroCidade">
                <option value="" <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "") ? "selected" : "" ?>>Todas</option>
                <option value="Altamira"  <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "Altamira") ? "selected" : "" ?>>Altamira</option>
                <option value="Belem"     <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "Belem") ? "selected" : "" ?>>Belém</option>
                <option value="Castanhal" <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "Castanhal") ? "selected" : "" ?>>Castanhal</option>
                <option value="Itaituba"  <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "Itaituba") ? "selected" : "" ?>>Itaituba</option>
                <option value="Maraba"    <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "Maraba") ? "selected" : "" ?>>Marabá</option>
                <option value="Santarem"  <?php echo (isset($_SESSION["filtroCidade"]) && $_SESSION["filtroCidade"] == "Santarem") ? "selected" : "" ?>>Santarém</option>
              </select>

              <label for="cidade">Entrevistador:</label>

              <select class="form" style="width:200px" name="selectFiltroEntrevistador">
                <option value=-1 selected>Todos</option>
                <?php
                $arrayEntrevistadores = listarEntrevistadores();
                foreach ($arrayEntrevistadores as $itementrevistador) { ?>
                  <option value=<?php echo $itementrevistador['ID'] ?> <?php echo (isset($_SESSION["filtroEntrevistador"]) && $_SESSION["filtroEntrevistador"] == $itementrevistador['ID']) ? "selected"  : "" ?>><?php echo $itementrevistador['NOME'] ?></option>
                <?php } ?>
              </select>
              <input type="submit" name="btnFiltroPesquisar" class="btn btn-primary btn-lg" value="Pesquisar"/>
            </div>
          <?php }
          ?>
        </div>
        <div>
          <table class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th scope="col" style="text-align: center; width:20%">Nome</th>
                <th scope="col" style="text-align: center">Inscrição</th>
                <th scope="col" style="text-align: center">CPF</th>
                <th scope="col" style="text-align: center">Cidade</th>
                <th scope="col" style="text-align: center">Organização do Pensamento</th>
                <th scope="col" style="text-align: center">Clareza de Resposta</th>
                <th scope="col" style="text-align: center">Facilidade de Expressão</th>
                <th scope="col" style="text-align: center">Ausencia de Gagueira</th>
                <th scope="col" style="text-align: center">Vida Egressa</th>
                <th scope="col" style="text-align: center">Nivel de Motivação</th>
                <th scope="col" style="text-align: center">Relacionamento Interpessoal</th>
                <th scope="col" style="text-align: center">Medicamento de Uso Contínuo</th>
                <th scope="col" style="text-align: center">Substâncias Entorpecentes</th>

                <?php if ($IDUsuario == -1) {?>
                  <th scope="col" style="text-align: center; width:10%">Entrevistador</th>
                  <th scope="col" style="text-align: center; width:25%">Data Atendimento</th>
                  <th scope="col" style="text-align: center">Resultado</th>
                <?php }?>
              </tr>
            </thead>
            <tbody>
              <?php

              $arrayCandidatos = listarCandidatos($filtroCidade, $filtroEntrevistador);

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
                ?>

                <tr>
                  <th scope="row"><?php echo utf8_encode($itemcandidato['nome']) ?></th>
                  <td style="text-align: center"><?php echo $itemcandidato['inscricao'] ?></td>
                  <td style="text-align: center"><?php echo $itemcandidato['cpf'] ?></td>
                  <td style="text-align: center"><?php echo utf8_encode($itemcandidato['cidade']) ?></td>
                  <td style="text-align: center"><?php echo $organizapensamento ?></td>
                  <td style="text-align: center"><?php echo $clarezaresposta ?></td>
                  <td style="text-align: center"><?php echo $facilexpressao ?></td>
                  <td style="text-align: center"><?php echo $vidaegressa ?></td>
                  <td style="text-align: center"><?php echo $ausenciagagueira ?></td>
                  <td style="text-align: center"><?php echo $nivelmotivacao ?></td>
                  <td style="text-align: center"><?php echo $medcontinuo ?></td>
                  <td style="text-align: center"><?php echo $relacionamentointerpesssoal ?></td>
                  <td style="text-align: center"><?php echo $substanciasintorpecentes ?></td>

                  <?php if ($IDUsuario == -1)	{ ?>
                    <td style="text-align: center"><?php echo $itemcandidato['NOMEENTREVISTADOR'] ?></td>
                    <td style="text-align: center"><?php echo $itemcandidato['data']." ".$itemcandidato['horario'] ?></td>
                    <td style="text-align: center"><?php echo $aprovado ?></td>
                  <?php } ?>
                </tr>

              <?php } // fim do laco foreach ?>

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
