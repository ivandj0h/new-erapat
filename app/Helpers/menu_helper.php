<?php

function userTabMenu($tabs)
{ ?>
    <div class="bg-light" id="hero" style="padding-top: 125px!important;">
        <div class="container">
            <div class="row">
                <div class="cell-md-4 text-center-fs text-left-md pt-2">
                    <div>
                        <span id="github-owner">Selamat Datang <strong><?= session()->get('fullName') ?></strong> </span>
                    </div>
                </div>

                <div class="cell-md-8 text-center-fs text-right-md pt-2"></div>
            </div>
        </div>

        <div class="container-fluid pt-4 pl-0 pr-0 pl-3-md pr-3-md">
            <div class="container">
                <ul data-role="tabs" class="bg-light w-100 pl-0 pr-0" data-expand-point="md">
                    <?php
                    $navtab = $tabs;
                    switch ($navtab) {
                        case "user": ?>
                            <li class="active"><a href="<?= base_url('user') ?>"><span class="mif-user"></span> Profil</a></li>
                            <li><a href="<?= base_url('account') ?>"><span class="mif-stackoverflow"></span> Master Data</a></li>
                            <li><a href="<?= base_url('rapat') ?>"><span class="mif-stackoverflow"></span> Master Data Rapat</a></li>
                            <li><a href="<?= base_url('pembaharuan') ?>"><span class="mif-loop2"></span> Pembaharuan Data</a></li>
                            <li><a href="<?= base_url('riwayat') ?>"><span class="mif-books"></span> Riwayat Rapat</a></li>
                        <?php break;
                        case "account": ?>
                            <li><a href="<?= base_url('user') ?>"><span class="mif-user"></span> Profil</a></li>
                            <li class="active"><a href="<?= base_url('account') ?>"><span class="mif-stackoverflow"></span> Master Data</a></li>
                            <li><a href="<?= base_url('rapat') ?>"><span class="mif-stackoverflow"></span> Master Data Rapat</a></li>
                            <li><a href="<?= base_url('pembaharuan') ?>"><span class="mif-loop2"></span> Pembaharuan Data</a></li>
                            <li><a href="<?= base_url('riwayat') ?>"><span class="mif-books"></span> Riwayat Rapat</a></li>
                        <?php break;
                        case "rapat": ?>
                            <li><a href="<?= base_url('user') ?>"><span class="mif-user"></span> Profil</a></li>
                            <li><a href="<?= base_url('account') ?>"><span class="mif-stackoverflow"></span> Master Data</a></li>
                            <li class="active"><a href="<?= base_url('rapat') ?>"><span class="mif-stackoverflow"></span> Master Data Rapat</a></li>
                            <li><a href="<?= base_url('pembaharuan') ?>"><span class="mif-loop2"></span> Pembaharuan Data</a></li>
                            <li><a href="<?= base_url('riwayat') ?>"><span class="mif-books"></span> Riwayat Rapat</a></li>
                        <?php break;
                        case "pembaharuan": ?>
                            <li><a href="<?= base_url('user') ?>"><span class="mif-user"></span> Profil</a></li>
                            <li><a href="<?= base_url('account') ?>"><span class="mif-stackoverflow"></span> Master Data</a></li>
                            <li><a href="<?= base_url('rapat') ?>"><span class="mif-stackoverflow"></span> Master Data Rapat</a></li>
                            <li class="active"><a href="<?= base_url('pembaharuan') ?>"><span class="mif-loop2"></span> Pembaharuan Data</a></li>
                            <li><a href="<?= base_url('riwayat') ?>"><span class="mif-books"></span> Riwayat Rapat</a></li>
                        <?php break;
                        case "riwayat": ?>
                            <li><a href="<?= base_url('user') ?>"><span class="mif-user"></span> Profil</a></li>
                            <li><a href="<?= base_url('account') ?>"><span class="mif-stackoverflow"></span> Master Data</a></li>
                            <li><a href="<?= base_url('rapat') ?>"><span class="mif-stackoverflow"></span> Master Data Rapat</a></li>
                            <li><a href="<?= base_url('pembaharuan') ?>"><span class="mif-loop2"></span> Pembaharuan Data</a></li>
                            <li class="active"><a href="<?= base_url('riwayat') ?>"><span class="mif-books"></span> Riwayat Rapat</a></li>
                    <?php break;
                        default:
                            echo "No Menu";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?php
}
