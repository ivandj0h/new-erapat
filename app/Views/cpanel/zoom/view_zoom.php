<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<!-- start content here -->
<?= userTabMenu($tabs); ?>
<!-- Content -->
<div class="container">
    <?php
    if (session()->has('message')) {
    ?>
        <div class="remark <?= session()->getFlashdata('alert-class') ?>" id="hideMe">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php
    }
    ?>
    <div class="toolbar my-4" style="left: 20px !important;">
        <strong> Tabel Master Data Zoom ID</strong>
    </div>
    <div class="toolbar my-3 place-right">
        <a href="<?php echo base_url('addbagian') ?>" class="button success"><span class="mif-file-text"></span> Tambah Zoom ID Baru</a>
    </div>
    <table class="table hover display order-column" id="account" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-20">Tanggal</th>
                <th class="text-center w-20">Nama Zoom ID</th>
                <th class="text-center w-20">Nama Pemilik Zoom ID</th>
                <th class="text-center w-20">Aktif</th>
                <th class="text-center w-20">Status</th>
                <th class="text-center w-20">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zoom as $a) : ?>
                <tr>
                    <td class="text-center"><strong><?= date("d-m-Y", strtotime($a->date_activated)); ?></strong></td>
                    <td class="text-left">
                        <?php if ($a->is_active == 0) : ?>
                            <strong><span class="fg-red"><?= $a->idzoom; ?></span></strong>
                        <?php else : ?>
                            <strong><?= $a->idzoom; ?></strong>
                        <?php endif; ?>
                    </td>
                    <td class="text-left">
                        <?php if ($a->is_active == 0) : ?>
                            <strong><span class="fg-red"><?= $a->pemilik_zoom; ?></span></strong>
                        <?php else : ?>
                            <strong><?= $a->pemilik_zoom; ?></strong>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($a->is_active == 0) : ?>
                            <strong><span class="fg-red mif-not"> Tidak Aktif</span></strong>
                        <?php else : ?>
                            <strong><span class="fg-emerald mif-checkmark"> Aktif</span></strong>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($a->status == 1) : ?>
                            <a href="<?php echo base_url('offline/' . $a->id); ?>" class="fg-crimson"><span class="mif-not"> Sedang Online</span></a>
                        <?php else : ?>
                            <a href="<?php echo base_url('online/' . $a->id); ?>" class="fg-emerald"><span class="mif-checkmark"> Tersedia</span></a>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <div class="dropdown-button">
                            <button class="button secondary outline rounded dropdown-toggle">Aksi</button>
                            <ul class="d-menu place-right" data-role="dropdown">
                                <li><a href="<?= base_url('editzoom/' . $a->token); ?>"><span class="mif-copy"></span> Ubah</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- end content here -->
<?php
$this->endSection();
