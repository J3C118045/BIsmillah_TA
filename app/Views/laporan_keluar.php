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
                                    
                                <!-- </div> -->
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
                                <table class="table row-border" id="reportTable" width="100%" cellspacing="0">
                                    <thead style=" background: #d7f1f5;">
                                    <tr>
                                            <th style="vertical-align: middle;" >Tanggal Surat</th>
                                            <th style="vertical-align: middle;" >No. Surat</th>
                                            <th style="vertical-align: middle;" >Tanggal Kirim</th>
                                            <th style="vertical-align: middle;" >Perihal</th>
                                            <th style="vertical-align: middle;" >Tujuan</th>
                                            <th style="vertical-align: middle;" >Pengolah</th>
                                            <th style="vertical-align: middle;" >KTJ</th>
                                            <th style="vertical-align: middle;">Disposisi Seskab</th>
                                            <th style="vertical-align: middle;">Disposisi Waseskab</th>
                                            <th style="vertical-align: middle;">Disposisi Deputi</th>
                                            <th style="vertical-align: middle;">Disposisi Kapus</th>
                                            <!-- <th style="vertical-align: middle;">Link Netbox</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ; 
                                    setlocale(LC_TIME, 'id-ID'); ?>
                                    <?php foreach($surat_keluar as $key => $value) { ?>
                                        
                                            <tr >
                                                <td style="vertical-align: middle;"><?= strftime('%d/%m/%Y', strtotime($value['tgl_surat']));?></td>
                                                <td style="vertical-align: middle;">
                                                    <?= $value['no_surat'] ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= strftime('%d/%m/%Y', strtotime($value['tgl_kirim']));?></td>
                                                <td style="vertical-align: middle;">
                                                    <?= $value['perihal']; ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= $value['tujuan'];?></td>
                                                <td style="vertical-align: middle;">
                                                    <?= $value['nama_divisi']; ?>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <?= $value['kode_tugas']; ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_seskab']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_waseskab']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_deputi']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_kapus']; ?></td>
                                                <!-- <td style="vertical-align: middle;"><a href="<?= $value['link'] ?>"><?= $value['link']; ?></a></td> -->
                                                
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