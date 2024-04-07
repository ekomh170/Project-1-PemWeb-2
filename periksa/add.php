<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';
if (isset($_POST['submit'])) {
    $_tanggal = $_POST['tanggal'];
    $_berat = $_POST['berat'];
    $_tinggi = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_pasien_id = $_POST['pasien_id'];
    $_dokter_id = $_POST['dokter_id'];
    $data = [$_tanggal, $_berat, $_tinggi, $_tensi, $_keterangan, $_pasien_id, $_dokter_id];
    // Query SQL untuk update data periksa berdasarkan id
    $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) VALUES (?,? ,? ,? ,? ,? ,?)";

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
                    <h1>Menu Tambah Data - Form Periksa</h1>
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
                            <h3 class="card-title">Form Periksa</h3>

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
                            <h2 class="text-center">Form Periksa</h2>
                            <form action="add.php" method="POST">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-4 col-form-label">Tanggal Pemeriksaan Pasien</label>
                                    <div class="col-8">
                                        <input id="tanggal" name="tanggal" type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="berat" class="col-4 col-form-label">Berat Badan Pasien</label>
                                    <div class="col-8">
                                        <input id="berat" name="berat" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tinggi" class="col-4 col-form-label">Tinggi Badan Pasien</label>
                                    <div class="col-8">
                                        <input id="tinggi" name="tinggi" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tensi" class="col-4 col-form-label">Tensi Pasien</label>
                                    <div class="col-8">
                                        <input id="tensi" name="tensi" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-4 col-form-label">Keterangan Kondisi Pasien</label>
                                    <div class="col-8">
                                        <input id="keterangan" name="keterangan" type="keterangan" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pasien_id" class="col-4 col-form-label">Nama Pasien</label>
                                    <div class="col-8">
                                        <select id="pasien_id" name="pasien_id" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM pasien";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                echo "<option value='" . $rowjenis['id'] . "' >" . $rowjenis['id'] . ". " . $rowjenis['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dokter_id" class="col-4 col-form-label">Nama Dokter Pemeriksa Pasien</label>
                                    <div class="col-8">
                                        <select id="dokter_id" name="dokter_id" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM dokter";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                echo "<option value='" . $rowjenis['id'] . "'>" . $rowjenis['id'] . ". " . $rowjenis['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
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
                            Project 1 - Aplikasi CRUD Sederhana Puskesmas
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