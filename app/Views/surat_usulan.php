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
                    <form action="<?= base_url('surat_usulan/export')?>" method="POST">
                        <button class="btn btn-success btn-icon-split mr-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-file-excel"></i>
                            </span>
                            <span class="text">Cetak Data</span>
                        </button>
                    </form>
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
                <!-- <div class="alert alert-success alert-dismissible">
                Surat Usulan berhasil dihapus...
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div> -->
                
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table row-border" id="dataTable" width="100%" cellspacing="0">
                    <thead style=" background: #d7f1f5;">
                        <tr>
                            <th style="vertical-align: middle;" class="text-center">No.</th>
                            <th style="vertical-align: middle;">No. Surat</br>Tanggal Surat</th>
                            <th style="vertical-align: middle;">Tanggal Diterima</th>
                            <th style="vertical-align: middle;">Jenis Surat</th>
                            <th style="vertical-align: middle;">Perihal</br>File</th>
                            <th style="vertical-align: middle;">Pengirim</th>
                            <th style="vertical-align: middle;">Pengolah</th>
                            <th style="vertical-align: middle;">Keterangan</th>
                            <th style="vertical-align: middle;">Status</th>
                            <th style="vertical-align: middle;" width="50px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1 ; 
                    setlocale(LC_TIME, 'id-ID');?>
                    <?php foreach($usulan as $key => $value) { ?>
                            <tr>
                                <td class="text-center" style="vertical-align: middle;"><?= $i++; ?>.</td>
                                <td style="vertical-align: middle;">
                                    <?= $value['no_surat'] ?> 
                                    <hr class="divider my-1" style="border-bottom: 1px solid rgba(0,0,0,0.2);">
                                    <?php echo strftime('%A, %d %B %Y', strtotime($value['tgl_surat'])); ?>
                                </td>
                                <td style="vertical-align: middle;">
                                <?php echo strftime('%A, %d %B %Y', strtotime($value['tgl_diterima'])); ?>
                                </td>
                                <td style="vertical-align: middle;"><?= $value['nama_kategori']; ?></td>
                                <td style="vertical-align: middle;">
                                    <?= $value['perihal']; ?>
                                    <hr class="divider my-1" style="border-bottom: 1px solid rgba(0,0,0,0.2);">
                                    <strong>File: </strong><a style="color: primary; text-decoration: none; font-style:italic;" href="<?= $value['link'] ?>"><?= $value['link']; ?></a>
                                </td>
                                <td style="vertical-align: middle;"><?= $value['pengirim']; ?></td>
                                <td style="vertical-align: middle;"><?= $value['nama_divisi']; ?></td>
                                <td style="vertical-align: middle;"><?= $value['keterangan']; ?></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <?php if ($value['status'] == 'Diajukan'){
                                        echo '<i class="fas fa-minus-circle btn-secondary btn-circle" title="Diajukan / Dalam Proses"></i>';
                                    } elseif ($value['status'] == 'Ditolak'){
                                        echo '<i class="fas fa-times-circle btn-danger btn-circle" title="Ditolak"></i>';
                                    } elseif ($value['status'] == 'Disetujui'){
                                        echo '<i class="fas fa-check-circle btn-success btn-circle" title="Disetujui"></i>';
                                    } else {
                                        'error';
                                    }
                                    ?>
                                </td>
                                <td style="vertical-align: middle;">
                                    <div style="display: inline-flex;">
                                        <button href="" class="btn btn-icon-split btn-info btn-edit btn-sm mr-1"
                                        data-toggle="modal" data-target="#editModal<?= $value['id_suratUsulan'];?>">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-edit" ></i>
                                        </span>
                                        <span class="text">Ubah</span>
                                        </button>
                                        <button href="" class="btn btn-icon-split btn-danger btn-delete btn-sm"
                                            data-toggle="modal" data-target="#deleteModal<?= $value['id_suratUsulan']; ?>">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah data File Surat Usulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('surat_usulan/save');
            helper('text'); ?>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label>Jenis Surat</label>
                        <select name="kategori" class="form-control border-left-info">
                            <option value="">-Pilih Kategori-</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>No. Surat</label>
                        <input type="text" class="form-control border-left-info" name="no_surat" placeholder="Masukkan No. Surat" >
                    </div>
                </div>

                <div class="form-group row">
                <div class="col-md-6">
                        <label>Tanggal Surat</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                <input type="text" placeholder="yyyy-mm-dd" class="datepicker form-control from_date" name="tgl_surat" >
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label>Tanggal Diterima</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                <input type="text" placeholder="yyyy-mm-dd" class="datepicker form-control to_date" name="tgl_diterima" >
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label >Pengirim</label>
                    <input type="text" name="pengirim" class="form-control border-left-info" placeholder="Masukkan Nama / Instansi Pengirim">
                </div>

                <div class="form-group">
                    <label>Perihal</label>
                    <textarea name="perihal" cols="53" rows="3" class="form-control border-left-info"></textarea>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" cols="53" rows="3" placeholder="Masukkan keterangan status jika ditolak" class="form-control border-left-info"></textarea>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Link Netbox</label>
                        <input type="text" class="form-control border-left-info" name="link" placeholder="Masukkan Link Netbox Surat">
                    </div>

                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control border-left-info">
                            <option value="disabled diselected">-Pilih Status-</option>
                            <option value="Diajukan">Diajukan</option>
                        </select>
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
<!-- End of Add modal -->
        
    <!-- Edit Modal -->
    <?php foreach($usulan as $key => $value) { ?>
        <div class="modal fade" id="editModal<?= $value['id_suratUsulan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data <?= $value['no_surat'] ?> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <?php
                        $attributes = array('id' => 'form-edit-'.$value['id_suratUsulan']);
                        echo form_open('surat_usulan/update/', $attributes);
                        ?>     
                                        
                        <input type="hidden" name='id_suratUsulan' value="<?= $value['id_suratUsulan'] ?>">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Jenis Surat</label>
                                    <select name="kategori" class="form-control border-left-info">
                                        <?php $selected = $value['kategori'] ?>
                                        <?php foreach ($kategori as $key => $kat) { ?>
                                            <option value="<?= $kat['id_kategori'] ?>" <?= ($kat['id_kategori']==$selected) ? 'selected' : ''; ?>><?= $kat['nama_kategori'] ?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label>No. Surat</label>
                                <input type="text" class="form-control border-left-info" value="<?= $value['no_surat'] ?>" name="no_surat" placeholder="Masukkan No. Surat">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Tanggal Surat</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                        <input type="text" placeholder="yyyy-mm-dd" class="datepicker form-control from_date" name="tgl_surat" value="<?= $value['tgl_surat'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Tanggal Diterima</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                        <input type="text" placeholder="yyyy-mm-dd" class="datepicker form-control to_date" name="tgl_diterima" value="<?= $value['tgl_diterima'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label >Pengirim</label>
                            <input type="text" name="pengirim" class="form-control border-left-info" placeholder="Masukkan Nama / Instansi Pengirim" value="<?= $value['pengirim'] ?>">
                        </div>
                        

                        <div class="form-group">
                            <label>Perihal</label>
                                <textarea name="perihal"  cols="53" rows="3" class="form-control border-left-info"><?= $value['perihal'] ?></textarea>
                        </div>
                            
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Link Netbox</label>
                                <input type="text" class="form-control border-left-info" value="<?= $value['link'] ?>"  name="link" placeholder="Masukkan Link Netbox Surat">
                            </div>

                            <div class="col-md-6">
                                <label>Status</label>
                                <select name="status" class="form-control border-left-info">
                                    <?php $cek = $value['status'] ?> 
                                    <option value="<?= $value['status'] ?>">
                                    <?php if ($cek == 'Diajukan') {
                                            echo 'Diajukan';
                                        } elseif ($cek == 'Ditolak') {
                                            echo 'Ditolak';
                                        } elseif ($cek == 'Disetujui') {
                                            echo 'Disetujui';
                                        } else {
                                            echo 'Error';
                                        }
                                        ?>

                                    </option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Disetujui">Disetujui</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" form="<?='form-edit-'.$value['id_suratUsulan'] ?>" class="btn btn-primary">Simpan</button>
                    </div>
                    <?php form_close(); ?>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End of Edit Modal -->

    <!-- Delete Modal -->
        <?php foreach ($usulan as $key => $value) { ?>                            
            <div class="modal fade" id="deleteModal<?= $value['id_suratUsulan'] ?>" tabindex="-1" role="dialog" 
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $value['no_surat'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus data ini ???
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="<?= base_url('surat_usulan/delete/'. $value['id_suratUsulan']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <!-- End of Delete Modal -->
<!-- End of Crud Modal -->

            
<?=$this->endSection(); ?>

<?=$this->include('templates/footer'); ?>