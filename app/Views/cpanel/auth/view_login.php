<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
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
        <div class="card animate__animated animate__fadeIn animate__delay-1s">
            <div class="card-header">
                <h5><span class="icon mif-lock"></span> CPANEL LOGIN</h5>
            </div>
            <div class="card-content p-2">
                <?php if (session()->has('error')) : ?>
                    <p class="remark alert text-center" id="hideMe"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>
                <?php $validation = session()->getFlashdata('validation'); ?>
                <form data-role="validator" action="<?= base_url('login/proses') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="email" data-validate="required" data-role="input" name="email" value="<?= old('email') ?>" placeholder="Masukan Alamat Email" class="metro-input <?= $validation && $validation->hasError('email') ? 'invalid_feedback' : '' ?>" autocomplete="off" autofocus>
                            <span class="invalid_feedback">
                                Alamat Email tidak boleh kosong
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="cell-sm-12">
<<<<<<< HEAD
                            <input type="password" data-validate="required" data-role="input" name="password" placeholder="Masukan Katasandi" class="<?= $validation && $validation->hasError('password') ? 'invalid_feedback' : ''; ?>" autocomplete="off">
                            <?php if ($validation && $validation->hasError('password')) : ?>
                                <span class="invalid_feedback">
                                    <?= $validation->getError('password'); ?>
                                </span>
                            <?php endif; ?>
>>>>>>> b17860fc903d9275820bc14af28549e9ff456bc4
=======
                            <input type="password" data-validate="required password" data-role="input" name="password" placeholder="Masukan Kata Sandi" class="<?= $validation && $validation->hasError('password') ? 'invalid_feedback' : ''; ?>" autocomplete="off" style="border: 1px solid #dfdfdf;">
                            <span class="invalid_feedback">
                                Kata Sandi tidak boleh kosong
                            </span>
>>>>>>> 1f03c91739fb9acbe842a0ac1476864e6d2f5786
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <button type="submit" class="button loading-pulse block drop-shadow"><span class="icon mif-lock"></span> Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
            <div style="padding: 20px;text-align: center;">
                <span class="fg-gray">Copyright &copy; <?= $footer_title; ?> <?= date('Y'); ?></span>
            </div>
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
