<?php
include('../Service/service.php');


class controller{
    public $service;
    public $fname;
    public $lname;
    public $id;


    public function __construct(){
        $this->service = new Service();
    }

    public function handleRequest(){
        if(isset($_POST['userid'])) {
            $this->update();
        }elseif(isset($_GET['id'])){
            $this->delete();
        }elseif (isset($_POST['fname'])){
            $this->add();
        }else
            return false;
    }

    public function liste(){
        $list = $this->service->read();
        return $list;
    }

    public function add(){
           $user=[];
           $user[0]=$_POST["fname"];
           $user[1]=$_POST['lname'];
           $this->service->userSave($user);

        return true;
    }
    public function update(){

            $user=[];
            $user[0]=$_POST['userid'];
            $user[1]=$_POST['fname'];
            $user[2]=$_POST['lname'];
            $this->service->update($user);

        return true;
    }

    public function delete(){
            $user = [];
            $user[0] = $_GET['id'];
            $this->service->delete($user);

        return true;
    }


}

$cont = new controller();
$cont->handleRequest();




?>