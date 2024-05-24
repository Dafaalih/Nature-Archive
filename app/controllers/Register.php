<?php

class Register extends Controller{
  public function index()
  {;
    $this->view("Register/index");
  }

  public function registerUser(){
    if ($this->model("Register_model")->register($_POST) > 0){
      Flasher::setFlash('Akun', 'berhasil', 'ditambahkan', 'success');
      header("Location:" . BASEURL . "/Login");
      exit;
    } else{
      Flasher::setFlash('Akun', 'gagal', 'ditambahkan', 'danger');
      header("Location:" . BASEURL . "/Login");
      exit;
    }
  }
}