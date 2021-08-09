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
                                                    <li><?= esc($value) ?></li>
                                                <?php }  ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                <?php
                                    if (session()->getFlashdata('pesan')) {
                                        echo '<div class="alert alert-success alert-dismissible fade show">';
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
                                    <thead >
                                    <tr>
                                            <th style="vertical-align: middle;" class="text-center">No.</th>
                                            <th style="vertical-align: middle;">Username</th>
                                            <th style="vertical-align: middle;">E-mail</th>
                                            <!-- <th>Password</th> -->
                                            <th style="vertical-align: middle;">Level</th>
                                            <th style="vertical-align: middle;">Bidang / Bagian</th>
                                            <th style="vertical-align: middle;">Foto</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        <?php foreach ($user as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle;"><?= $i++; ?>.</td>
                                                <td style="vertical-align: middle;"><?= $value['username'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['email'] ?></td>
                                                <!-- <td><?= $value['password'] ?></td> -->
                                                <td style="vertical-align: middle;">
                                                <?php if ($value['level'] == 1) {
                                                    echo "Admin";
                                                    
                                                } elseif ($value['level'] == 2) {
                                                    echo "User";
                                                } 
                                                ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= $value['nama_divisi'] ?></td>
                                                <td style="vertical-align: middle;">
                                                    <img src="<?= base_url('img/ava/' . $value['foto']) ?>" width="80px">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-info btn-icon-split btn-sm" 
                                                        data-toggle="modal" data-target="#editModal<?=$value['id_user']?>">
                                                        <span class="icon text-white-50">
                                                        <i class="fas fa-edit" ></i>
                                                        </span>
                                                        <span class="text">Ubah</span>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm " 
                                                        data-toggle="modal" data-target="#delete<?=$value['id_user']?>">
                                                        <span class="text-white-50">
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Akun Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart('pengguna/save') ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control border-left-info" name="username" placeholder="Masukkan nama user" >
                                </div>
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control border-left-info" name="email" placeholder="Masukkan email user" >
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan password user" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <select name="level" class="form-control">
                                            <option value="">--Status user--</option>
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Bidang / Bagian</label>
                                    <select name="id_divisi" class="form-control">
                                        <option value="">--Pilih Bidang / Bagian--</option>
                                        <?php foreach ($divisi as $key => $div) { ?>
                                            <option value="<?= $div['id_divisi'] ?>"><?= $div['nama_divisi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control p-1">
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

                <!-- Edit Modal -->
                    <?php foreach ($user as $key => $value) { ?>                            
                        <div class="modal fade" id="editModal<?= $value['id_user'] ?>" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Akun Pengguna <?= $value['username'] ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart('pengguna/update/' . $value['id_user']) ?>
                                        
                                        <!-- <input type="hidden" name="id_user" value="<?= $value['id_user'] ?>"> -->
                                    
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" value="<?= $value['email'] ?>" class="form-control border-left-info" name="email" placeholder="Masukkan email user">
                                        </div>
                                    
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label>Password</label>
                                                <input type="password" value="<?= $value['password'] ?>" name="password" class="form-control" placeholder="Enter password user">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Status</label>
                                                <select name="level" class="form-control">
                                                <?php $cekstat = $value['level'] ?> 
                                                    <option value="<?= $value['level'] ?>">
                                                        <?php if ($cekstat == 1) {
                                                            echo 'Admin';
                                                        } elseif ($cekstat == 2) {
                                                            echo 'User';
                                                        } ?>
                                                    </option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Bidang / Bagian</label>
                                            <select name="id_divisi" class="form-control">
                                            <?php $cek = $value['id_divisi'] ?> 
                                            <?php foreach ($divisi as $key => $div) { ?>
                                                <option value="<?= $div['id_divisi'] ?>" <?= ($div['id_divisi']==$cek) ? 'selected' : ''; ?>><?= $div['nama_divisi'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label>Foto</label>
                                                <img src="<?= base_url('img/ava/' . $value['foto']) ?>" width="150" height="120" style="object-fit: contain;" class="shadow-lg p-2 rounded-sm">
                                            </div>
                                            <div class="col-md-8">
                                                <label>Ganti Foto</label>
                                                <input type="file" name="foto"  class="p-1 form-control">
                                            </div>
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
                <?php foreach ($user as $key => $value) { ?>                            
                    <div class="modal fade" id="delete<?= $value['id_user'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $value['username'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini ???
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="<?= base_url('user/delete/'. $value['id_user']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
                <!-- End of Add Modal -->
                
                
            <!-- End of Crud Modal -->

            

            
            
<?=$this->endSection(); ?>
