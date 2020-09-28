<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_before_login($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="grid ">
        <div class="row d-flex flex-column flex-justify-center h-vh-50 mt-10">
            <div class="cell-5 mx-auto block-shadow">
                <h1><small><span class="icon mif-lock"></span> CPANEL LOGIN</small></h1>
                <hr class="thin" />
                <form data-role="validator" method="POST" action="<?= base_url('auth/login') ?>">
                    <div class="row mb-2">
                        <div class="cell-sm-10">
                            <input type="email" placeholder="Masukan Alamat Email" data-validate="required email" data-role="input" class="metro-input" autocomplete="off" autofocus>
                            <span class="invalid_feedback">
                                Alamat Email tidak boleh kosong atau Salah!
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="cell-sm-10">
                            <input type="password" placeholder="Masukan Katasandi" data-validate="required" data-role="input" class="metro-input" autocomplete="off">
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
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
