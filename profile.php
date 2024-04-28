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
                    <h1>Profile Kreator</h1>
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
                            <h3 class="card-title">Profile Kreator</h3>

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
                                <div class="row justify-content-center mt-5">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5 class="card-title">Informasi Mahasiswa</h5>
                                                        <div class="text-center">
                                                            <img src="dist/img/profile/profile.png" class="img-fluid" alt="Profile Image">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item"><strong>Nama :</strong> Eko Muchamad Haryono</li>
                                                            <li class="list-group-item"><strong>NIM :</strong> 0110223079</li>
                                                            <li class="list-group-item"><strong>Kelas :</strong> TI02</li>
                                                            <li class="list-group-item"><strong>Program Studi :</strong> Teknik Informatika</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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