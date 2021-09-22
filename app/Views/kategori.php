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
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-info btn-icon-split mr-2" data-toggle="modal" data-target="#addModal">
                                <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Data</span>
                                </button>
                            </div>
                        </div>
                    <div class="my-2">
                    <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value)  ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
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
                                <table class="table row-border" id="dataTable" width="100%" cellspacing="0">
                                    <thead style=" background: #d7f1f5;">
                                    <tr>
                                            <th style="vertical-align: middle;" class="text-center">No.</th>
                                            <th style="vertical-align: middle;">Nama Kategori</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        <?php foreach ($kategori as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center"><?= $i++; ?>.</td>
                                                <td><?= $value['nama_kategori'] ?></td>
                                                <td>
                                                <button class="btn btn-info btn-icon-split btn-sm mr-1" 
                                                    data-toggle="modal" data-target="#editModal<?=$value['id_kategori']?>">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-edit" ></i>
                                                    </span>
                                                    <span class="text">Ubah</span>
                                                </button>
                                                <button class="btn btn-icon-split btn-danger btn-sm " 
                                                    data-toggle="modal" data-target="#delete<?=$value['id_kategori']?>">
                                                    <span class="icon text-white-50">
                                                    <i class="fas fa-trash-alt" ></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori Surat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <?php echo form_open('kategori/save') ?>
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" class="form-control border-left-info" name="nama_kategori" placeholder="Masukkan nama Kategori">
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
                <?php foreach ($kategori as $key => $value) { ?>                            
                    <div class="modal fade" id="editModal<?= $value['id_kategori'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data kategori (<?= $value['nama_kategori'] ?>)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <?php echo form_open('kategori/update/' . $value['id_kategori']) ?>
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" value="<?= $value['nama_kategori']?>" class="form-control border-left-info" name="nama_kategori" placeholder="Masukkan nama Instansi" required>
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

                <?php foreach ($kategori as $key => $value) { ?>                            
                    <div class="modal fade" id="delete<?= $value['id_kategori'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $value['nama_kategori'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini ???
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="<?= base_url('kategori/delete/'. $value['id_kategori']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                
                <!-- End of Delete Modal -->
            <!-- End of Crud Modal -->

            
            
<?=$this->endSection(); ?>
