<?php
    // File will open in MAMP PRO: https://pherl.local:8890/

    // Include the config file for the database credentials
    require_once "config.php";

    try {
        // Create a PDO instance with MySQL DSN (Data Source Name)
        $conn = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception for better error handling
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        // TODO: remove echo statement and replace with logging mechanism
        echo "Connection to the database failed: " . $e->getMessage();
    }