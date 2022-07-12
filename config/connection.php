<?php
    $host = "localhost";
    $dbname = "agenda";
    $user = "root";
    $pass = "";

    try{

        $conn = new PDO("mysql:host=$host;dbaname=$dbname", $user, $pass);

        //Ativar modo de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        //Erro na conexão
         $error = $e->getMessage();
         echo "Erro: $error";
}
