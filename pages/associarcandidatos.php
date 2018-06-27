<?php require_once '../dao/DAOUsuarios.php'; 
      require_once '../dao/DAOCandidatos.php';
      
      if (isset($_POST['btnlistar'])):
          $identrevistador = $_POST['selpsico'];
      endif;
      
      if (isset($_POST['btnsalvar'])):
          $arrayCandidatos = listarCandidatos();
      
          foreach ($arrayCandidatos as $itemcandidato):
              
          endforeach;
      endif;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Associar Candidatos</title>
    </head>
    <body>
        <form method="POST">
                    <table>
            <tr>
                <td colspan="3" style="text-align: center">Associar Candidados a Entrevistador</td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <select name="selpsico" style="width: 300px">
                        <?php
                            $arrayentrevistadores = listarUsuarios();
                            foreach ($arrayentrevistadores as $itementrevistador)
                            {
                                echo "<option value=\"".$itementrevistador['ID']."\">".$itementrevistador['NOME']."</option>";
                            }
                            
                        ?>
                    </select>
                </td>
                <td>
                    <input type="submit" name="btnlistar" value="Listar" />
                    <?php
                        if (isset($_POST['btnlistar'])):
                            echo '<input type="submit" name="btnsalvar" value="salvar" />';
                        endif;
                    ?>
                </td>
            </tr>
            <tr>
                <!-- Aqui esta a tabela de informacoes de participantes -->
            <table>
                <tr>
                    <td>Check</td>
                    <td style="width: 300px">Participante</td>
                </tr>
                <?php

                if (isset($_POST['btnlistar'])):
                    $arraycandidatos = listarCandidatos();

                foreach ($arraycandidatos as $itemcandidato):
                        $marcado = ($identrevistador == $itemcandidato['ENTREVISTADOR']) ? ("checked") : ("");

                echo "<tr>";
                    echo '<td><input type="checkbox" name="cboselecionar'.$itemcandidato['ID'].'" value="'.$itemcandidato['ID'].'"'.$marcado.'></input></td>';
                        echo '<td>'.$itemcandidato["nome"].'</td>';
                    echo "</tr>";
                    
                    endforeach;
                endif;
                ?>
            </table>
            </tr>
        </table>
            
    </form>
    </body>
</html>
