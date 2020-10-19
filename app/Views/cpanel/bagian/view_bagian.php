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
        <strong> Tabel Master Data Account</strong>
    </div>
    <div class="toolbar my-3 place-right">
        <a href="<?php echo base_url('addaccount') ?>" class="button success"><span class="mif-file-text"></span> Tambah Account Baru</a>
    </div>
    <table class="table hover display order-column" id="account" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-20">Foto</th>
                <th class="text-center w-20">Zoom Id</th>
                <th class="text-center w-20">Nama Lengkap</th>
                <th class="text-center w-20">Email</th>
                <th class="text-center w-20">Role</th>
                <th class="text-center w-20">Aktif</th>
                <th class="text-center w-20">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($account as $a) : ?>
                <tr>
                    <td class="text-center"><img src="<?= base_url('assets/data/profile/') . '/' . $a['image']; ?>" class="avatar" style="width: 30px;"></td>
                    <td class="text-center"><?= $a['zoomid']; ?></td>
                    <td class="text-left"><strong><?= $a['name']; ?></strong></td>
                    <td class="text-center"><?= $a['email']; ?></td>
                    <td class="text-center"><strong><?= $a['role']; ?></strong></td>
                    <td class="text-center">
                        <?php if ($a['is_active'] != 1) : ?>
                            <a href="<?php echo base_url('aktifkan/' . $a['id']); ?>" class="fg-crimson"><span class="mif-not"> Blokir</span></a>
                        <?php else : ?>
                            <a href="<?php echo base_url('blokir/' . $a['id']); ?>" class="fg-emerald"><span class="mif-checkmark"> Aktif</span></a>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <div class="dropdown-button">
                            <button class="button secondary outline rounded dropdown-toggle">Aksi</button>
                            <ul class="d-menu place-right" data-role="dropdown">
                                <li><a href="<?= base_url('detailaccount/' . $a['token']); ?>"><span class="mif-eye"></span> Detail</a></li>
                                <li><a href="<?= base_url('editaccount/' . $a['token']); ?>"><span class="mif-copy"></span> Ubah</a></li>
                                <li><a href="<?= base_url('deleteaccount/' . $a['token']); ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a></li>
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
