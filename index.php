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
                    <h1>Dashboard Informasi</h1>
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
                                <h4 class="text-center mt-4">Selamat Datang Di Website Project 01<br />Aplikasi CRUD Sederhana Puskesmas<br />Tugas Pemrograman Web 2</h4>

                                <div class="informasi_menu mt-5">
                                    <!-- Data Pasien -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card bg-primary text-white">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Pasien</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Isi dengan tabel atau konten yang sesuai -->
                                                    <p>Isi Data Pasien disini...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Data Dokter -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card bg-success text-white">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Dokter</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Isi dengan tabel atau konten yang sesuai -->
                                                    <p>Isi Data Dokter disini...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Data Periksa -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card bg-info text-white">
                                                <div class="card-header">
                                                    <h3 class="card-title">Data Periksa</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Isi dengan tabel atau konten yang sesuai -->
                                                    <p>Isi Data Periksa disini...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
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