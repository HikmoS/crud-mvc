<?php

/**
 * Person Class
 * Provides access to the "Person" database table.
 *
 * @author Damien Walsh <me@damow.net>
 */
class Person extends AbstractModel
{
    /**
     *  Three columns,
     *
     *      - The ID
     *      - The person name
     *      - The person's favourite colour.
     */
    private $host = "localhost";
    private $db_name = "postgres";
    private $username = "postgres";
    private $password = "1234";
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

    }

    public function getUser($id = null)
    {

        $sql = "SELECT * FROM users";
        if (!empty($id))
            $sql .= " WHERE id=" . $id;

        $results = [];
        foreach ($this->conn->query($sql) as $row) {
            $results[] = $row;
        }

        return $results;
    }
    public function insertUser($user){
        $sql='INSERT INTO users (fname, lname) VALUES (?, ?)';
        $query = $this->conn->prepare('INSERT INTO users (fname, lname) VALUES(?, ?)');
        $query->execute(array($user[0], $user[1]));
        return 1;


    }


}
