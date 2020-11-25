<?php
    $servername = "localhost";
    $usernameDP = "root";
    $passwordDP = "";
    $dbname = "classroom";
    
    // Create connection
    $conn = new mysqli($servername, $usernameDP, $passwordDP, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>