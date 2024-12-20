<?php
class Database {
    // Private properties to store the database credentials and the connection itself
    private $host;
    private $dbName;
    private $username;
    private $password;
    private $conn;

    // Constructor initializes and creates the connection to the database
    public function __construct($host = null, $dbName = null, $username = null, $password = null) {
        // Include the configuration file with the default database credentials
        require_once __DIR__ . "/../config/config.php";

        // Use provided parameters or fallback to constants from the configuration file
        $this->host = $host ?? DB_HOSTNAME;
        $this->dbName = $dbName ?? DB_DATABASE;
        $this->username = $username ?? DB_USERNAME;
        $this->password = $password ?? DB_PASSWORD;
        
        // Initialize the connection property as null, as no active connection yet
        $this->conn = null;

        // Attempt to establish a connection to the database using the credentials provided
        try {
            // Create a new PDO (PHP Data Objects) instance with the connection details
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
            // Set the PDO error mode to Exception to allow error handling through exceptions
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // TODO: Implement an improved logging mechanism to replace the use of echo
            echo "Connection error: " . $e->getMessage();
        }
    }

    // Public method to retrieve the active database connection without exposing the credentials
    public function connect() {
        // Return the PDO connection object
        return $this->conn;
    }

    // Destructor method to clean up resources when the object is destroyed or when the script execution ends
    public function __destruct() {
        // Explicitly set the connection to null to close the database connection
        $this->conn = null;
    }
}