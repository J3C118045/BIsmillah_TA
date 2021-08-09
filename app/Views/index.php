<?= $this->extend('templates/navbar'); ?>

<?= $this->section('page-content'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
                    
                        <div class="my-2">
                            <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-success alert-dismissible">';
                                    echo session()->getFlashdata('pesan');
                                    echo '<strong>'.session()->get('username').'</strong>';
                                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>';
                                    echo '</div>';
                                };
                            ?>
                        </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Instansi Card -->
                        <div class="col-xl-4 col-md-6 mb-3">
                            <a class="card border-left-primary shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('instansi'); ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Instansi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tInstansi ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Penerjemah Card -->
                        <div class="col-xl-4 col-md-6 mb-3">
                            <a class="card border-left-success shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('penerjemah'); ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penerjemah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tPenerjemah ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    

                    

                        <!-- Surat Usulan Card  -->
                        <div class="col-xl-4 col-md-6 mb-3">
                            <a class="card border-left-info shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('usulan'); ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Surat Usulan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tArsip ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Memo Masuk Card  -->
                        <!-- <div class="col-xl-3 col-md-6 mb-3">
                            <a class="card border-left-warning shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('surat_masuk'); ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Surat Masuk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tSuratMasuk ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                        <!-- Memo Keluar Card  -->
                        <!-- <div class="col-xl-3 col-md-6 mb-3">
                            <a class="card border-left-success shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('surat_keluar'); ?>">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Surat Keluar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tSuratKeluar ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                        <?php if (session()->get('level') == 1) { ?>
                            <!-- Surat Usulan Card  -->
                            <!-- <div class="col-xl-3 col-md-6 mb-3">
                                <a class="card border-left-info shadow h-100 py-2" style="text-decoration: none;" >
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Total Surat Usulan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_arsip ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->

                            <!-- Memo Masuk Card  -->
                            <!-- <div class="col-xl-3 col-md-6 mb-3">
                                <a class="card border-left-warning shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('laporan_masuk'); ?>">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Total Surat Masuk</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_masuk ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->

                            <!-- Memo Keluar Card  -->
                            <!-- <div class="col-xl-3 col-md-6 mb-3">
                                <a class="card border-left-success shadow h-100 py-2" style="text-decoration: none;" href="<?= base_url('laporan_keluar'); ?>">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Surat Keluar</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_keluar ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        <?php } ?>
                        

                    </div>

                    

                    <!-- Pie Chart -->
                    <div class="row">
                    
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-2">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $piechartTitle; ?></h6>
                                </div>

                                <div class="card-body border-bottom-info">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="MyChart"></canvas>
                                    </div>
                                    <div class="mt-2 text-center small">
                                        <div class="row justify-content-center">
                                            <span class="mr-2">
                                                <i class="fas fa-circle" style="color: #ff6b6b;"></i> Penerjemah Ahli Pertama
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle" style="color: #feca57;"></i> Penerjemah Ahli Muda
                                            </span>
                                        </div>
                                        <div class="row justify-content-center">
                                            <span class="mr-2">
                                                <i class="fas fa-circle" style="color: #1dd1a1;"></i> Penerjemah Ahli Madya
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle" style="color: #ff9ff3;"></i> Penerjemah Ahli Utama
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-2">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?= $piechartAktif; ?></h6>
                                </div>

                                <div class="card-body border-bottom-success">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="MyChartAktif"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #00b894;"></i> Aktif
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color: #d63031;"></i> Tidak Aktif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            

<?= $this->endSection(); ?>