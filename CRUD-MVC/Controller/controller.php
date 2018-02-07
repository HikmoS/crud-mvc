<?php
include('../Model/user.php');


class controller{
    public $model;
    public $fname;
    public $lname;
    public $id;


    public function __construct(){
        $this->model = new User();
    }

    public function redirect($location){
        header('Location:'.$location);
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
        $list = $this->model->read();
        return $list;
    }

    public function add(){

           $this->fname = $_POST['fname'];
           $this->lname = $_POST['lname'];
           $this->model->create($this->fname,$this->lname);
           $this->redirect("http://localhost:81/CRUD-MVC/");
        return true;
    }
    public function update(){


            $this->id = $_POST['userid'];
            $this->fname = $_POST['fname'];
            $this->lname = $_POST['lname'];
            $this->model->update($this->id,$this->fname,$this->lname);
        $this->redirect("http://localhost:81/CRUD-MVC/");

        return true;
    }

    public function delete(){
            $this->id = $_GET['id'];
            $this->model->delete($this->id);
        $this->redirect("http://localhost:81/CRUD-MVC/");

        return true;
    }


}

$cont = new controller();
$cont->handleRequest();




?>