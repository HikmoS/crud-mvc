<?php
include("../config.php");


class User{

    private $table_name="users";
    private $conn;

    public $id;
    public $fname;
    public $lname;



    public function __construct(){
        $this->conn = new Config();
    }

    public function create($user){

        $this->fname = $user[0];
        $this->lname = $user[1];

        $stmt = $this->conn->getConnection()->prepare("INSERT INTO ".$this->table_name. "(fname,lname) VALUES(?,?)");

        $stmt->bindParam(1, $this->fname);
        $stmt->bindParam(2, $this->lname);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function delete($user){

        $this->id = $user[0];

        $stmt = $this->conn->getConnection()->prepare("DELETE FROM $this->table_name WHERE u_id=?");

        $stmt->bindParam(1,$this->id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }



    public function read()
    {

        $stmt = $this->conn->getConnection()->query("SELECT * FROM $this->table_name");
        return $stmt;
    }




    function update($user){

        $this->id=$user[0];
        $this->fname = $user[1];
        $this->lname = $user[2];


        $stmt = $this->conn->getConnection()->prepare( "UPDATE $this->table_name SET fname = ?, lname=? WHERE u_id= ?");

        $stmt->bindParam(1,$this->fname);
        $stmt->bindParam(2,$this->lname);
        $stmt->bindParam(3,$this->id);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


}

?>