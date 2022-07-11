<?php
    function OpenCon()
    {
        $dbhost = "lcpbq9az4jklobvq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $dbuser = "rtecz2xfd4vlc1fm";
        $dbpass = "qy271l5uzj2a78qv";
        $db = "vk14drj3tmp2hdan";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }    
?>