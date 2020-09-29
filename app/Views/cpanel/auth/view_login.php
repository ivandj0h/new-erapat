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

                <?php if (session()->has('error')) : ?>
                    <?php session()->getFlashdata('error'); ?>
                <?php endif; ?>
                <?php $validation = session()->getFlashdata('validation'); ?>
                <form method="POST" action="<?= current_url('auth/login') ?>">
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="email" name="email" value="<?= old('email') ?>" placeholder="Masukan Alamat Email" autocomplete="off" autofocus>
                            <?php if ($validation && $validation->hasError('email')) : ?>
                                <span class="invalid_feedback">
                                    <?= $validation->getError('email'); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="cell-sm-12">
                            <input type="password" name="password" value="<?= old('password') ?>" placeholder="Masukan Katasandi" autocomplete="off">
                            <?php if ($validation && $validation->hasError('email')) : ?>
                                <span class="invalid_feedback">
                                    <?= $validation->getError('email'); ?>
                                </span>
                            <?php endif; ?>
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
