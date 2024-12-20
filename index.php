<?php
// File will open in MAMP PRO locally: https://pherl.local:8890/

// Include the Database class to connect to the database
require_once "core/database.php";

// Instantiate the Database class
$database = new Database();
// Connect to the database using the connect() method in the Database class
$database->connect();