<?php

Class Register_model{
  private $table = "db_akun";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function register($data)
  {
    $query = "INSERT INTO db_akun
                VALUES
            ('', :username, :password)";
    
    $this->db->query($query);
    $this->db->bind("username", $data["username"]);
    $this->db->bind("password", $data["password"]);

    $this->db->execute();
    return $this->db->rowCount();

  }
}