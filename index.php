<?php
    // File will open in MAMP PRO: https://pherl.local:8890/

    // Database connection variables
    $hostname = "localhost";
    $username = "username";
    $password = "password";
    $database = "phearl_db";

    try {
        // Create a PDO instance with MySQL DSN (Data Source Name)
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // Set the PDO error mode to exception for better error handling
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        // TODO: remove echo statement and replace with loggin mechanism
        echo "Connection to the database failed: " . $e->getMessage();
    }