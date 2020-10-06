<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>

<div class="row d-flex flex-column flex-justify-center h-vh-100">
    <div class="card animate__animated animate__fadeIn animate__delay-1s">
        <div class="card-header">
            <h5><span class="icon mif-unlock"></span> UNLOCK PROCESS</h5>
        </div>
        <div class="card-content p-2">
            <div class="row mb-2">
                <div class="cell-sm-12">
                    <img src="<?= base_url('assets/locals/img/favicon.png'); ?>" class="center-img-logo">
                </div>
            </div>
            <div class="row mb-2">
                <div class="cell-sm-12 text-center">
                    <span style="text-align: center;" id="login">Mohon menunggu... <img src="<?= base_url('assets/locals/img/loading.gif'); ?>" style="width: 17px;"></span>
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <meta http-equiv="refresh" content="15; URL=http://localhost/e-rapat/user" />
                </div>
            </div>
            <div class="row">
                <div class="cell">
                    <button type="submit" class="button loading-pulse block-cek"><span class="icon mif-unlock"></span> Loading...<span id="count">100</span></button>
                </div>
            </div>
            </form>
        </div>
        <div style="padding: 20px;text-align: center;">
            <span class="fg-gray">Copyright &copy; <?= $footer_title; ?> <?= date('Y'); ?></span>
        </div>
    </div>
</div>
<?php
$this->endSection();
?>