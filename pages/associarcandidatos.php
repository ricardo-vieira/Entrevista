<?php require_once '../dao/DAOUsuarios.php'; ?>
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
                    <select style="width: 300px">
                        <?php
                            $arrayentrevistadores = listarUsuarios();
                            foreach ($arrayentrevistadores as $itementrevistador)
                            {
                                echo "<option value=\"".$itementrevistador['ID']."\">".$itementrevistador['NOME']."</option>";
                            }
                            
                        ?>
                    </select>
                </td>
                <td><input type="submit" value="Listar"</td>
            </tr>
            <tr>
                <td>Check</td>
                <td colspan="2">Participante</td>
            </tr>
        </table>
            
    </form>
    </body>
</html>
