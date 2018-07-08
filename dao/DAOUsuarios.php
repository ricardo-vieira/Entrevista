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

function inserirUsuario($nome, $usuario, $senha, $telefone, $email, $crp, $cpf)
{
    $pdo = conectar();

    try
    {
        $queryinserir = $pdo->prepare("INSERT INTO usuarios(nome, usuario, senha,telefone, email, crp, cpf) VALUES (?,?,?,?,?,?,?)");
        $queryinserir->bindValue(1, $nome);
        $queryinserir->bindValue(2, $usuario);
        $queryinserir->bindValue(3, $senha);
        $queryinserir->bindValue(4, $telefone);
        $queryinserir->bindValue(5, $email);
        $queryinserir->bindValue(6, $crp);
        $queryinserir->bindValue(7, $cpf);
        $queryinserir->execute();

        if ($queryinserir->rowCount() > 0){
          return true;

        }else{
          return false;

        }

    } catch (Exception $ex) {
        echo "Erro: " . $ex->getMessage();
    }
}

function atualizarUsuario($id, $nome, $usuario, $senha,$telefone, $email, $crp, $cpf)
{
    $pdo = conectar();

    try
    {
        $queryatualizar = $pdo->prepare("UPDATE usuarios SET nome = :nome, "
                                                             ."usuario = :usuario, "
                                                             ."senha = :senha, "
                                                             ."telefone = :telefone, "
                                                             ."email = :email, "
                                                             ."crp = :crp, "
                                                             ."cpf = :cpf "
                                        ."WHERE id = :id");

        $queryatualizar->bindValue(":nome", $nome);
        $queryatualizar->bindValue(":usuario", $usuario);
        $queryatualizar->bindValue(":senha", $senha);
        $queryatualizar->bindValue(":telefone", $telefone);
        $queryatualizar->bindValue(":email", $email);
        $queryatualizar->bindValue(":crp", $crp);
        $queryatualizar->bindValue(":cpf", $cpf);
        $queryatualizar->bindValue(":id", $id);

        $queryatualizar->execute();

        if ($queryatualizar->rowCount() > 0)
                return true;
        else
                return false;

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

function encontraUsuarios($usuario, $senha)
{
    $pdo = conectar();

    try
    {
        $querylistar = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
        $querylistar->bindValue(1,$usuario, PDO::PARAM_STR);
        $querylistar->bindValue(2,$senha, PDO::PARAM_STR);
        $querylistar->execute();
        $lista = $querylistar->fetch();
        if ($querylistar->rowCount() < 1) {
          return;
        } else {
          return $lista;
        }
    } catch (Exception $ex)
    {
        echo "Erro: " . $ex->getMessage();
    }
}

function listarEntrevistadores()
{
    $pdo = conectar();

    try
    {
        $querylistar = $pdo->query("SELECT * FROM usuarios where usuarios.id <> -1");
        $lista = $querylistar->fetchAll(PDO::FETCH_ASSOC);

        return $lista;
    } catch (Exception $ex)
    {
        echo "Erro: " . $ex->getMessage();
    }
}
