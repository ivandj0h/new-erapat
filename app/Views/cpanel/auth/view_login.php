<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_before_login($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="row d-flex flex-column flex-justify-center h-vh-100">
        <div class="card">
            <div class="card-header">
                <span class="icon mif-lock"></span> CPANEL LOGIN
            </div>
            <div class="card-content p-2">
                <?php $validation = session()->getFlashdata('validation'); ?>
                <form data-role="validator" method="POST" action="<?= current_url('auth/login') ?>">
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="email" name="email" placeholder="Masukan Alamat Email" data-validate="required email" data-role="input" class="metro-input" autocomplete="off" autofocus>
                            <?php if ($validation && $validation->hasError('email')) : ?>
                                <?= $validation->getError('email'); ?>
                            <?php endif; ?>
                            <span class="invalid_feedback">
                                Alamat Email tidak boleh kosong atau Salah!
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="password" name="password" placeholder="Masukan Katasandi" data-validate="required" data-role="input" class="metro-input" autocomplete="off">
                            <span class="invalid_feedback">
                                Katasandi tidak boleh kosong atau Salah!
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell">
                            <button type="submit" class="button primary drop-shadow"><span class="icon mif-lock"></span> Masuk</button>
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
