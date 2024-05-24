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
                <a href="<?= BASEURL ?>/Login"><span class="fa fa-paper-plane"></span> Logout</a>
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
        <div class="form-add">
            <form method="post" action="<?= BASEURL; ?>/ListController/tambahData" enctype="multipart/form-data">
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" id="alamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jenis" id="jenis">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" id="harga">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>