<?php
class naModel 
{
    private $table = "db_costumer"; // Sesuaikan dengan nama tabel Anda
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllList()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getColumnsList()
    {
        $this->db->query("SHOW COLUMNS FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function countList()
    {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table);
        $result = $this->db->single();

        return $result['total'];
    }

public function tambahData($data)
{
    // Pertama, upload gambar
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Maaf, hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Maaf, file tidak diunggah.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Jika gambar berhasil diunggah, tambahkan data mobil ke database
            $query = "INSERT INTO " . $this->table . "
                      VALUES ('', :nama, :alamat, :jenis, :harga, :gambar)";

            try {
                $this->db->query($query);
                $this->db->bind(":nama", $data["nama"]);
                $this->db->bind(":alamat", $data["alamat"]);
                $this->db->bind(":jenis", $data["jenis"]);
                $this->db->bind(":harga", $data["harga"]);
                $this->db->bind(":gambar", $target_file);

                $this->db->execute();
                return $this->db->rowCount();
            } catch (Exception $e) {
                echo "Terjadi kesalahan: " . $e->getMessage();
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}


public function getDataById($id)
  {
    $this->db->query("SELECT * FROM ". $this->table . " WHERE id_customer=:id");
    $this->db->bind("id", $id);
    return $this->db->single();
  }


public function editData($data, $id_customer)
{
    // Update data without updating the image
    $query = "UPDATE " . $this->table . " SET 
                nama = :nama,
                alamat = :alamat,
                jenis = :jenis,
                harga = :harga
              WHERE id_customer = :id_customer";

    $this->db->query($query);
    $this->db->bind(":id_customer", $id_customer);
    $this->db->bind(":nama", $data["nama"]);
    $this->db->bind(":alamat", $data["alamat"]);
    $this->db->bind(":jenis", $data["jenis"]);
    $this->db->bind(":harga", $data["harga"]);

    $this->db->execute();
    return $this->db->rowCount();
}



      public function hapusData($id)
    {
    $query = "DELETE FROM " . $this->table . 
              " WHERE id_customer = :id_customer";
    $this->db->query($query);
    $this->db->bind("id_customer", $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}