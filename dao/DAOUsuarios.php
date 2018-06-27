<?php
require_once 'conexao.php';

function listarUsuarios()
{
    $pdo = conectar();
    
    try 
    {
        $querylistar = $pdo->query("SELECT * FROM usuarios");
        $lista = $querylistar->fetchAll(PDO::FETCH_ASSOC);
        
        return $lista;
    } catch (Exception $ex) 
    {
        echo "Erro: " . $ex->getMessage();
    }
}

function unicoUsuario($id)
{
    $pdo = conectar();
    
    try 
    {
        $querylistar = $pdo->prepare("SELECT * FROM usuarios where id = ?");
        $querylistar->bindValue(1, $id, PDO::PARAM_INT);
        $querylistar->execute();
        $unico = $querylistar->fetch();
        
        return $unico;
        
    } catch (Exception $ex)
    {
        echo $ex->getMessage();
    }
}

function inserirUsuario($nome, $usuario, $senha, $adm)
{
    $pdo = conectar();
    
    try
    {
        $queryinserir = $pdo->prepare("INSERT INTO usuarios(nome, usuario, senha, adm) VALUES (?,?,?,?)");
        $queryinserir->bindValue(1, $nome);
        $queryinserir->bindValue(2, $usuario);
        $queryinserir->bindValue(3, $senha);
        $queryinserir->bindValue(4, $adm);
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

function atualizarUsuario($id, $nome, $usuario, $senha, $adm)
{
    $pdo = conectar();
    
    try
    {
        $queryatualizar = $pdo->prepare("UPDATE usuarios SET nome = ?, usuario = ?, senha = ?, adm = ? WHERE id = ?");
        $queryatualizar->bindValue(1, $nome);
        $queryatualizar->bindValue(2, $usuario);
        $queryatualizar->bindValue(3, $senha);
        $queryatualizar->bindValue(4, $adm);
        $queryatualizar->bindValue(5, $id);
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

function excluirUsuario($id)
{
    $pdo = conectar();
    
    try
    {
        $queryexcluir = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
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
