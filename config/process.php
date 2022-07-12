<?php
session_start();

include_once("connection.php");
include_once("url.php");

$data = $_POST;
// Modificações no banco
if (!empty($data)) {
    //print_r($data);
    //exit; //Para ver se dados estão vindo via post

    //Criar contato
    if ($data["type"] === "create") {

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO agenda.contacts (name, phone, observations) VALUES (:name, :phone, :observations)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso";

        } catch (PDOException $e) {
            //Erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
//Edição de dados
    } else if ($data["type"] === "edit"){        

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data["id"];
        
        
        $query = "UPDATE agenda.contacts 
                  SET name = :name, phone = :phone, observations = :observations
                  WHERE id = :id";
                  
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato atualizado com sucesso";

        } catch (PDOException $e) {
            //Erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }

    // deletar contatos
    } else if($data["type"] === "delete") {  

        $id = $data["id"];        
        //print_r($id);
        //exit; //Para ver se dados estão vindo via post

        $query = "DELETE FROM agenda.contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);        

        try {

            $stmt->execute();
            $_SESSION["msg"] = "Contato removido com sucesso";

        } catch (PDOException $e) {
            //Erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        } 
    }  

    //Redireciona para a Home
    header("Location:" . $BASE_URL . "../index.php");

    //seleção de dados
} else {

    $id;

    if (!empty($_GET)) {
        $id = $_GET["id"];
    }

    //Retorna dados do contato especifico
    if (!empty($id)) {

        $query = "SELECT * FROM agenda.contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $contact = $stmt->fetch();
    } else {

        //Retorna todos os contatos
        $contacts = [];
        $query = "SELECT * FROM agenda.contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $contacts = $stmt->fetchAll();
    }
}

//Fechar a conexão
$conn = null;
