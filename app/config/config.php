<?php

define("BASEURL","http://localhost/NatureArchiveMVC/public");

// Konfigurasi koneksi ke database
define('DB_HOST', 'localhost'); // Host basis data (biasanya 'localhost')
define('DB_USER', 'root'); // Nama pengguna basis data
define('DB_PASS', ''); // Kata sandi pengguna basis data
define('DB_NAME', 'db_nature_archive'); // Nama basis data

// Buat koneksi ke database menggunakan PDO
try {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    $dbh = new PDO($dsn, DB_USER, DB_PASS);

    // Atur mode error PDO ke Exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Atur karakter koneksi ke UTF-8
    $dbh->exec('SET NAMES utf8');
} catch (PDOException $e) {
    // Tangani kesalahan koneksi    
    die('Koneksi database gagal: ' . $e->getMessage());
}