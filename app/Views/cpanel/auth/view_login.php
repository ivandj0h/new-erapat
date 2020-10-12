<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
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
                            <input type="password" data-validate="required password" data-role="input" name="password" placeholder="Masukan Kata Sandi" class="<?= $validation && $validation->hasError('password') ? 'invalid_feedback' : ''; ?>" autocomplete="off" style="border: 1px solid #dfdfdf;">
                            <span class="invalid_feedback">
                                Kata Sandi tidak boleh kosong
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <button type="submit" class="button loading-pulse block drop-shadow" onclick="Metro.activity.open({autoHide: 3000})"><span class="icon mif-lock"></span> Masuk</button>
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
