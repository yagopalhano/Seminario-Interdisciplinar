<?php 
    session_start();
    $db = require("./dbConnection.php");
    $baseUrl = $_SERVER["HTTP_HOST"];
    $password = sha1($_POST["password"]);
    $login = $_POST["email"];

    $query = "SELECT Id, Nome FROM Usuarios WHERE Email = '$login' AND Senha = '$password';";

    $result = $db->query($query);

    if($result) {
        $response = mysqli_fetch_assoc($result);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
        $_SESSION["responseLogin"] = $response;
        $_SESSION["Nome"] = $response["Nome"];
        $_SESSION["Id"] = $response["Id"];
        $_SESSION["logged"] = true;
        header("Location: http://$baseUrl/transacoes.php");
    }else{
        echo "Error: " . $query . "<br>" . $conn->error;
        $_SESSION["logged"] = false;
        header("Location: http://$baseUrl/index.php?login=1");
    }

    $db->close();
?>