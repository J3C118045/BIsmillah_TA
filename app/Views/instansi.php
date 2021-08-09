<?= $this->extend('templates/navbar'); ?>


<?=$this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1> 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="row">
                            <button type="button" class="btn btn-info btn-icon-split mx-2" data-toggle="modal" data-target="#addModal">
                            <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </button>
                    
                            
                            <form action="<?= base_url('instansi/export') ?>" method="POST">
                                <button class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="far fa-file-excel"></i>
                                    </span>
                                    <span class="text">Cetak Data</span>
                                </button>
                            </form>
                        
                    </div>
                    <div class="my-2">
                    <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">';
                            echo session()->getFlashdata('pesan');
                            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>';
                            echo '</div>';
                        }
                    ?>
                    </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table row-border compact" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                            <th style="vertical-align: middle;" class="text-center">No.</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Unit Kerja</th>
                                            <th style="vertical-align: middle;">Alamat</th>
                                            <th style="vertical-align: middle;">Wilayah</th>
                                            <th style="vertical-align: middle;" width="50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        <?php foreach ($instansi as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle;"><?= $i++; ?>.</td>
                                                <td style="vertical-align: middle;"><?= $value['instansi'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['unit_kerja'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['alamat'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['wilayah'] ?></td>
                                                <td style="vertical-align: middle;">
                                                    <div style="display: inline-flex;">
                                                        <button class="btn btn-info btn-icon-split btn-sm mr-1" 
                                                            data-toggle="modal" data-target="#editModal<?=$value['id_instansi']?>">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-edit" ></i>
                                                            </span>
                                                            <span class="text">Ubah</span>
                                                        </button>
                                                        <button class="btn btn-icon-split btn-danger btn-sm " 
                                                            data-toggle="modal" data-target="#delete<?=$value['id_instansi']?>">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-trash-alt" ></i>
                                                            </span>
                                                            <span class="text">Hapus</span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Crud Modal -->
                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Instansi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <?php echo form_open('instansi/save') ?>
                                <div class="form-group">
                                    <label>Instansi</label>
                                    <input type="text" class="form-control border-left-info" name="instansi" placeholder="Masukkan nama Instansi" required>
                                </div>
                                
                                <div class="form-group">
                                    <label>Unit Kerja</label>
                                    <input type="text" class="form-control border-left-info" name="unit_kerja" placeholder="Masukkan nama Unit Kerja" required>
                                </div>
                            
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control border-left-info" name="alamat" placeholder="Masukkan alamat satuan unit kerja" required>
                                </div>
                                <div class="form-group">
                                    <label>Wilayah</label>
                                    <input type="text" class="form-control border-left-info" name="wilayah" placeholder="Masukkan Provinsi satuan unit kerja" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
                
                <!-- End of Add Modal -->
                
                <!-- Edit Modal -->
                <?php foreach ($instansi as $key => $value) { ?>                            
                    <div class="modal fade" id="editModal<?= $value['id_instansi'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Instansi (<?= $value['instansi'] ?>)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <?php echo form_open('instansi/update/' . $value['id_instansi']) ?>
                                    <div class="form-group">
                                        <label>Instansi</label>
                                        <input type="text" value="<?= $value['instansi']?>" class="form-control border-left-info" name="instansi" placeholder="Masukkan nama Instansi" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Unit Kerja</label>
                                        <input type="text" value="<?= $value['unit_kerja']?>" class="form-control border-left-info" name="unit_kerja" placeholder="Masukkan nama Unit Kerja" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" value="<?= $value['alamat'] ?>" class="form-control border-left-info" name="alamat" placeholder="Masukkan alamat satuan unit kerja" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Wilayah</label>
                                        <input type="text" value="<?= $value['wilayah'] ?>" class="form-control border-left-info" name="wilayah" placeholder="Masukkan Provinsi satuan unit kerja" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End of Edit Modal -->

                <!-- Delete Modal -->
                <?php foreach ($instansi as $key => $value) { ?>                            
                    <div class="modal fade" id="delete<?= $value['id_instansi'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $value['instansi'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini ???
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="<?= base_url('instansi/delete/'. $value['id_instansi']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End of Delete Modal -->
            <!-- End of Crud Modal -->

            
            
<?=$this->endSection(); ?>
