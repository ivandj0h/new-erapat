<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>

<div class="container">
    <!-- start content here -->
<<<<<<< HEAD
    <div class="grid ">
        <div class="row d-flex flex-column flex-justify-center h-vh-50 mt-10">
            <div class="cell-5 mx-auto block-shadow">
                <h1><small><span class="icon mif-lock"></span> CPANEL LOGIN</small></h1>
                <hr class="thin" />
                <form data-role="validator" method="POST" action="<?= current_url('auth/login') ?>">
                    <div class="row mb-2">
                        <div class="cell-sm-10">
                            <input type="email" name="username" placeholder="Masukan Alamat Email" data-validate="required email" data-role="input" class="metro-input" autocomplete="off" autofocus>
                            <span class="invalid_feedback">
                                Alamat Email tidak boleh kosong atau Salah!
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="cell-sm-10">
                            <input type="password" name="password" placeholder="Masukan Katasandi" data-validate="required" data-role="input" class="metro-input" autocomplete="off">
                            <span class="invalid_feedback">
                                Katasandi tidak boleh kosong atau Salah!
                            </span>
=======
    <div class="row d-flex flex-column flex-justify-center h-vh-100">
        <div class="card">
            <div class="card-header">
                <span class="icon mif-lock"></span> CPANEL LOGIN
            </div>
            <div class="card-content p-2">
                <?php if (session()->has('error')) : ?>
                    <p class="remark alert text-center" id="sembunyi"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>
                <?php $validation = session()->getFlashdata('validation'); ?>
                <form data-role="validator" action="<?= current_url() ?>" method="POST">
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="email" data-validate="required email" data-role="input" name="email" value="<?= old('email') ?>" placeholder="Masukan Alamat Email" class="metro-input <?= $validation && $validation->hasError('email') ? 'invalid_feedback' : '' ?>" autocomplete="off" autofocus>
                            <?php if ($validation && $validation->hasError('email')) : ?>
                                <div class="invalid_feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="password" data-validate="required" data-role="input" name="password" placeholder="Masukan Katasandi" class="<?= $validation && $validation->hasError('password') ? 'invalid_feedback' : ''; ?>" autocomplete="off">
                            <?php if ($validation && $validation->hasError('password')) : ?>
                                <span class="invalid_feedback">
                                    <?= $validation->getError('password'); ?>
                                </span>
                            <?php endif; ?>
>>>>>>> b17860fc903d9275820bc14af28549e9ff456bc4
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <button type="submit" class="button loading-pulse primary drop-shadow"><span class="icon mif-lock"></span> Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span class="fg-gray">Copyright &copy; <?= $footer_title; ?> <?= date('Y'); ?></span>
            </div>
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
?>

<!-- JQuery Place -->
<script>
    (function($) {
        setTimeout(function() {
            $('#sembunyi').slideUp("slow");
        }, 2000);
    })(jQuery);
</script>
<!-- JQuery Place -->