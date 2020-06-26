<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Methods: POST');
   
    $hostName = "";
    $dbName   = "";
    $userName = "";
    $password = "";

    try {
        
        if($_SERVER['REQUEST_METHOD'] !== 'POST')
            throw new Exception('O método da requisição precisa ser POST');

        $dados = json_decode(file_get_contents("php://input"), true);
                
        $pdo = new PDO("mysql:host=$hostName;dbname=$dbName",$userName,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $pdo->prepare(

            "INSERT INTO contact ( origin, destiny,message, ip ) VALUES (
                
                :origin, :destiny,:message, :ip

            )"

        );
        
        $sql->bindParam(":origin", $dados['origin']);
        $sql->bindParam(":destiny", $dados['destiny']);
        $sql->bindParam(":message", $dados['message']);
        $sql->bindParam(":ip", $_SERVER['REMOTE_ADDR']);

        $sql->execute();

    }catch(PDOException $e){
        
        echo "Erro na conexão: " . $e->getMessage();

    }catch(Exception $e){
        
        echo "Erro: " . $e->getMessage();
    }