<?php

class Home extends Controller{
  public function index()
  {
    $data["judul"] = "Nature Archive";
    $this->view("template/header", $data);
    $this->view("Home/index", $data);
    $this->view("template/footer");
  }
}
