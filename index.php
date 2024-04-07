<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Informasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Project 1 - Aplikasi CRUD Sederhana Puskesmas</h3>
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
                            <div class="container">
                                <h4 class="text-center mt-4"><u>Selamat Datang Di Website</u> <b>Project 01 Aplikasi CRUD Sederhana Puskesmas</b> <i>Tugas Pemrograman Web 2</i></h4>
                                <div class="informasi_menu mt-5">
                                    <!-- Jumlah Data Per Menu -->
                                    <?php
                                    require 'dbkoneksi.php';
                                    $dokter = $dbh->query("SELECT COUNT(*) AS total FROM dokter")->fetchColumn();
                                    $pasien = $dbh->query("SELECT COUNT(*) AS total FROM pasien")->fetchColumn();
                                    $periksa = $dbh->query("SELECT COUNT(*) AS total FROM periksa")->fetchColumn();
                                    ?>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3><?= $dokter ?></h3>
                                                    <p>Total Dokter Puskesmas</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-user-md"></i>
                                                </div>
                                                <a href="dokter/index.php" class="small-box-footer">Menu Dokter <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3><?= $pasien ?></h3>
                                                    <p>Total Pasien Terdata</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-wheelchair"></i>
                                                </div>
                                                <a href="pasien/index.php" class="small-box-footer">Menu Pasien <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3><?= $periksa ?></h3>
                                                    <p>Total Pemeriksaan Pasien</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-medkit"></i>
                                                </div>
                                                <a href="periksa/index.php" class="small-box-footer">Menu Periksa <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Jumlah Data Per Menu -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card bg-dark text-white">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Pemeriksaan Pasien Berdasarkan - Data Yang Terbaru Melakukan Pemeriksaan</h3>
                                                </div>
                                                <div class="card-body">
                                                    <?php
                                                    $query = $dbh->query("SELECT 
                                                    periksa.id AS id_periksa,
                                                    periksa.tanggal,
                                                    periksa.berat,
                                                    periksa.tinggi,
                                                    periksa.tensi,
                                                    periksa.keterangan,
                                                    pasien.nama AS nama_pasien,
                                                    dokter.nama AS nama_dokter
                                                FROM periksa
                                                INNER JOIN pasien ON periksa.pasien_id = pasien.id
                                                INNER JOIN dokter ON periksa.dokter_id = dokter.id
                                                ORDER BY periksa.tanggal DESC;
                                                ");

                                                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

                                                    if (count($rows) > 0) {
                                                        echo '<div class="table-responsive">';
                                                        echo '<table class="table table-bordered table-striped">';
                                                        echo '<thead class="thead-light">';
                                                        echo '<tr>';
                                                        echo '<th>Nomor Urut</th>'; // Tambahkan kolom nomor urut
                                                        echo '<th>Tanggal</th>';
                                                        echo '<th>Nama Pasien</th>';
                                                        echo '<th>Nama Dokter</th>';
                                                        echo '<th>Berat</th>';
                                                        echo '<th>Tinggi</th>';
                                                        echo '<th>Tensi</th>';
                                                        echo '<th>Keterangan</th>';
                                                        echo '</tr>';
                                                        echo '</thead>';
                                                        echo '<tbody>';

                                                        $nomor_urut = 1; // Inisialisasi nomor urut

                                                        foreach ($rows as $row) {
                                                            echo '<tr>';
                                                            echo '<td>' . $nomor_urut++ . '</td>'; // Tampilkan nomor urut dan increment counter
                                                            echo '<td>' . $row['tanggal'] . '</td>';
                                                            echo '<td>' . $row['nama_pasien'] . '</td>';
                                                            echo '<td>' . $row['nama_dokter'] . '</td>';
                                                            echo '<td>' . $row['berat'] . '</td>';
                                                            echo '<td>' . $row['tinggi'] . '</td>';
                                                            echo '<td>' . $row['tensi'] . '</td>';
                                                            echo '<td>' . $row['keterangan'] . '</td>';
                                                            echo '</tr>';
                                                        }

                                                        echo '</tbody>';
                                                        echo '</table>';
                                                        echo '</div>';
                                                    } else {
                                                        echo '<p class="text-center">Tidak ada data yang tersedia.</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Project 1 - Aplikasi CRUD Sederhana Puskesmas
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require_once 'footer.php';
?>