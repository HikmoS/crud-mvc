<?php
include ("../Model/user.php");

class Service{

    public $model;

    public function serviceObje(){
        return $this->model = new User();
    }

    public function redirect($location){
        header('Location:'.$location);
    }

    public function userSave($fname,$lname){
        $this->serviceObje()->create($fname,$lname);
        $this->redirect("/CRUD-MVC/");

    }
    public function read(){
        $list=$this->serviceObje()->read();
        return $list;
    }
    public function update($id,$fname,$lname){
        $this->serviceObje()->update($id,$fname,$lname);
        $this->redirect("/CRUD-MVC/");


    }
    public function delete($id){
        $this->serviceObje()->delete($id);
        $this->redirect("/CRUD-MVC/");

    }
}

?>