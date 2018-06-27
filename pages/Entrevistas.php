<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultados das Entrevistas</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>
  <body>
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
        $arrayCandidatos = listarCandidatos();
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
  </body>
</html>
