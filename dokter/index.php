<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Data Dokter</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Dokter</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <h2 class="text-center">Data Dokter</h2>
                            <a href="add.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kategori</th>
                                        <th>Telpon</th>
                                        <th>Alamat</th>
                                        <th>Unit Kerja ID</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Panggil file
                                    require '../dbkoneksi.php';
                                    // Bikin Query SQL
                                    $query = $dbh->query("SELECT * FROM dokter");
                                    // Tampilkan data looping
                                    foreach ($query as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['tmp_lahir'] . "</td>";
                                        echo "<td>" . $row['tgl_lahir'] . "</td>";
                                        echo "<td>" . $row['kategori'] . "</td>";
                                        echo "<td>" . $row['telpon'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>" . $row['unit_kerja_id'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='edit.php?id=" . $row['id'] . "'><button class='btn btn-warning'>Edit</button></a>";
                                        echo "<span class='mx-1'></span>"; 
                                        echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin Hapus Data?\")'><button class='btn btn-danger'>Delete</button></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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