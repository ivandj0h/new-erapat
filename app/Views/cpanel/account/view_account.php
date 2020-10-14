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
    <div class="toolbar my-5">
        <strong> Tabel Master Data Account</strong>
    </div>
    <div class="toolbar my-3 place-right">
        <a href="<?php echo base_url('baru') ?>" class="button success"><span class="mif-file-text"></span> Tambah Account Baru</a>
    </div>
    <table class="table table-condensed hover display" id="rapat" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-5">No</th>
                <th class="text-center w-20">Foto</th>
                <th class="text-center w-20">Zoom Id</th>
                <th class="text-center w-20">Nama Lengkap</th>
                <th class="text-center w-20">Email</th>
                <th class="text-center w-20">Role</th>
                <th class="text-center w-20">Sekretariat</th>
                <th class="text-center w-20">Bagian</th>
                <th class="text-center w-20">Aktif</th>
                <th class="text-center w-20">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($account as $r) : ?>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- end content here -->


<?php
$this->endSection();
