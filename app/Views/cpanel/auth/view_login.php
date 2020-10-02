<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
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
                    <p class="remark alert text-center" id="sembunyi"><?= session()->getFlashdata('error') ?></p>
                <?php endif; ?>
                <?php $validation = session()->getFlashdata('validation'); ?>
                <form data-role="validator" action="<?= base_url('login/proses') ?>" method="POST">
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