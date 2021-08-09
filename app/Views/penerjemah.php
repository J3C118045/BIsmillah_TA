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
                                    <form action="<?= base_url('penerjemah/export')?>" method="POST">
                                        <button class="btn btn-success btn-icon-split mr-2">
                                            <span class="icon text-white-50">
                                                <i class="far fa-file-excel"></i>
                                            </span>
                                            <span class="text">Cetak Data</span>
                                        </button>
                                    </form>
                                    <form action="<?= base_url('penerjemah/exportLabel')?>" method="POST">
                                        <button class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-file-download"></i>
                                            </span>
                                            <span class="text">Cetak Label</span>
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
                                <table class="table row-border " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr >
                                            <th style="vertical-align: middle;" class="text-center">No.</th>
                                            <th style="vertical-align: middle;">Nama</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Unit Kerja</th>
                                            <th style="vertical-align: middle;">Status Penerjemah</th>
                                            <th style="vertical-align: middle;" width="50px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php $i = 1; ?>
                                        <?php foreach ($penerjemah as $key => $value) { ?>
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle;"><?= $i++; ?>.</td>
                                                <td style="vertical-align: middle;"><?= $value['nama'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['instansi'] ?></td>
                                                <td style="vertical-align: middle;"><?= $value['unit_kerja'] ?></td>
                                                <td class="text-center" style="vertical-align: middle;">
                                                    <?php 
                                                        if ($value['status'] == 'Aktif') {
                                                            # code...
                                                            echo '<i class="fas fa-check fa-2x btn-circle btn-success"  title="Penerjemah Aktif"></i>';
                                                        } else {
                                                            echo '<i class="fas fa-times fa-2x btn-circle btn-danger" title="Penerjemah Tidak Aktif"></i>';
                                                        }
                                                    ?>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                        <a href="<?= base_url('penerjemah/detail/'. $value['id_penerjemah']) ?>" 
                                                        class="btn btn-info btn-icon-split btn-sm mb-1">
                                                        <span class="icon text-white-50">
                                                        <i class="fas fa-eye" ></i>
                                                        </span>
                                                        <span class="text">Detail</span>
                                                        </a>
                                                        <!-- <button class="btn btn-warning btn-sm mr-1" 
                                                            data-toggle="modal" data-target="#editModal<?= $value['id_penerjemah']; ?>">
                                                        <span class="text-white-50">
                                                        <i class="fas fa-edit" ></i>
                                                        </span>
                                                        <span class="text">Edit</span>
                                                        </button> -->
                                                        <button class="btn btn-icon-split btn-danger btn-sm "
                                                        data-toggle="modal" data-target="#deleteModal<?= $value['id_penerjemah']; ?>">
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penerjemah</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php echo form_open('penerjemah/save') ?>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" class="form-control border-left-info" name="nip" placeholder="NIP">
                                </div>
                                
                                <div class="form-group">
                                    <label>NAMA</label>
                                    <input type="text" class="form-control border-left-info" name="nama" placeholder="Nama Penerjemah">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control border-left-info" name="tempat" placeholder="Tempat Lahir">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" min="1945-01-01" max="2021-01-01" class="form-control border-left-info" name="tanggal_lahir" placeholder="yyyy-mm-dd">
                                    </div>
                                    
                                </div>

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control border-left-info" name="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control border-left-info" name="telepon" placeholder="No. Telepon">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Pangkat / Golongan</label>
                                            <select name="golongan" class="form-control border-left-info">
                                                <option value="disabled diselected">-Select-</option>
                                                    <option value="I/a/Juru Muda">I/A - Juru Muda</option>
                                                    <option value="I/b/Juru Muda Tingkat I">I/B - Juru Muda Tingkat I</option>
                                                    <option value="I/c/Juru ">I/C - Juru</option>
                                                    <option value="I/d/Juru Tingkat I">I/D - Juru Tingkat I</option>
                                                    <option value="II/a/Pengatur Muda ">II/A - Pengatur Muda</option>
                                                    <option value="II/b/Pengatur Muda Tingkat I ">II/B - Pengatur Muda Tingkat I</option>
                                                    <option value="II/c/Pengatur ">II/C - Pengatur</option>
                                                    <option value="II/d/Pengatur Tingkat I ">II/D - Pengatur Tingkat I</option>
                                                    <option value="III/a/Penata Muda ">III/A - Penata Muda</option>
                                                    <option value="III/b/Penata Muda Tingkat I ">III/B - Penata Muda Tingkat I</option>
                                                    <option value="III/c/Penata ">III/C - Penata</option>
                                                    <option value="III/d/Penata Tingkat I ">III/D - Penata Tingkat I</option>
                                                    <option value="IV/a/Pembina ">IV/A - Pembina</option>
                                                    <option value="IV/b/Pembina Tingkat I ">IV/B - Pembina Tingkat I</option>
                                                    <option value="IV/c/Pembina Utama Muda ">IV/C - Pembina Utama Muda</option>
                                                    <option value="IV/d/Pembina Utama Madya ">IV/D - Pembina Utama Madya</option>
                                                    <option value="IV/e/Pembina Utama ">IV/E - Pembina Utama</option>
                                            </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label>TMT</label>
                                        <input type="date" class="form-control border-left-info" name="tmtgol" >
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Jabatan</label>
                                        <select name="jabatan" class="form-control border-left-info">
                                            <option value="disabled diselected">-Select-</option>
                                            <option value="Penerjemah Ahli Pertama">Penerjemah Ahli Pertama</option>
                                            <option value="Penerjemah Ahli Muda">Penerjemah Ahli Muda</option>
                                            <option value="Penerjemah Ahli Madya">Penerjemah Ahli Madya</option>
                                            <option value="Penerjemah Ahli Utama">Penerjemah Ahli Utama</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label>TMT</label>
                                        <input type="date" class="form-control border-left-info" name="tmtjab" >
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Instansi</label>
                                        <select name="id_instansi_penerjemah" class="form-control form-control-md border-left-info" >
                                            <option value="disabled diselected" style="width: 300px;">-Select-</option>
                                            <?php foreach($instansi as $key => $value) {?>
                                            <option value="<?= $value['id_instansi']?>"><?= $value['instansi'] ?> - <?= $value['unit_kerja'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Status Penerjemah</label>
                                            <select name="status" class="form-control border-left-info">
                                                <option value="disabled diselected">-Select-</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
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
                <!-- End of Add Modal -->

                <!-- Edit Modal -->
                <?php foreach($penerjemah as $key => $value) { ?>
                    <div class="modal fade" id="editModal<?= $value['id_penerjemah'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit data <?= $value['nama'] ?> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php
                        $attributes = array('id' => 'form-edit-'.$value['id_penerjemah']);
                        echo form_open('penerjemah/update/', $attributes);
                        ?>     
                                             
                            <input type="hidden" name='id_penerjemah' value="<?= $value['id_penerjemah'] ?>">
                            <div class="form-group">
                                <label>NAMA</label>
                                <input type="text" class="form-control border-left-info" name="nama" value="<?= $value['nama'] ?>" placeholder="Nama Penerjemah">
                            </div>
                            
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control border-left-info" name="nip" value="<?= $value['nip'] ?>" placeholder="NIP">
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control border-left-info" name="tempat" value="<?= $value['tempat'] ?>" placeholder="Tempat Lahir">
                                </div>

                                <div class="col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control border-left-info" min="1945-01-01" max="2021-01-01" name="tanggal_lahir" value="<?= $value['tanggal_lahir'] ?>" placeholder="yyyy-mm-dd">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" class="form-control border-left-info" name="email" value="<?= $value['email'] ?>" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control border-left-info" name="telepon" value="<?= $value['telepon'] ?>" placeholder="No. Telepon">
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Pangkat / Golongan</label>
                                        <select name="golongan" class="form-control border-left-info">
                                            <?php $selected = $value['golongan'] ?> 
                                            <option value="<?= $value['golongan']?>">
                                                <?php if ($selected == 'I/a/Juru Muda') {
                                                        echo 'I/A - Juru Muda';
                                                    } elseif ($selected == 'I/b/Juru Muda Tingkat I') {
                                                        echo 'I/B - Juru Muda Tingkat I';
                                                    } elseif ($selected == 'I/c/Juru') {
                                                        echo 'I/C - Juru';
                                                    } elseif ($selected == 'I/d/Juru Tingkat I') {
                                                        echo 'I/D - Juru Tingkat I';
                                                    } elseif ($selected == 'II/a/Pengatur Muda') {
                                                        echo 'II/A - Pengatur Muda';
                                                    } elseif ($selected == 'II/b/Pengatur Muda Tingkat I') {
                                                        echo 'II/B - Pengatur Muda Tingkat I';
                                                    } elseif ($selected == 'II/c/Pengatur') {
                                                        echo 'II/C - Pengatur';
                                                    } elseif ($selected == 'II/d/Juru') {
                                                        echo 'II/D - Pengatur Tingkat I';
                                                    } elseif ($selected == 'III/a/Penata Muda') {
                                                        echo 'III/A - Penata Muda';
                                                    } elseif ($selected == 'I/b/Penata Muda Tingkat I') {
                                                        echo 'III/B - Penata Muda Tingkat I';
                                                    } elseif ($selected == 'III/c/Penata') {
                                                        echo 'III/C - Penata';
                                                    } elseif ($selected == 'III/c/Penata Tingkat I') {
                                                        echo 'III/D - Penata Tingkat I';
                                                    } elseif ($selected == 'IV/a/Pembina') {
                                                        echo 'IV/A - Pembina';
                                                    } elseif ($selected == 'IV/b/Pembina Tingkat I') {
                                                        echo 'IV/B - Pembina Tingkat I';
                                                    } elseif ($selected == 'IV/c/Pembina Utama Muda') {
                                                        echo 'IV/C - Pembina Utama Muda';
                                                    } elseif ($selected == 'IV/d/Pembina Utama Madya') {
                                                        echo 'IV/D - Pembina Utama Madya';
                                                    } elseif ($selected == 'IV/e/Pembina Utama') {
                                                        echo 'IV/E - Pembina Utama';
                                                    } else {
                                                        echo 'error';
                                                    }
                                                ?>
                                            </option>
                                            <option value="I/a/Juru Muda">I/A - Juru Muda </option>
                                            <option value="I/b/Juru Muda Tingkat I">I/B - Juru Muda Tingkat I</option>
                                            <option value="I/c/Juru ">I/C - Juru</option>
                                            <option value="I/d/Juru Tingkat I">I/D - Juru Tingkat I</option>
                                            <option value="II/a/Pengatur Muda ">II/A - Pengatur Muda</option>
                                            <option value="II/b/Pengatur Muda Tingkat I ">II/B - Pengatur Muda Tingkat I</option>
                                            <option value="II/c/Pengatur ">II/C - Pengatur</option>
                                            <option value="II/d/Pengatur Tingkat I ">II/D - Pengatur Tingkat I</option>
                                            <option value="III/a/Penata Muda ">III/A - Penata Muda</option>
                                            <option value="III/b/Penata Muda Tingkat I ">III/B - Penata Muda Tingkat I</option>
                                            <option value="III/c/Penata ">III/C - Penata</option>
                                            <option value="III/d/Penata Tingkat I ">III/D - Penata Tingkat I</option>
                                            <option value="IV/a/Pembina ">IV/A - Pembina</option>
                                            <option value="IV/b/Pembina Tingkat I ">IV/B - Pembina Tingkat I</option>
                                            <option value="IV/c/Pembina Utama Muda ">IV/C - Pembina Utama Muda</option>
                                            <option value="IV/d/Pembina Utama Madya ">IV/D - Pembina Utama Madya</option>
                                            <option value="IV/e/Pembina Utama ">IV/E - Pembina Utama</option>
                                        </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>TMT</label>
                                    <input type="date" class="form-control border-left-info" name="tmtgol" value="<?= $value['tmtgol'] ?>" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Jabatan</label>
                                        <select name="jabatan" class="form-control border-left-info">
                                            <?php $cek = $value['jabatan'] ?> 
                                            <option value="<?= $value['jabatan']?>">

                                                <?php if ($cek == 'Penerjemah Ahli Pertama') {
                                                    echo 'Penerjemah Ahli Pertama';
                                                } elseif ($cek == 'Penerjemah Ahli Muda') {
                                                    echo 'Penerjemah Ahli Muda';
                                                } elseif ($cek == 'Penerjemah Ahli Madya') {
                                                    echo 'Penerjemah Ahli Madya';
                                                } elseif ($cek == 'Penerjemah Ahli Utama') {
                                                    echo 'Penerjemah Ahli Utama';
                                                } else {
                                                    echo 'Error';
                                                }
                                                ?>
                                            </option>
                                            <option value="Penerjemah Ahli Pertama">Penerjemah Ahli Pertama</option>
                                            <option value="Penerjemah Ahli Muda">Penerjemah Ahli Muda</option>
                                            <option value="Penerjemah Ahli Madya">Penerjemah Ahli Madya</option>
                                            <option value="Penerjemah Ahli Utama">Penerjemah Ahli Utama</option>
                                        </select>
                                </div>

                                <div class="col-md-6">
                                    <label>TMT</label>
                                    <input type="date" class="form-control border-left-info" name="tmtjab" value="<?= $value['tmtjab'] ?>" >
                                </div>  
                            </div>
            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Instansi</label>
                                    <select name="id_instansi_penerjemah" class="form-control border-left-info">
                                        <?php $selected = $value['id_instansi_penerjemah'] ?> 
                                        <?php foreach($instansi as $key => $inst) {?>
                                        <option value="<?= $inst['id_instansi']?>" <?= ($inst['id_instansi']==$selected) ? 'selected' : ''; ?>><?= $inst['instansi']?> - <?= $inst['unit_kerja'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Status Penerjemah</label>
                                        <select name="status" class="form-control border-left-info">
                                        <?php $status = $value['status'] ?> 
                                            <option value="<?= $value['status']?>">

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

                            
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" form="<?='form-edit-'.$value['id_penerjemah'] ?>" class="btn btn-primary">Simpan</button>
                        </div>
                        <?php form_close(); ?>
                        </form>
                        </div>
                    </div>
                    </div>
                <?php } ?>
                <!-- End of Edit Modal -->

                <!-- Delete Modal -->

                <?php foreach ($penerjemah as $key => $value) { ?>                            
                    <div class="modal fade" id="deleteModal<?= $value['id_penerjemah'] ?>" tabindex="-1" role="dialog" 
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $value['nama'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus data ini ???
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="<?= base_url('penerjemah/delete/'. $value['id_penerjemah']) ?>" type="submit" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                
                <!-- End of Delete Modal -->
            <!-- End of Curd Modal -->

            <!-- <script>
                $(document).ready(function(){
                    // get Edit Product
                    $('.btn-edit').on('click',function(){
                        //get Edit Penerjemah
                        const id = $(this).data('id');
                        const nip = $(this).data('nip');
                        const nama = $(this).data('nama');
                        const tempat = $(this).data('tempat');
                        const tanggal_lahir = $(this).data('tanggal_lahir');
                        const email = $(this).data('email');
                        const telepon = $(this).data('telepon');
                        const id_golongan_penerjemah = $(this).data('id_golongan_penerjemah');
                        const tmtgol = $(this).data('tmtmgol');
                        const jabatan = $(this).data('jabatan');
                        const tmtjab = $(this).data('tmtjab');
                        const id_instansi_penerjemah = $(this).data('id_instansi_penerjemah');
                        // Set data to Form Edit
                        $('.id_penerjemah').val(id);
                        $('.nip').val(nip);
                        $('.nama').val(nama);
                        $('.tempat').val(tempat);
                        $('.tanggal_lahir').val(tanggal_lahir);
                        $('.email').val(email);
                        $('.telepon').val(telepon);
                        $('.id_golongan_penerjemah').val(id_golongan_penerjemah);
                        $('.tmtgol').val(tmtgol);
                        $('.jabatan').val(jabatan);
                        $('.tmtjab').val(tmtjab);
                        $('.id_instansi_penerjemah').val(id_instansi_penerjemah).trigger('change'); 
                        // Call Modal Edit
                        $('#editModal').modal('show');

                    });
                });
            </script> -->
<?=$this->endSection(); ?>
