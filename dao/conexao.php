<?php

function conectar()
{

    $HOST = 'localhost';
    $USUARIO = 'root';
    $SENHA = '';
    $BD = 'dbsusipe';

    try
    {
        $dsn = "mysql:host=".$HOST.";dbname=".$BD;
        $conexao = new PDO($dsn, $USUARIO, $SENHA);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conexao;
    } catch (PDOException $ex) {
        echo "Erro na conexao com o banco de dados ".$ex->getMessage();
    }
}