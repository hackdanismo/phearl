<?php
// File will open in MAMP PRO: https://pherl.local:8890/

// Include the config file for the database credentials - this is in the Database class
// require_once "config.php";
require_once "core/database.php";

// Instantiate the Database class
$database = new Database();
// Connect to the database using the connect() method in the Database class
$database->connect();
// Connect to the database
// $conn = $database->getConnection();
// $database->getConnection();