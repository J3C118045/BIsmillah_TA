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
                                    
                                    <!-- <form action="<?= base_url('laporan_masuk/export')?>" method="POST">
                                        <button class="btn btn-success btn-icon-split mr-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-file-excel"></i>
                                            </span>
                                            <span class="text">Cetak Data</span>
                                        </button>
                                    </form> -->

                                    
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
                                <!-- <table border="0" cellspacing="5" cellpadding="5">
                                    <tbody><tr>
                                        <td>Dari Tanggal :</td>
                                        <td><input type="date" class="form-control border-left-info" id="tgl_awal" name="tgl_awal"></td>
                                    </tr>
                                    <tr>
                                        <td>Sampai Tanggal :</td>
                                        <td><input type="date" class="form-control border-left-info" id="tgl_akhir" name="tgl_akhir"></td>
                                    </tr>
                                </tbody></table> -->
                                <table class="table tabel_laporan table-bordered" id="reportTable" width="100%" cellspacing="0">
                                    <thead  style=" background: #d7f1f5;">
                                    <tr>
                                            <th style="vertical-align: middle;">Tanggal Surat</th>
                                            <th style="vertical-align: middle;">No. Surat </th>
                                            <!-- <th style="vertical-align: middle;">Tanggal Diterima</th> -->
                                            <th style="vertical-align: middle;">Jenis Surat</th>
                                            <th style="vertical-align: middle;">Perihal</th>
                                            <th style="vertical-align: middle;">Pengirim</th>
                                            <th style="vertical-align: middle;">Pengolah</th>
                                            <th style="vertical-align: middle;">KTJ</th>
                                            <th style="vertical-align: middle;">Disposisi Waseskab</th>
                                            <th style="vertical-align: middle;">Disposisi Deputi</th>
                                            <th style="vertical-align: middle;">Disposisi Kapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ; 
                                    setlocale(LC_TIME, 'id-ID'); ?>
                                    <?php foreach($surat_masuk as $key => $value) { ?>
                                        
                                            <tr>
                                            <td style="vertical-align: middle;">
                                                <?php
                                                    echo strftime('%d/%m/%Y', strtotime($value['tgl_surat'])); 
                                                ?>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                <?= $value['no_surat'] ?>
                                                <!-- <hr class="divider my-1">
                                                <?php
                                                    echo strftime('%d/%m/%Y', strtotime($value['tgl_diterima'])); 
                                                    // $value['tgl_surat']
                                                ?> -->
                                                </td>
                                                
                                                <!-- <td style="vertical-align: middle;">
                                                <?php
                                                    echo strftime('%d/%m/%Y', strtotime($value['tgl_diterima'])); 
                                                ?>
                                                </td> -->
                                                <td style="vertical-align: middle;"><?= $value['nama_kategori']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['perihal']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['pengirim']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['nama_divisi']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['kode_tugas']; ?></td>
                                                
                                                <td style="vertical-align: middle;"><?= $value['disposisi_waseskab']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_deputi']; ?></td>
                                                <td style="vertical-align: middle;"><?= $value['disposisi_kapus']; ?></td>
                                                
                                                
                                                <!-- <td style="vertical-align: middle;">
                                                <div style="display: inline-flex;">
                                                <button value="<?= $value['divisi'].'|'.$value['no_ktj'] ?>" id="btn-edit<?= $value['id_suratMasuk'] ?>" class="btn btn-info btn-icon-split btn-sm mr-1 btn-edit-ktj"
                                                    data-toggle="modal" data-target="#editModal<?= $value['id_suratMasuk'];?>">
                                                <span class="icon text-white-50">
                                                <i class="fas fa-edit" ></i>
                                                </span>
                                                <span class="text">Edit</span>
                                                </button>
                                                 <button class="btn btn-icon-split btn-danger btn-sm"
                                                    data-toggle="modal" data-target="#deleteModal<?= $value['id_suratMasuk']; ?>">
                                                 <span class="icon text-white-50">
                                                <i class="fas fa-trash-alt" ></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                                </button>
                                                </div>
                                                </td> -->
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
                                    url:'<?= base_url('/surat_masuk/getKTJDivisi'); ?>',
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
                                    url:'<?= base_url('/surat_masuk/getKTJDivisi'); ?>',
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
            <!-- filter datatable -->
                <!-- <script type="text/javascript"> 
                    //fungsi untuk filtering data berdasarkan tanggal 
                    var start_date;
                    var end_date;
                    var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
                        var dateStart = parseDateValue(start_date);
                        var dateEnd = parseDateValue(end_date);
                        //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
                        //nama depan = 0
                        //nama belakang = 1
                        //tanggal terdaftar =2
                        var evalDate= parseDateValue(aData[2]);
                            if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
                                ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
                                ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
                                ( dateStart <= evalDate && evalDate <= dateEnd ) )
                            {
                                return true;
                            }
                            return false;
                    });

                    // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
                    function parseDateValue(rawDate) {
                        var dateArray= rawDate.split("/");
                        var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
                        return parsedDate;
                    }    

                    $( document ).ready(function() {
                    //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
                    var $dTable = $('#reportTable').DataTable({
                        "dom": " <'row'<'col-sm-3'l><'col-sm-4'<'datesearchbox'>><'col-sm-2'Brt><'col-sm-3'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                        buttons: [
                            {"extend": 'excelHtml5',"text": 'Cetak', "className": 'excelButton',},
                        ]
                    });

                    // $('#reportTable').DataTable( {
                    //     dom: 'Bfrtip',
                    //     buttons: [
                    //         'excel',
                    //     ]
                    // });

                    //menambahkan daterangepicker di dalam datatables
                    $("div.datesearchbox").html('<div class="input-group mb-2"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Search by date range.."> </div>');

                    document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

                    //konfigurasi daterangepicker pada input dengan id datesearch
                    $('#datesearch').daterangepicker({
                        autoUpdateInput: false
                        });

                    //menangani proses saat apply date range
                        $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
                        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
                        start_date=picker.startDate.format('DD/MM/YYYY');
                        end_date=picker.endDate.format('DD/MM/YYYY');
                        $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
                        $dTable.draw();
                        });

                        $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                        start_date='';
                        end_date='';
                        $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
                        $dTable.draw();
                        });
                    });
                </script> -->
            <!-- End of filter datatable -->
<?=$this->endSection(); ?>

<?=$this->include('templates/footer'); ?>