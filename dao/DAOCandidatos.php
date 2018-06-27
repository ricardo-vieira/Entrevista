<?php
require_once 'conexao.php';

function listarCandidatos()
{
    $pdo = conectar();
    
    try 
    {
        $querylistar = $pdo->query("SELECT * FROM candidatos");
        $lista = $querylistar->fetchAll(PDO::FETCH_ASSOC);
        
        return $lista;
    } catch (Exception $ex) 
    {
        echo "Erro: " . $ex->getMessage();
    }
}

function unicoCandidato($id)
{
    $pdo = conectar();
    
    try 
    {
        $querylistar = $pdo->prepare("SELECT * FROM candidatos where id = ?");
        $querylistar->bindValue(1, $id, PDO::PARAM_INT);
        $querylistar->execute();
        $unico = $querylistar->fetch();
        
        return $unico;
        
    } catch (Exception $ex)
    {
        echo $ex->getMessage();
    }
}

function inserirCandidato($nome, $cpf, $sexo, $matricula, $organizapensamento, $clarezaresposta, $facilexpressao, 
                          $ausenciagagueira, $vidaegressa, $nivelmotivacao, $relacionamentointerpesssoal, 
                          $medcontinuo, $substanciasintorpecentes, $entrevistador)
{
    $pdo = conectar();
    
    try
    {
        $queryinserir = $pdo->prepare("INSERT INTO candidatos (NOME, CPF, SEXO, MATRICULA, ORGANIZAPENSAMENTO, CLAREZARESPOSTA, FACILEXPRESSAO,"
                                      . " AUSENGAGUEIRA, VIDAEGRESSA, NIVELMOTIVACAO, RELACIONAMENTOINTERPESSOAL,"
                                      . " MEDCONTINUO, SUBSTANCIASINTORPECENTES, ENTREVISTADOR) "
                                      . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $queryinserir->bindValue( 1, $nome);
        $queryinserir->bindValue( 2, $cpf);
        $queryinserir->bindValue( 3, $sexo);
        $queryinserir->bindValue( 4, $matricula);
        $queryinserir->bindValue( 5, $organizapensamento);
        $queryinserir->bindValue( 6, $clarezaresposta);
        $queryinserir->bindValue( 7, $facilexpressao);
        $queryinserir->bindValue( 8, $ausenciagagueira);
        $queryinserir->bindValue( 9, $vidaegressa);
        $queryinserir->bindValue(10, $nivelmotivacao);
        $queryinserir->bindValue(11, $relacionamentointerpesssoal);
        $queryinserir->bindValue(12, $medcontinuo);
        $queryinserir->bindValue(13, $substanciasintorpecentes);
        $queryinserir->bindValue(14, $entrevistador);
        $queryinserir->execute();
        
        if ($queryinserir->rowCount() > 0):
                return true;
        else:
                return false;
        endif;
    } catch (Exception $ex) {
        echo "Erro: " . $ex->getMessage();
    }
}


function atualizarCandidato($id, $nome, $cpf, $sexo, $matricula, $organizapensamento, $clarezaresposta, $facilexpressao, 
                          $ausenciagagueira, $vidaegressa, $nivelmotivacao, $relacionamentointerpesssoal, 
                          $medcontinuo, $substanciasintorpecentes, $entrevistador)
{
    $pdo = conectar();
    
    try
    {
        $queryatualizar = $pdo->prepare("UPDATE candidatos SET  NOME = ?, CPF = ?, SEXO = ?, MATRICULA = ?, ORGANIZAPENSAMENTO = ?, CLAREZARESPOSTA = ?, FACILEXPRESSAO = ?,"
                                        . " AUSENGAGUEIRA = ?, VIDAEGRESSA = ?, NIVELMOTIVACAO = ?, RELACIONAMENTOINTERPESSOAL = ?, MEDCONTINUO = ?,"
                                        . " SUBSTANCIASINTORPECENTES = ?, ENTREVISTADOR"
                                        . " WHERE ID = ?");
        $queryatualizar->bindValue( 1, $nome);
        $queryatualizar->bindValue( 2, $cpf);
        $queryatualizar->bindValue( 3, $sexo);
        $queryatualizar->bindValue( 4, $matricula);
        $queryatualizar->bindValue( 5, $organizapensamento);
        $queryatualizar->bindValue( 6, $clarezaresposta);
        $queryatualizar->bindValue( 7, $facilexpressao);
        $queryatualizar->bindValue( 8, $ausenciagagueira);
        $queryatualizar->bindValue( 9, $vidaegressa);
        $queryatualizar->bindValue(10, $nivelmotivacao);
        $queryatualizar->bindValue(11, $relacionamentointerpesssoal);
        $queryatualizar->bindValue(12, $medcontinuo);
        $queryatualizar->bindValue(13, $substanciasintorpecentes);
        $queryatualizar->bindValue(14, $entrevistador);
        $queryatualizar->bindValue(15, $id);
        $queryatualizar->execute();
        
        if ($queryatualizar->rowCount() > 0):
                return true;
        else:
                return false;
        endif;
    } catch (Exception $ex) {
        echo "Erro: " . $ex->getMessage();
    }
}

function excluirCandidatos($id)
{
    $pdo = conectar();
    
    try
    {
        $queryexcluir = $pdo->prepare("DELETE FROM candidatos WHERE id = ?");
        $queryexcluir->bindValue(1, $id);
        $queryexcluir->execute();
        
        if ($queryexcluir->rowCount() > 0):
                return true;
        else:
                return false;
        endif;
    } catch (Exception $ex) {
        echo "Erro: " . $ex->getMessage();
    }
}
