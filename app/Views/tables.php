<?= $this->extend('templates/navbar'); ?>


<?=$this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="row">
                        <div class="col-sm-6 ">
                            <a href="#" class="btn btn-success btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </a>
                            <a href="#" class="btn btn-info btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-import"></i>
                                </span>
                                <span class="text">Unggah Data</span>
                            </a>
                            <a href="#" class="btn btn-warning btn-icon-split my-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-print"></i>
                                </span>
                                <span class="text">Cetak Data</span>
                            </a>
                        </div>
                    </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Instansi</th>
                                            <th>Unit Kerja</th>
                                            <th>Alamat</th>
                                            <th>Wilayah</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        <?php foreach ($penerjemah as $row) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['nip']; ?></td>
                                                <td><?= $row['instansi']; ?></td>
                                                <td><?= $row['unit_kerja']; ?></td>
                                                <td><?= $row['alamat']; ?></td>
                                                <td><?= $row['wilayah']; ?></td>
                                                <td>
                                                <a href="" class="btn btn-warning btn-sm mb-2">
                                                <span class="text-white-50">
                                                <i class="fas fa-edit" ></i>
                                                </span>
                                                <span class="text">Edit</span>
                                                </a>
                                                 <a href="" class="btn btn-danger btn-sm">
                                                <span class="text-white-50">
                                                <i class="fas fa-trash-alt" ></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                                </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?=$this->endSection(); ?>

<?=$this->include('templates/footer'); ?>