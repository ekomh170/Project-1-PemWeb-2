<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data dokter berdasarkan id
    $sql = "SELECT * FROM dokter WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $_nama = $_POST['nama'];
    $_gender = $_POST['gender'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_kategori = $_POST['kategori'];
    $_telpon = $_POST['telpon'];
    $_alamat = $_POST['alamat'];
    $_unit_kerja_id = $_POST['unit_kerja_id'];
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id, $id];

    // Query SQL untuk update data dokter berdasarkan id
    $sql = "UPDATE dokter SET nama = ?, gender = ?, tmp_lahir = ?, tgl_lahir = ?, kategori = ?, telpon = ?, alamat = ?, unit_kerja_id = ? WHERE id = ?";

    $stmt = $dbh->prepare($sql);
    if ($stmt->execute($data)) {
        // Jika eksekusi query berhasil
        echo "<script>alert('Data berhasil diupdate.'); window.location.href = 'index.php';</script>";
    } else {
        // Jika eksekusi query gagal
        echo "<script>alert('Gagal memperbarui data. Silakan coba lagi.');</script>";
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
                    <h1>Menu Edit Data - Form Dokter</h1>
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
                            <h3 class="card-title">Form Dokter</h3>

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
                            <h2 class="text-center">Form Dokter</h2>
                            <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control" value="<?= $row['nama'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-8">
                                        <select id="gender" name="gender" class="custom-select">
                                            <option value="L" <?= ($row['gender'] == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                                            <option value="P" <?= ($row['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-8">
                                        <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?= $row['tmp_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-8">
                                        <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?= $row['tgl_lahir'] ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kategori" class="col-4 col-form-label">Kategori</label>
                                    <div class="col-8">
                                        <select id="kategori" name="kategori" class="custom-select">
                                            <?php
                                            // Mendapatkan nilai-nilai enum dari kolom kategori
                                            $enumValues = $dbh->query("SHOW COLUMNS FROM dokter LIKE 'kategori'")->fetch(PDO::FETCH_ASSOC)['Type'];
                                            preg_match_all("/'(.*?)'/", $enumValues, $matches);
                                            $enumOptions = $matches[1];

                                            // Loop untuk membuat opsi-opsi dropdown
                                            foreach ($enumOptions as $option) {
                                                $selected = ($option == $row['kategori']) ? 'selected' : '';
                                                echo "<option value='$option' $selected>$option</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telpon" class="col-4 col-form-label">Telpon</label>
                                    <div class="col-8">
                                        <input id="telpon" name="telpon" type="telpon" class="form-control" value="<?= $row['telpon'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                    <div class="col-8">
                                        <input id="alamat" name="alamat" type="text" class="form-control" value="<?= $row['alamat'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unit_kerja_id" class="col-4 col-form-label">Unit Kerja</label>
                                    <div class="col-8">
                                        <select id="unit_kerja_id" name="unit_kerja_id" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM unit_kerja";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['unit_kerja_id'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['nama'] . "</option>";
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