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
                                    <button type="button" class="btn btn-info btn-icon-split mx-2"
                                    data-toggle="modal" data-target="#addModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                                    </button>
                                    
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
                                            <th style="vertical-align: middle;">Kode KTJ</th>
                                            <th style="vertical-align: middle;">Nama KTJ</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        <?php foreach ($ktj as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle;"><?= $i++; ?>.</td>
                                                <td style="vertical-align: middle;"><?= $value['kode_tugas'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['list_tugas'] ?></td>
                                                <td style="vertical-align: middle;">
                                                    <div style="display: inline-flex;">
                                                        <button class="btn btn-info btn-icon-split btn-sm mr-1" 
                                                            data-toggle="modal" data-target="#editModal<?=$value['id_tugas']?>">
                                                            <span class="icon text-white-50">
                                                            <i class="fas fa-edit" ></i>
                                                            </span>
                                                            <span class="text">Edit</span>
                                                        </button>
                                                        <button class="btn btn-icon-split btn-danger btn-sm " 
                                                            data-toggle="modal" data-target="#delete<?=$value['id_tugas']?>">
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data KTJ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <?php echo form_open('ktj/save') ?>
                                <div class="form-group">
                                    <label>Kode KTJ</label>
                                    <input type="text" class="form-control border-left-info" name="kode_tugas" placeholder="Masukkan Kode KTJ. (Ex: KTJ/KabidCoba/1)" >
                                </div>

                                <div class="form-group">
                                    <label>Isi KTJ</label>
                                    <textarea name="list_tugas" cols="53" rows="5" class="form-control border-left-info" placeholder="Masukkan Isi KTJ"></textarea>
                                </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
                
                <!-- End of Add Modal -->
                
                <!-- Edit Modal -->
                <?php foreach ($ktj as $key => $value) { ?>                            
                    <div class="modal fade" id="editModal<?= $value['id_tugas'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data KTJ (<?= $value['kode_tugas'] ?>)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <?php echo form_open('ktj/update/' . $value['id_tugas']) ?>
                                    <div class="form-group">
                                        <label>Kode KTJ</label>
                                        <input type="text" value="<?= $value['kode_tugas']?>" class="form-control border-left-info" name="kode_tugas" placeholder="Masukkan Kode KTJ">
                                    </div>
                                        
                                    <div class="form-group">
                                        <label>Isi Tugas</label>
                                        <textarea name="list_tugas" cols="53" rows="5" class="form-control border-left-info" > <?= $value['list_tugas'] ?> </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End of Edit Modal -->

                <!-- Delete Modal -->

                <?php foreach ($ktj as $key => $value) { ?>                            
                    <div class="modal fade" id="delete<?= $value['id_tugas'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $value['kode_tugas'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini ???
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= base_url('ktj/delete/'. $value['id_tugas']) ?>" type="submit" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                
                <!-- End of Delete Modal -->
            <!-- End of Crud Modal -->

            
            
<?=$this->endSection(); ?>
