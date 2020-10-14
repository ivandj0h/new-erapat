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
    <table class="table table-condensed hover display order-column" id="rapat" cellspacing="0">
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
            <?php $i = 1; ?>
            <?php foreach ($account as $a) : ?>
                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td class="text-center"><img src="<?= base_url('assets/data/profile/') . '/' . $a['image']; ?>" class="avatar" style="width: 80px;"></td>
                    <td class="text-center"><?= $a['zoomid']; ?></td>
                    <td class="text-center"><?= $a['name']; ?></td>
                    <td class="text-center"><?= $a['email']; ?></td>
                    <td class="text-center"><?= $a['role']; ?></td>
                    <td class="text-center"><?= $a['department_name']; ?></td>
                    <td class="text-center"><?= $a['sub_department_name']; ?></td>
                    <td class="text-center">
                        <?php if ($a['is_active'] != 1) : ?>
                            <a href="<?php echo base_url('aktifkan/' . $a['id']); ?>" class="button alert"><span class="mif-not"> Blokir</span></a>
                        <?php else : ?>
                            <a href="<?php echo base_url('blokir/' . $a['id']); ?>" class="button success"><span class="mif-checkmark"> Aktif</span></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="dropdown-button place-right">
                            <button class="button primary rounded dropdown-toggle">Aksi</button>
                            <ul class="d-menu place-right" data-role="dropdown">
                                <li><a href="<?= base_url('detail/' . $a['id']); ?>"><span class="mif-eye"></span> Detail</a></li>
                                <li><a href="<?= base_url('editrapat/' . $a['id']); ?>"><span class="mif-copy"></span> Ubah</a></li>
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
