<?php
    $db = require("./dbConnection.php");
    $tabelaUsuarios = require("../queries/tabelaUsuarios.sql")
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $baseUrl = $_SERVER["HTTP_HOST"];
    $senhaCriptografada = sha1($senha);
    $qtdLetras = strlen($senhaCriptografada);

    $query = "Insert into Usuarios(Nome, Email, Senha) Values('$nome', '$email', '$senhaCriptografada');";
    if($db->query($tabelaUsuarios);) {
        if($db->query($query)) {
            echo("http://$baseUrl/index.php?s=1");
            header("Location: http://$baseUrl/index.php?s=1");
            echo "Registro Realizado com sucesso";
        }else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }

    $db->close();
?>