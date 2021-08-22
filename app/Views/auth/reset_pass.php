<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"> -->
                            <img class="col-lg-6 d-none d-lg-block bg-login-image" 
                                src="<?= base_url(); ?>/img/img_forgot.jpg" alt="">
                        <!-- </div> -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><?= $title; ?></h1>
                                        <p class="mb-4">Silahkan Buat Kata Sandi Baru. </p>
                                    </div>
                                    <?php 
                                    $errors = session()->getFlashdata('errors');
                                    if (!empty($errors)) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <ul>
                                                <?php foreach ($errors as $key => $value) { ?>
                                                    <li><?= esc($value) ?></li>
                                                <?php }  ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                    <?php
                                        if (session()->getFlashdata('pesan')) {
                                            echo '<div class="alert alert-danger alert-dismissible">';
                                            echo session()->getFlashdata('pesan');
                                            echo session()->getFlashdata('username');
                                            echo '</div>';
                                        };
                                    ?>
                                    <form action="<?= base_url('auth/proses_reset/') ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" value="<?= $token ?>" name='token'>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user border-left-primary"
                                                id="exampleInputPassword" placeholder="Kata Sandi">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="cpassword" class="form-control form-control-user border-left-primary"
                                                id="exampleInputPassword" placeholder="Masukkan Ulang Kata Sandi">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Atur Ulang Kata Sandi
                                        </button>
                                        <hr>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?= $this->endSection(); ?>
  