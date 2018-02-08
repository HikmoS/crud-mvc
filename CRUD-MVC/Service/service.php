<?php
include ("../Model/user.php");

class Service{

    public $model;

    public function __construct(){
        $this->model = new User();
    }

    public function redirect($location){
        header('Location:'.$location);
    }

    public function userSave($user){
        $this->model->create($user);
        $this->redirect("http://localhost:81/CRUD-MVC/");

    }
    public function read(){
        $list=$this->model->read();
        return $list;
    }
    public function update($user){
        $this->model->update($user);
        $this->redirect("http://localhost:81/CRUD-MVC/");


    }
    public function delete($user){
        $this->model->delete($user);
        $this->redirect("http://localhost:81/CRUD-MVC/");

    }
}


?>