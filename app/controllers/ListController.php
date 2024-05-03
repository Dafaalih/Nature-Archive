<?php
class ListController extends Controller {
    public function index()
    {
        $data["judul"] = "Nature Archive";
        $data["ListController"] = $this->model("naModel")->getAllList();
        $this->view("template/header", $data);
        $this->view("List/index", $data);
        $this->view("template/footer");
    }
    
    public function tambahData()
    {
        if ($this->model("naModel")->tambahData($_POST)) {
            Flasher::setFlash('Data List', 'berhasil', 'ditambahkan', 'success');
            header("Location:" . BASEURL . "/Home");
            exit;
        } else {
            Flasher::setFlash('Data Cars', 'gagal', 'ditambahkan', 'danger');
            header("Location:" . BASEURL . "/InsertData");
            exit;
        }
    }

    public function getUbahData($id_customer)
    {
        echo json_encode($this->model("naModel")->getDataById($id_customer));
    }

public function editData($id_customer)
{
    var_dump($_POST); // Dump $_POST data before processing

    $result = $this->model("naModel")->editData($_POST, $id_customer);
    var_dump($result); // Dump the result before redirection

    if ($result > 0) {
        Flasher::setFlash('Data Customer', 'berhasil', 'diubah', 'success');
    } else {
        Flasher::setFlash('Data Cars', 'gagal', 'diubah', 'danger');
    }
    header("Location:" . BASEURL . "/ListController");
    exit;
}



  public function hapusData($id)
  {
    if ($this->model("naModel")->hapusData($id) > 0){
      Flasher::setFlash('Data Cars', 'berhasil', 'dihapus', 'success');
      header("Location:" . BASEURL . "/ListController");
      exit;
    } else{
      Flasher::setFlash('Data Cars', 'gagal', 'dihapus', 'danger');
      header("Location:" . BASEURL . "/ListController");
      exit;
    }
  }
}