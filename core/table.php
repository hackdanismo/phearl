<?php
// Include the Database class file
require_once "database.php";

class Table extends Database {
    // Method to create a new table in the database
    public static function addTable($tableName) {
        // Ensure the table name is not empty and is a valid string
        if (empty($tableName) || !is_string($tableName)) {
            throw new InvalidArgumentException("Invalid table name.");
        }

        // Create a new instance of the Database class to connect to the database
        $instance = new self();
        $conn = $instance->connect();

        // Check if the table already exists
        $query = "SHOW TABLES LIKE :tableName";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":tableName", $tableName, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // If the table already exists, exit the method
            return;
        }

        // Create the table in the database if it doesn't already exist
        $sql = "CREATE TABLE `" . $tableName . "` (
            id INT(11) AUTO_INCREMENT PRIMARY KEY
        ) ENGINE=InnoDB;";

        try {
            // Execute the SQL query to create the table
            $conn->exec($sql);
        } catch (PDOException $e) {
            // TODO: Implement an improved logging mechanism to replace the use of echo
            echo "Error creating the table: " . $e->getMessage();
        }
    }

    // Method to delete/remove a table from the database
    public static function deleteTable($tableName) {
        // Ensure the table name is not empty and is a valid string
        if (empty($tableName) || !is_string($tableName)) {
            throw new InvalidArgumentException("Invalid table name.");
        }

        // Create a new instance of the Database class to connect to the database
        $instance = new self();
        $conn = $instance->connect();

        // SQL to drop the table from the database if it exists
        $sql = "DROP TABLE IF EXISTS `" . $tableName . "`";

        try {
            // Execute the SQL query to create the table
            $conn->exec($sql);
        } catch (PDOException $e) {
            // TODO: Implement an improved logging mechanism to replace the use of echo
            echo "Error deleting the table: " . $e->getMessage();
        }
    }
}