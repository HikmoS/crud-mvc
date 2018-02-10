<?php
include('../Service/service.php');


class controller{
    public $service;
    public $id;
    public $fname;
    public $lname;



    public function controllerObje()
    {
        return $this->service = new Service();
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
        $list = $this->controllerObje()->read();
        return $list;

    }

    public function add(){

           $this->fname=$_POST["fname"];
           $this->lname=$_POST['lname'];
           $this->controllerObje()->userSave($this->fname,$this->lname);

        return true;
    }
    public function update(){

            $this->id=$_POST['userid'];
            $this->fname=$_POST['fname'];
            $this->lname=$_POST['lname'];
            $this->controllerObje()->update($this->id,$this->fname,$this->lname);

        return true;
    }

    public function delete(){
            $this->id = $_GET['id'];
            $this->controllerObje()->delete($this->id);

        return true;
    }

}

$cont = new controller();
$cont->handleRequest();


?>