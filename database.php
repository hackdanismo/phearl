<?php
class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    // Constructor initializes and creates the connection to the database
    public function __construct($host = DB_HOSTNAME, $dbName = DB_DATABASE, $username = DB_USERNAME, $password = DB_PASSWORD) {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;

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