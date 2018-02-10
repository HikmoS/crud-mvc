<?php

class Config
{

// specify your own database credentials
    private $host = "localhost";
    private $db_name = "auth";
    private $username = "postgres";
    private $password = "";
    public $conn;

// get the database connection
    public function getConnection()
    {

        $this->conn = null;

        try {
           $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>
