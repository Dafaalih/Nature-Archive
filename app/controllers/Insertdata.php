<?php

class Insertdata extends Controller {
  public function index()
  {
    $data["judul"] = "Tambah Data";
    $this->view("template/header", $data);
    $this->view("InsertData/index");
    $this->view("template/footer");
  }
}
