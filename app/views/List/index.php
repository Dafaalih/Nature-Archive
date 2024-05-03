<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <h1><a href="<?= BASEURL ?>/Home" class="logo">N.</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="<?= BASEURL ?>/Home"><span class="fa fa-home"></span> Home</a>
            </li>
            <li>
                <a href="<?= BASEURL ?>/ListController"><span class="fa fa-user"></span> List</a>
            </li>
            <li>
                <a href="<?= BASEURL ?>/InsertData"><span class="fa fa-sticky-note"></span> Tambah </a>
            </li>
            <li>
                <a href="#"><span class="fa fa-cogs"></span> Services</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-paper-plane"></span> Contacts</a>
            </li>
        </ul>
    </nav>

    <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </nav>

        <div class="card-container">  
    <div class="row">
        <?php foreach ($data["ListController"] as $row) : ?>
            <div class="card">
                <img src="<?= BASEURL ?>/img/<?= basename($row['gambar']); ?>" alt="gambar">
                <div class="card-body">
                    <h5 class="card-title"><?= $row["nama_customer"]; ?></h5>
                    <p class="card-text"><?= $row["alamat"]; ?></p>
                    <p class="card-text"><?= $row["id_jenis"]; ?></p>
                    <p class="card-text"><?= $row["id_harga"]; ?></p>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $row["id_customer"]; ?>">Edit</button>
                        <a href='<?= BASEURL; ?>/ListController/hapusData/<?= $row['id_customer']; ?>' class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>  
</div>

<!-- Edit Modal -->
<?php foreach ($data["ListController"] as $row) : ?>
    <div class="modal fade" id="editModal<?= $row["id_customer"]; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= BASEURL; ?>/ListController/editData/<?= $row['id_customer'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row["nama_customer"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row["alamat"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $row["id_jenis"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $row["id_harga"]; ?>">
                        </div>
                        <input type="hidden" name="id_customer" value="<?= $row["id_customer"]; ?>">
                        <button type="submit" class="btn btn-primary" value="Simpan Perubahan">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>