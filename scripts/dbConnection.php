<?php
    $dbhost = "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbuser = "rtecz2xfd4vlc1fm";
    $dbpass = "qy271l5uzj2a78qv";
    $db = "vk14drj3tmp2hdan";
    
    // Create connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn
?>