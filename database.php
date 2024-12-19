<?php
class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    // Constructor initializes and creates the connection to the database
    public function __construct($host = null, $dbName = null, $username = null, $password = null) {
        // Include the configuration file with the database credentials
        require_once "config.php";

        // Use provided parameters or fallback to constants from the configuration file
        $this->host = $host ?? DB_HOSTNAME;
        $this->dbName = $dbName ?? DB_DATABASE;
        $this->username = $username ?? DB_USERNAME;
        $this->password = $password ?? DB_PASSWORD;

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // TODO: Implement an improved logging mechanism to replace the use of echo
            echo "Connection error: " . $e->getMessage();
        }
    }

    // Getter function for the connection
    public function getConnection() {
        return $this->conn;
    }
}