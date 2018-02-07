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

    public function create($fname,$lname){


        $this->fname = $fname;
        $this->lname = $lname;

        $stmt = $this->conn->getConnection()->prepare("INSERT INTO ".$this->table_name. "(fname,lname) VALUES(?,?)");

        $stmt->bindParam(1, $this->fname);
        $stmt->bindParam(2, $this->lname);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function delete($id){

        $this->id = $id;

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




    function update($id,$fname,$lname){

        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;

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