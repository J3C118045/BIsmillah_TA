<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PPJFP 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Silahkan pilih "Logout" jika Anda ingin keluar dari sistem.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!--Jquery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <!--DateRangePicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="<?= base_url(); ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url(); ?>/js/demo/chart-bar-demo.js"></script>
    <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>

    <script src="<?= base_url(); ?>/https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
            <!--   <script>
                var PieChart = document.getElementById('PieChart');
                var data_golongan = [];
                var label_golongan = [];

                

                var data_penerjemah_per_golongan = {
                    datasets: [{
                        data : data_golongan,
                        backgroundColor:[
                            'rgba(255,99,132,0.8)',
                            'rgba(54,162,1235,0.8)',
                            'rgba(255,206,86,0.8)',
                        ],
                    }],
                    labels: label_golongan,
                }

                var chart_golongan = new Chart(PieChart,{
                    type: 'doughnat',
                    data : data_penerjemah_per_golongan
                });
            </script> -->

            <script type="text/javascript">
                var ctx = document.getElementById('MyChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            <?php
                                if (!empty($piechart_jabatan)) {
                                    # code...
                                    foreach ($piechart_jabatan as $data) {
                                        // echo "'" .$data['jabatan'] ." (".$data['jumlah']. ")',";
                                        echo "'" .$data['jabatan'] ." : ".$data['jumlah']. "',";
                                    }
                                }
                            ?>
                        ],
                        datasets: [{
                            label: 'Jumlah Penerjemah per Jabatan',
                            backgroundColor: ['#ff6b6b', '#feca57', '#1dd1a1', '#ff9ff3'],
                            hoverBackgroundColor: ['#ee5253', '#ff9f43', '#10ac84', '#f368e0'],
                            borderColor: '#fff',
                            borderWidth: 2,
                            data: [
                                <?php
                                    if (!empty($piechart_jabatan)) {
                                        # code...
                                        foreach($piechart_jabatan as $data) {
                                            echo $data['persentase'] .", ";
                                        }
                                    }
                                ?>
                            ]
                        }],
                        
                    },
                    options: {
                        maintainAspectRatio: false,                        
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: true,
                            caretPadding: 100,
                            callbacks: {
                                label:
                                function(tooltipItem, data) {
                                    var label = data.labels[tooltipItem.index];
                                    var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return label + ': '+ '(' + val + "%" + ')';
                                }
                            }
                        },
                        legend: {
                            display: false,
                            position: "bottom",
                            padding: {
                                left: 50,
                                right: 0,
                                top: 0,
                                bottom: 0
                            }
                        },
                        cutoutPercentage: 70,
                    },
                });


                var ctx = document.getElementById('MyChartAktif').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: [
                            <?php
                                if (!empty($getPersen)) {
                                    # code...
                                    foreach ($getPersen as $data) {
                                        echo "'" .$data['status'] ." : ".$data['jumlah']. "',";
                                    }
                                }
                            ?>,
                            
                        ],
                        datasets: [{
                            label: 'Jumlah Penerjemah yang Aktif',
                            backgroundColor: ['#00b894', '#d63031', '#1dd1a1', '#ff9ff3'],
                            hoverBackgroundColor: ['#27ae60', '#c0392b', '#10ac84', '#f368e0'],
                            borderColor: '#fff',
                            borderWidth: 2,
                            data: [
                                <?php
                                    if (!empty($getPersen)) {
                                        # code...
                                        foreach($getPersen as $data) {
                                            echo $data['persentase'] .",";
                                        }
                                    }
                                ?>,
                            ]
                        }],
                        
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: true,
                            caretPadding: 100,
                            callbacks: {
                                label:
                                function(tooltipItem, data) {
                                    var label = data.labels[tooltipItem.index];
                                    var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                    return label + ': '+ '(' + val + "%" + ')';
                                }
                            }
                        },
                        legend: {
                            display: false,
                            position: "bottom",
                            padding: {
                                left: 50,
                                right: 0,
                                top: 0,
                                bottom: 0
                            }
                        },
                        cutoutPercentage: 70,
                    },
                });
            </script>

            

<script type="text/javascript"> 
    var start_date;
    var end_date;
    var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
        var dateStart = parseDateValue(start_date);
        var dateEnd = parseDateValue(end_date);
        var evalDate= parseDateValue(aData[0]);
            if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
                ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
                ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
                ( dateStart <= evalDate && evalDate <= dateEnd ) )
            {
                return true;
            }
            return false;
    });

    function parseDateValue(rawDate) {
        var dateArray= rawDate.split("/");
        var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);    
        return parsedDate;
    }    

    $( document ).ready(function() {
        var $dTable = $('#reportTable').DataTable({
        "dom": " <'row'<'col-sm-3'l><'col-sm-4'<'datesearchbox'>><'col-sm-2'Brt><'col-sm-3'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bInfo : false,
        buttons: [
            {
                "extend": 'excelHtml5',
                "text": '<div class="btn btn-success">Cetak Data</div>', 
                "className": 'excelButton btn-success py-0 px-0 border-0 rounded dt-head-center',

                "customize" : function ( xlsx ){
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c', sheet).each(function() {
                        var numero=$(this).parent().index() ;
                        var residuo = numero%2;
                        if (numero==1){           
                            $(this).attr('s', '47');
                        }else if (numero>1){
                            if(residuo ==0  ){
                            $(this).attr('s','0');
                            }else{
                            $(this).attr('s','5');
                            }
                        }
                    });
                }
            },
        ],
    });
        $("div.datesearchbox").html('<div class="input-group mb-2">' +
    ' <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div>'+
    '<input type="text" class="form-control pull-right" id="datesearch" '+
    'placeholder="Cari Berdasarkan Rentang Tanggal.."> </div>');
        document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";
        $('#datesearch').daterangepicker({
            autoUpdateInput: false
            });
            
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
</script>

            <!-- tgl -->
            <script type="text/javascript">
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
            </script>

</body>

</html>