<?= $this->extend('templates/navbar'); ?>


<?=$this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1> 
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
                    </div>

                    <div class="row">

                        <div class="col-lg-12 justfy-content-center">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark"><?= $vpenerjemah['nama'].', '?> <span class="text-primary"><?= $vpenerjemah['instansi'] .' - '. $vpenerjemah['unit_kerja'] ?></span></h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $attributes = array('id' => 'form-edit-'.$vpenerjemah['id_penerjemah']);
                                    echo form_open('penerjemah/update2/', $attributes);
                                    ?> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="hidden" name='id_penerjemah' value="<?= $vpenerjemah['id_penerjemah'] ?>">
                                                <div class="form-group">
                                                    <label>NAMA</label>
                                                    <input type="text" class="form-control border-left-info" name="nama" value="<?= $vpenerjemah['nama'] ?>" placeholder="Nama Penerjemah">    
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Tempat Lahir</label>
                                                    <input type="text" class="form-control border-left-info" name="tempat" value="<?= $vpenerjemah['tempat'] ?>" placeholder="Tempat Lahir">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="date" class="form-control border-left-info" min="1945-01-01" max="2021-01-01" name="tanggal_lahir" value="<?= $vpenerjemah['tanggal_lahir'] ?>" placeholder="yyyy-mm-dd">
                                                </div>

                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control border-left-info" name="email" value="<?= $vpenerjemah['email'] ?>" placeholder="Email">
                                                </div>

                                                <div class="form-group">
                                                    <label>Nomor Telepon</label>
                                                    <input type="text" class="form-control border-left-info" name="telepon" value="<?= $vpenerjemah['telepon'] ?>" placeholder="No. Telepon">
                                                </div>

                                                <div class="form-group">
                                                    <label>Status Penerjemah</label>
                                                        <select name="status" class="form-control border-left-info">
                                                        <?php $status = $vpenerjemah['status'] ?> 
                                                            <option value="<?= $vpenerjemah['status']?>">

                                                                <?php if ($status == 'Aktif') {
                                                                    echo 'Aktif';
                                                                } else {
                                                                    echo 'Tidak Aktif';
                                                                } 
                                                                ?>
                                                            </option>
                                                            <option value="Aktif">Aktif</option>
                                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                                        </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>NIP</label>
                                                    <input type="text" class="form-control border-left-info" name="nip" value="<?= $vpenerjemah['nip'] ?>" placeholder="NIP">
                                                </div>

                                                <div class="form-group">
                                                    <label>Pangkat / Golongan</label>
                                                    <input readonly type="text" class="form-control border-left-info" name="golongan" value="<?= $vpenerjemah['golongan'] ?>" >
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label>TMT</label>
                                                    <input readonly type="date" class="form-control border-left-info" name="tmtgol" value="<?= $vpenerjemah['tmtgol'] ?>" >
                                                </div>

                                                <div class="form-group ">
                                                    <label>Jabatan</label>
                                                    <input readonly type="text" class="form-control border-left-info" name="jabatan" value="<?= $vpenerjemah['jabatan'] ?>" >
                                                </div>

                                                <div class="form-group">
                                                    <label>TMT</label>
                                                    <input readonly type="date" class="form-control border-left-info" name="tmtjab" value="<?= $vpenerjemah['tmtjab'] ?>" >
                                                </div> 
                                                
                                                <div class="form-group ">
                                                <label>Instansi</label>
                                                    <select name="id_instansi_penerjemah" class="form-control border-left-info">
                                                        <?php $selected = $vpenerjemah['id_instansi_penerjemah'] ?> 
                                                        <?php foreach($instansi as $key => $inst) {?>
                                                        <option value="<?= $inst['id_instansi']?>" <?= ($inst['id_instansi']==$selected) ? 'selected' : ''; ?>><?= $inst['instansi']?> - <?= $inst['unit_kerja'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                

                                                <button type="submit" form="<?='form-edit-'.$vpenerjemah['id_penerjemah'] ?>" class="btn btn-primary float-right ml-1">Ubah</button>
                                                <a href="<?= base_url('penerjemah'); ?>" type="button" class="btn btn-secondary float-right">Kembali</a>
                                            </div>
                                        </div>
                                        <?php form_close(); ?>
                                        
            
                                        

                                        
                                    </div>
                                </div>
                        </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?=$this->endSection(); ?>
