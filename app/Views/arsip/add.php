<?= $this->extend('templates/navbar'); ?>


<?=$this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Surat Usulan</h1>
                    </div>
                    <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                    ?>
                    <div class="row mx-5">

                        <div class="col-md-9 mx-5">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $title?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo form_open_multipart('usulan/save');
                                    helper('text'); ?>

                                    <div class="form-group">
                                        <label>No. Surat</label>
                                        <input type="text" class="form-control" name="no_surat" placeholder="Masukkan No. Surat" required>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label>Nama Surat</label>
                                        <input type="text" class="form-control" name="nama_surat" placeholder="Masukkan Nama Surat" required>
                                    </div>

                                    <div class="form-group">
                                    <label>Kategori</label>
                                        <select name="id_kategori" class="form-control" required>
                                            <option value="">-Select Kategori-</option>
                                            <?php foreach ($kategori as $key => $value) { ?>
                                                <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="deskripsi" cols="53" rows="4" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>File Arsip Usulan</label>
                                        <input type="file" name="file_arsip" class="form-control" required>
                                        <label class="text-danger">*Format file .pdf</label>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label>Link Netbox</label>
                                        <input type="text" class="form-control" name="link" placeholder="Masukkan Link Netbox Surat" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="disabled diselected">-Select-</option>
                                            <option value="Diajukan">Diajukan</option>
                                            <option value="Ditolak">Ditolak</option>
                                            <option value="Disetujui">Disetujui</option>
                                        </select>
                                    </div>

                                    <div class="box-footer">
                                        <a href="<?= base_url('usulan') ?>" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?=$this->endSection(); ?>

<?=$this->include('templates/footer'); ?>            