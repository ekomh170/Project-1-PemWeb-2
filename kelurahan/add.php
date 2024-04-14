<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';
if (isset($_POST["submit"])) {
    $_nama = $_POST['nama'];
    $data = [$_nama];
    $sql = "INSERT INTO kelurahan (nama) VALUES (?)";
    $stmt = $dbh->prepare($sql);
    if ($stmt->execute($data)) {
        // Jika eksekusi query berhasil
        echo "<script>alert('Data berhasil ditambahkan.'); window.location.href = 'index.php';</script>";
    } else {
        // Jika eksekusi query gagal
        echo "<script>alert('Gagal menambahkan data. Silakan coba lagi.');</script>";
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Tambah Data - Form Kelurahan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Kelurahan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Form Kelurahan</h2>
                            <form action="add.php" method="POST">
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Footer
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>