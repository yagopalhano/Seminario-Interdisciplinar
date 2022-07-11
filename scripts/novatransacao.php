<?php 
    $db = require("dbConnection.php");
   
    $baseUrl = $_SERVER["HTTP_HOST"];
    $id = $_POST["id"];  
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $tipo = $_POST["tipo"];

    $query = "INSERT INTO Transacoes(Descricao, Valor, Id_Usuario, Tipo_Transacao) VALUES('$descricao', $valor, $id, $tipo)";
    
    if($db->query($query)) {
        header("Location: http://$baseUrl/transacoes.php");
    }else {
        echo "Falha ao cadastrar!";        
    }


?>