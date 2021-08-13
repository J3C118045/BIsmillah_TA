<?= $this->extend('templates/navbar'); ?>


<?=$this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid mb-5">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1> 

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <!-- Flash data -->
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
                                <?php if (isset($validation)): ?> 
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <?= $validation->listErrors(); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php
                                    if (session()->getFlashdata('error')) {
                                        echo '<div class="alert alert-danger alert-dismissible fade show">';
                                        echo session()->getFlashdata('error');
                                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>';
                                        echo '</div>';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="row">

                        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 justfy-content-center"> -->

                            <div class="card shadow-sm">
                                <div class="card-body p-0">
                                    <div class="card p-3">
                                        <div class="d-flex align-items center">
                                            <div class="image p-1"><img src="<?= base_url() ?>/img/ava/<?= $user['foto'] ?>" alt="profile" class=" profil " width="250"  style="object-fit: cover;"></div>
                                            <div class="ml-3 w-100 p-1">
                                                <h4 class="font-weight-bold mb-0 mt-0"><?= $user['username']; ?></h4>
                                                <p class="mb-0 mt-0"><?= $user['email']; ?></p>
                                                <p><?= $user['nama_divisi']; ?></p>
                                                <button type="button" data-toggle="modal" data-target="#editModal<?=$user['id_user']?>" class="btn btn-primary btn-block btn-modal" id="btn-ubah">Ubah Profil</button>
                                                <button type="button" data-toggle="modal" data-target="#passwordModal<?=$user['id_user']?>" class="btn btn-success btn-block btn-modal">Ganti Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?= $user['id_user'] ?>" tabindex="-1" role="dialog" 
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Profil Saya</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" value="<?= $user['username'] ?>" class="form-control border-left-info" name="username" placeholder="Masukkan nama user" required>
                                </div>
                            
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="<?= $user['email'] ?>" class="form-control border-left-info" name="email" placeholder="Masukkan email user" required>
                                </div>
                        
                                <!-- <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" value="<?= $user['password'] ?>" name="password" class="form-control" placeholder="Enter password user" required>
                                </div> -->

                                <div class="form-group">
                                    <label>Bidang / Bagian</label>
                                    <select name="id_divisi" class="form-control">
                                    <?php $cek = $user['id_divisi'] ?> 
                                    <?php foreach ($divisi as $key => $div) { ?>
                                        <option value="<?= $div['id_divisi'] ?>" <?= ($div['id_divisi']==$cek) ? 'selected' : ''; ?>><?= $div['nama_divisi'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Foto</label>
                                        <img src="<?= base_url('img/ava/' . $user['foto']) ?>" width="150" height="120" style="object-fit: contain;" class="shadow-lg p-2 rounded-sm">
                                    </div>
                                    <div class="col-md-8">
                                        <label>Ganti Foto</label>
                                        <input type="file" name="foto" class="p-1 form-control">
                                    </div>
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
            <!-- End of Edit Modal -->

            <!-- Ubah Password -->
            <div class="modal fade" id="passwordModal<?= $user['id_user'] ?>" tabindex="-1" role="dialog" 
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <?php //echo base_url('user/ganti_password/' . $user['id_user']); ?>
                            <form action="<?= base_url('user/ganti_password/' . $user['id_user']) ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                            <div class="form-group">
                                <label>Kata Sandi Lama</label>
                                <input type="password" value="<?= old('opwd')?>" class="form-control border-left-info" name="opwd" >
                            </div>
                        
                            <div class="form-group">
                                <label>Kata Sandi Baru</label>
                                <input type="password" value="<?= old('npwd')?>" class="form-control border-left-info" name="npwd" >
                            </div>

                            <div class="form-group">
                                <label>Konfirmasi Kata Sandi Baru</label>
                                <input type="password" value="<?= old('cnpwd')?>" class="form-control border-left-info" name="cnpwd" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        <?php // echo form_close() ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of ubah password -->


            
<?=$this->endSection(); ?>
