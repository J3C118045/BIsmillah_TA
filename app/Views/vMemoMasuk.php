<?= $this->extend('templates/navbar'); ?>


<?=$this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1> 

                    <div class="row">

                        <div class="col-lg-12 justfy-content-center">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark"><?= $vmasuk['no_surat'].', '?></h6>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $attributes = array('id' => 'form-edit-'.$vmasuk['id_memoMasuk']);
                                    echo form_open('memo_masuk/update/', $attributes);
                                    ?> 
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <input type="hidden" name='id_penerjemah' value="<?= $vmasuk['id_memoMasuk'] ?>">
                                                <div class="form-group">
                                                    <label>No. Surat</label>
                                                    <input type="text" class="form-control border-left-info" name="no_surat" value="<?= $vmasuk['no_surat'] ?>" required>    
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Tanggal Surat</label>
                                                    <input type="date" class="form-control border-left-info" name="tgl_surat" value="<?= $vmasuk['tgl_surat'] ?>" required>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label>Tanggal Diterima</label>
                                                    <input type="date" class="form-control border-left-info"  name="tgl_diterima" value="<?= $vmasuk['tgl_diterima'] ?>" required>
                                                </div>

                                                <div class="form-group">
                                                <label>Jenis Surat</label>
                                                    <select name="kategori" class="form-control border-left-info" required>
                                                        <?php $selected = $vmasuk['kategori'] ?>
                                                        <?php foreach ($kategori as $key => $kat) { ?>
                                                            <option value="<?= $kat['id_kategori'] ?>" <?= ($kat['id_kategori']==$selected) ? 'selected' : ''; ?>><?= $kat['nama_kategori'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Perihal</label>
                                                    <textarea type="text" cols="53" rows="2" class="form-control border-left-info" name="hal"><?= $value['hal'] ?> </textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Pengirim</label>
                                                    <input type="text" class="form-control border-left-info" name="pengirim" value="<?= $vmasuk['pengirim'] ?>" placeholder="NIP">
                                                </div>

                                                
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="divisi">Kepada</label>
                                                        <select name="divisi" id="divisi" class="form-control border-left-info divisi" required>
                                                            <?php $cek = $vmasuk['divisi'] ?>
                                                            <?php foreach ($divisi as $row) 
                                                            { ?>
                                                                <option value="<?php echo $row->id_divisi; ?>" <?= ($row->id_divisi == $cek) ? 'selected' : ''; ?>> <?= $row->nama_divisi; ?>
                                                                </option>
                                                            <?php } ?>
                                                            ?>
                                                        </select>
                                                </div>
                                                    
                                                <div class="form-group">
                                                <label for="ktj">Kode Tugas Jabatan</label>
                                                    <select name="no_ktj" id="ktj"  class="form-control form-control-md border-left-info ktj" required>
                                                    </select>
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label>Disposisi Waseskab</label>
                                                    <textarea name="disposisi_waseskab" cols="53" rows="2" class="form-control border-left-info"><?= $vmasuk['disposisi_waseskab'] ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Disposisi Deputi</label>
                                                    <textarea name="disposisi_deputi" cols="53" rows="2" class="form-control border-left-info"><?= $vmasuk['disposisi_deputi'] ?></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Disposisi Kapus</label>
                                                    <textarea name="disposisi_kapus" cols="53" rows="2" class="form-control border-left-info"><?= $vmasuk['disposisi_kapus'] ?></textarea>
                                                </div>

                                
                                                <div class="form-group">
                                                    <label >Link Netbox</label>
                                                    <input type="text" name="link" class="form-control border-left-info" value="<?= $vmasuk['link'] ?>" placeholder="Masukkan Link Netbox Surat" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control border-left-info">
                                                        <?php $cek = $vmasuk['status'] ?> 
                                                        <option value="<?= $vmasuk['status'] ?>">
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
                                                        <option value="Diajukan">Diajukan</option>
                                                        <option value="Ditolak">Ditolak</option>
                                                        <option value="Disetujui">Disetujui</option>
                                                    </select>
                                                </div>

                                                

                                                <button type="submit" form="<?='form-edit-'.$vmasuk['id_memoMasuk'] ?>" class="btn btn-primary float-right ml-1">Update</button>
                                                <a href="<?= base_url('memo_masuk'); ?>" type="button" class="btn btn-secondary float-right">Back</a>
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

            <!-- Ajax request -->
            <script>
                    $(document).ready(function(){
                        //divisi Change
                        $('.divisi').change(function(){
                            var id_divisi = $(this).val();           
                            console.log('KEPANGGIL');  
                            
                                $.ajax({
                                    url:'<?= base_url('/memo_masuk/getKTJDivisi'); ?>',
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
                                    url:'<?= base_url('/memo_masuk/getKTJDivisi'); ?>',
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
