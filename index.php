<?php
// File will open in MAMP PRO locally: https://pherl.local:8890/

// Include the Database class to connect to the database
// require_once "core/database.php";

// Instantiate the Database class
// $database = new Database();
// Connect to the database using the connect() method in the Database class
// $database->connect();

// Include the Table class to connect to the database and create a table
require_once "core/table.php";

// Instantiate the Table class. This will connect to the database
// $table = new Table();    // No longer needed as this is now a static method
// Create a table named "test-table" in the database
// $table->addTable("test-table");  // No longer needed as this is now a static method
Table::addTable("test-db-table");