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
                                <!-- <div class="col-sm-6"> -->
                                    <button type="button" class="btn btn-info btn-icon-split mx-2" data-toggle="modal" data-target="#addModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                                    </button>
                                    <form action="<?= base_url('surat_keluar/export')?>" method="POST">
                                        <button class="btn btn-success btn-icon-split mr-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-file-excel"></i>
                                            </span>
                                            <span class="text">Cetak Data</span>
                                        </button>
                                    </form>
                                <!-- </div> -->
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
                                    <tr >
                                            <th style="vertical-align: middle;" class="text-center">No.</th>
                                            <th style="vertical-align: middle;" >No. Surat</br>Tanggal Surat</th>
                                            <th style="vertical-align: middle;" >Tanggal Kirim</th>
                                            <th style="vertical-align: middle;" >Perihal</br>File</th>
                                            <th style="vertical-align: middle;" >Tujuan</th>
                                            <th style="vertical-align: middle;" >Pengolah</br>KTJ</th>
                                            <th style="vertical-align: middle;">Disposisi Seskab</th>
                                            <th style="vertical-align: middle;">Disposisi Waseskab</th>
                                            <th style="vertical-align: middle;">Disposisi Deputi</th>
                                            <th style="vertical-align: middle;">Disposisi Kapus</th>
                                            <th style="vertical-align: middle;"  style="align-items: justify;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ; 
                                    setlocale(LC_TIME, 'id-ID'); ?>
                                    <?php foreach($surat_keluar as $key => $value) { ?>
                                        
                                            <tr class="text-wrap">
                                                <td class="text-center" style="vertical-align: middle;"><?= $i++; ?>.</td>
                                                <td style="vertical-align: middle;">
                                                    <?= $value['no_surat']; ?> 
                                                    <hr class="divider my-1" style="border: none; border-bottom: 1px solid rgba(0,0,0,0.2);">
                                                    <?= strftime('%A, %d %B %Y', strtotime($value['tgl_surat'])); ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= strftime('%A, %d %B %Y', strtotime($value['tgl_kirim']));?></td>
                                                
                                                
                                                <td style="vertical-align: middle;">
                                                    <?= $value['perihal']; ?>
                                                    <hr class="divider my-1" style="border: none; border-bottom: 1px solid rgba(0,0,0,0.2);">
                                                    <strong>File: </strong><a style="color: primary; text-decoration: none; font-style:italic;" href="<?= $value['link'] ?>"><?= $value['link']; ?></a>
                                                </td>
                                                <td style="vertical-align: middle;"><?= $value['tujuan'];?></td>
                                                <td style="vertical-align: middle;">
                                                    <?= $value['nama_divisi']; ?>
                                                    <hr class="divider my-1" style="border: none; border-bottom: 1px solid rgba(0,0,0,0.2);">
                                                    <?= $value['kode_tugas']; ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_seskab']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_waseskab']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_deputi']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_kapus']; ?></td>
                                                <!-- <td style="vertical-align: middle;"><a href="<?= $value['link'] ?>"><?= $value['link']; ?></a></td> -->
                                                <td style="vertical-align: middle;">
                                                    <div style="display: inline-flex;">
                                                        <button value="<?= $value['divisi'].'|'.$value['no_ktj'] ?>" id="btn-edit<?= $value['id_suratKeluar'] ?>" class="btn btn-icon-split btn-info btn-sm mr-1 btn-edit-ktj"
                                                        data-toggle="modal" data-target="#editModal<?= $value['id_suratKeluar'];?>">
                                                        <span class="icon text-white-50">
                                                        <i class="fas fa-edit" ></i>
                                                        </span>
                                                        <span class="text">Edit</span>
                                                        </button>
                                                        <button class="btn btn-icon-split btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#deleteModal<?= $value['id_suratKeluar']; ?>">
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah data File Surat Keluar</h5>
                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <?php echo form_open('surat_keluar/save');
                                    helper('text'); 
                                    // $no_arsip = random_string('numeric', 5). '/ARSIP/' .date('m/Y');
                                ?>

                                

                                <div class="form-group">
                                <label for="divisi">Bidang / Bagian</label>
                                    <select name="divisi" id="divisi" class="form-control border-left-info divisi">
                                        <option value="">-Pilih Bidang / Bagian-</option>
                                        <?php foreach ($divisi as $row) 
                                        { ?>
                                            <option value="<?php echo $row->id_divisi; ?>"> <?php echo $row->nama_divisi; ?>
                                            </option>
                                        <?php } ?>
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="ktj">KTJ</label>
                                    <select name="no_ktj" id="ktj" class="form-control form-control-md border-left-info ktj" >
                                        <option value="">-Pilih KTJ-</option>
                                    </select>
                                </div>

                                
                            
                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <input type="text" class="form-control border-left-info" name="no_surat" placeholder="Masukkan No. Surat" >
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 input-group">
                                        <label>Tanggal Surat</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                                <input type="text" class="datepicker form-control from_date" placeholder="yyyy-mm-dd" name="tgl_surat" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <label>Tanggal Kirim</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                                    <input type="text" class="datepicker form-control to_date" placeholder="yyyy-mm-dd" name="tgl_kirim" >
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label>Tujuan</label>
                                        <input type="text" class="form-control border-left-info" name="tujuan" placeholder="Masukkan tujuan surat" >
                                </div>

                                <div class="form-group">
                                    <label>Perihal</label>
                                    <textarea  class="form-control border-left-info" name="perihal" cols="53" rows="3"> </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi seskab</label>
                                    <textarea name="disposisi_seskab" cols="53" rows="3" class="form-control border-left-info"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi Waseskab</label>
                                    <textarea name="disposisi_waseskab" cols="53" rows="3" class="form-control border-left-info"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi Deputi</label>
                                    <textarea name="disposisi_deputi" cols="53" rows="3" class="form-control border-left-info"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi Kapus</label>
                                    <textarea name="disposisi_kapus" cols="53" rows="3" class="form-control border-left-info"></textarea>
                                </div>

                                <div class="form-group">
                                    <label >Link Netbox</label>
                                    <input type="text" name="link" class="form-control border-left-info" placeholder="Masukkan link netbox surat" >
                                </div>
                            
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                                <?php echo form_close() ?>
                            
                        </div>
                    </div>
                </div>
                <!-- End of Add modal -->

                <!-- Edit Modal -->
                <?php foreach($surat_keluar as $key => $value) { ?>
                    <div class="modal fade" id="editModal<?= $value['id_suratKeluar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit data </h5>
                                        <button type="button" class="close  clear-divisi" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                    <?php
                                    $attributes = array('id' => 'form-edit-'.$value['id_suratKeluar']);
                                    echo form_open('surat_keluar/update/', $attributes);
                                    ?>     
                                                    
                                    <input type="hidden" name='id_suratKeluar' value="<?= $value['id_suratKeluar'] ?>">

                                <div class="form-group">
                                <label for="divisi">Bidang / Bagian</label>
                                    <select name="divisi" id="divisi" class="form-control border-left-info divisi" >
                                        <?php $cek = $value['divisi'] ?>
                                        <?php foreach ($divisi as $row) 
                                        { ?>
                                            <option value="<?php echo $row->id_divisi; ?>" <?= ($row->id_divisi == $cek) ? 'selected' : ''; ?>> <?= $row->nama_divisi; ?>
                                            </option>
                                        <?php } ?>
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                <label for="ktj">KTJ</label>
                                    <select name="no_ktj" id="ktj"  class="form-control form-control-md border-left-info ktj" >
                                    </select>
                                </div>

                                <!-- <div class="form-group">
                                    <label>No. Surat</label>
                                    <input type="text" class="form-control border-left-info" name="no_surat" value="<?= $value['no_surat'] ?>" placeholder="Masukkan Nomor Surat" required>
                                </div> -->
                                
                                

                                <div class="form-group">
                                    <label>No. Surat</label>
                                    <input type="text" class="form-control border-left-info" name="no_surat" placeholder="Masukkan No. Surat"  value="<?= $value['no_surat'] ?>">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 input-group">
                                        <label>Tanggal Surat</label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                                <input type="text" class="datepicker form-control from_date" value="<?= $value['tgl_surat'] ?>" placeholder="yyyy-mm-dd" name="tgl_surat" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <label>Tanggal Kirim</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <span><i class="fas fa-fw fa-calendar mr-1"></i></span>
                                                    <input type="text" class="datepicker form-control to_date" value="<?= $value['tgl_kirim'] ?>" placeholder="yyyy-mm-dd" name="tgl_kirim" >
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" class="form-control border-left-info" name="tujuan" placeholder="Masukkan Tujuan Surat"  value="<?= $value['tujuan'] ?>">
                                </div>

                                <div class="form-group">
                                    <label>Perihal</label>
                                    <textarea  class="form-control border-left-info" name="perihal" cols="53" rows="3"> <?= $value['perihal'] ?> </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi seskab</label>
                                    <textarea name="disposisi_seskab" cols="53" rows="3" class="form-control border-left-info"> <?= $value['disposisi_seskab'] ?> </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi Waseskab</label>
                                    <textarea name="disposisi_waseskab" cols="53" rows="3" class="form-control border-left-info"> <?= $value['disposisi_waseskab'] ?> </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi Deputi</label>
                                    <textarea name="disposisi_deputi" cols="53" rows="3" class="form-control border-left-info"> <?= $value['disposisi_deputi'] ?> </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Disposisi Kapus</label>
                                    <textarea name="disposisi_kapus" cols="53" rows="3" class="form-control border-left-info"> <?= $value['disposisi_kapus'] ?> </textarea>
                                </div>

                                <div class="form-group">
                                    <label >Link Netbox</label>
                                    <input type="text" name="link" class="form-control border-left-info" placeholder="Masukkan link netbox surat"  value="<?= $value['link'] ?>">
                                </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                    <button type="submit" form="<?='form-edit-'.$value['id_suratKeluar'] ?>" class="btn btn-primary">Save</button>
                                </div>
                                <?php form_close(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End of Edit Modal -->

                <!-- Delete Modal -->
                <?php foreach ($surat_keluar as $key => $value) { ?>                            
                        <div class="modal fade" id="deleteModal<?= $value['id_suratKeluar'] ?>" tabindex="-1" role="dialog" 
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
                                        Apakah Anda yakin ingin menghapus data ini ?
                                            
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('surat_keluar/delete/'. $value['id_suratKeluar']) ?>" type="submit" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <!-- End of Delete Modal -->
            <!-- End of Crud Modal -->

            <!-- tgl -->
            <!-- <script type="text/javascript">
                $(function(){
                    $(".datepicker").datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        todayHighlight: true,
                    });
                    $(".from_date").on('changeDate', function(selected) {
                        var startDate = new Date(selected.date.valueOf());
                        $(".to_date").datepicker('setStartDate', startDate);
                        if($(".from_date").val() > $(".to_date").val()){
                        $(".to_date").val($(".from_date").val());
                        }
                    });
                });
            </script> -->

            <!-- Ajax request -->
                <script>
                    $(document).ready(function(){
                        //divisi Change
                        $('.divisi').change(function(){
                            var id_divisi = $(this).val();           
                            console.log('KEPANGGIL');  
                            
                                $.ajax({
                                    url:'<?= base_url('/surat_keluar/getKTJDivisi'); ?>',
                                    method: 'post',
                                    data:{id_bagian: id_divisi},
                                    dataType:"json",
                                    success:function(response)
                                    {
                                        console.log(response);
                                        //remove options
                                        $('.ktj').find('option').not(':first').remove();
                                        $.each(response, function(index,data){
                                            $('.ktj').append('<option value="'+data['id_tugas']+'">'+data['kode_tugas']+'</option>');
                                            });
                                    }
                                });
                        });

                        $('.btn-edit-ktj').click(function() { 
                            var dataval = $(this).val(); // AMBIL STRING
                            var dataarr = dataval.split("|"); // STRING DIPISAH PAKE PIPE "|" ABIS DIPISAH JADI ARRAY
                            var id_divisi = dataarr[0]; // DATA KE 0 ADALAH ID_DIVISI
                            var no_ktj = dataarr[1]; // DATA KE 1 ADALAH NO_KTJ
                                      
                            console.log('KEPANGGIL');  
                            
                                $.ajax({
                                    url:'<?= base_url('/surat_keluar/getKTJDivisi'); ?>',
                                    method: 'post',
                                    data:{id_bagian: id_divisi},
                                    dataType:"json",
                                    success:function(response)
                                    {
                                        console.log(response);
                                        //remove options
                                        $('.ktj').find('option').not(':first').remove();
                                        $.each(response, function(index,data){
                                            var selected = (no_ktj == data['id_tugas']) ? "selected" : "";
                                            $('.ktj').append('<option value="'+data['id_tugas']+'"'+selected+'>'+data['kode_tugas']+'</option>');
                                            });
                                    }
                                });
                            
                        });
                        

                        $('.clear-ktj').click(function() { 
                            $('.divisi').html('<option value="">=== Select Bidang / Bagian ===</option>');
                            $('.ktj').html('<option value="">=== Select KTJ ===</option>');

                            
                        });
                                                
                    });
                </script>
            <!-- End of AJax request -->
<?=$this->endSection(); ?>

<?=$this->include('templates/footer'); ?>