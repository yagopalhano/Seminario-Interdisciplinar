<?php
    $dbhost = "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbuser = "rtecz2xfd4vlc1fm";
    $dbpass = "qy271l5uzj2a78qv";
    $db = "vk14drj3tmp2hdan";

    //Queries
    $tabelaTipoTransacao = require("../queries/tabelaTipoTransacao.sql");
    $tabelaUsuarios = require("../queries/tabelaUsuarios.sql");
    
    // Create connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    if (mysqli_query($conn, $tabelaUsuarios)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 
    
    return $conn
?>