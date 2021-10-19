<ul class="navbar-nav bg-gradient-light sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img class="logo" src="<?= base_url(); ?>/img/garuda.png" alt="">
                </div>
                <div class="sidebar-divider-logo d-none d-sm-block"></div>
                <div class="sidebar-brand-text" >e-JFP Internal</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider ">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pegawai
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link pb-0" href="/">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Database
            </div> -->

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link pb-0 collapsed" href="" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" >
                        <a class="collapse-item" href="<?= base_url('penerjemah') ?>">
                        <i class="fa fa-fw fa-users"></i>
                        <span>Data Penerjemah</span></a>
                        <a class="collapse-item" href="<?= base_url('instansi') ?>">
                        <i class="fa fa-fw fa-building"></i>
                        <span>Data Instansi</span>
                        </a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

                
            

            <!-- Nav Item - Persuratan -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Data Master Persuratan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" >
                        <a class="collapse-item" href="<?= base_url('kategori') ?>">
                            <i class="fas fa-fw fa-file-alt"></i>
                            <span>Kategori Surat</span>
                        </a>
                        <a class="collapse-item" href="<?= base_url('ktj') ?>">
                            <i class="far fa-fw fa-calendar-check"></i>
                            <span>Kegiatan Tugas Jabatan</span>
                        </a>
                        <a class="collapse-item" href="<?= base_url('divisi') ?>">
                            <i class="fas fa-fw fa-network-wired"></i>
                            <span> Bidang / Bagian</span>
                        </a>
                        
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Surat usulan -->
            <li class="nav-item ">
                <a class="nav-link pb-0" href="<?= base_url('surat_usulan') ?>">
                    <i class="fas fa-fw fa-file-signature"></i>
                    <span>Surat Usulan </span> 
                </a>
            </li>

            <!-- Nav Item transaksi surat -->
            <li class="nav-item">
                <a class="nav-link pb-0 collapsed" href="" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-mail-bulk"></i>
                    <span>Transaksi Surat</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded" >
                        <a class="collapse-item" href="<?= base_url('surat_masuk') ?>">
                        <i class="fa fa-fw fa-envelope-open-text"></i>
                        <span>Surat Masuk</span></a>
                        <a class="collapse-item" href="<?= base_url('surat_keluar') ?>">
                        <i class="fa fa-fw fa-paper-plane"></i>
                        <span>Surat Keluar</span>
                        </a>
                        
                    </div>
                </div>
            </li>

                <!-- Nav Item Pengguna -->
                <li class="nav-item ">
                    <a class="nav-link pb-0" href="<?= base_url('user') ?>">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Profil Pengguna</span> 
                    </a>
                </li>

                <!-- Nav Item - Logout -->
                <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout </span> 
                    </a>
                </li>

            <!-- Nav Item - Laporan -->
            <?php if (session()->get('level') == 1) { ?>
                <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded" >
                            <a class="collapse-item" href="<?= base_url('laporan_masuk') ?>">
                            <i class="fa fa-fw fa-envelope-open-text"></i>
                            <span>Memo Masuk</span></a>
                            <a class="collapse-item" href="<?= base_url('laporan_keluar') ?>">
                            <i class="fa fa-fw fa-paper-plane"></i>
                            <span>Memo Keluar</span>
                            </a>
                            
                        </div>
                    </div>
                </li> -->
            <?php } ?>

            

            <?php if (session()->get('level') == 1) {?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                
                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin
                </div>

                <!-- Nav Item - Laporan -->
                <li class="nav-item">
                    <a class="nav-link pb-0 collapsed" href="" data-toggle="collapse" data-target="#collapseFour"
                        aria-expanded="true" aria-controls="collapseFour">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded" >
                            <a class="collapse-item" href="<?= base_url('laporan_masuk') ?>">
                            <i class="fa fa-fw fa-envelope-open-text"></i>
                            <span>Surat Masuk</span></a>
                            <a class="collapse-item" href="<?= base_url('laporan_keluar') ?>">
                            <i class="fa fa-fw fa-paper-plane"></i>
                            <span>Surat Keluar</span>
                            </a>
                            
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Persuratan -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded" >
                            <a class="collapse-item" href="<?= base_url('divisi') ?>">
                                <i class="fas fa-fw fa-network-wired"></i>
                                <span> Bidang / Bagian</span>
                            </a>
                            <a class="collapse-item" href="<?= base_url('pengguna') ?>">
                                <i class="fas fa-fw fa-user"></i>
                                <span>Pengguna</span>
                            </a>
                            <a class="collapse-item" href="<?= base_url('kategori') ?>">
                                <i class="fas fa-fw fa-file-alt"></i>
                                <span>Kategori Surat</span>
                            </a>
                            <a class="collapse-item" href="<?= base_url('ktj') ?>">
                                <i class="far fa-fw fa-calendar-check"></i>
                                <span>Kegiatan Tugas Jabatan</span>
                            </a>
                            
                        </div>
                    </div>
                </li>

                

                <!-- Nav Item - User Setting -->
                <!-- <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('user') ?>">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Pengaturan Akun</span></a>
                </li> -->
            <?php } ?>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>