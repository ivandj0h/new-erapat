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
        <strong> Tabel Master Data Sekretariat</strong>
    </div>
    <div class="toolbar my-3 place-right">
        <a href="<?php echo base_url('addsekretariat') ?>" class="button success"><span class="mif-file-text"></span> Tambah Sekretariat Baru</a>
    </div>
    <table class="table hover display order-column" id="account" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-20">No</th>
                <th class="text-center w-20">Nama Sekretariat</th>
                <th class="text-center w-20">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($sekretariat->getResult() as $a) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-left"><strong><?= $a->department_name; ?></strong></td>
                    <td class="text-center">
                        <div class="dropdown-button">
                            <button class="button secondary outline rounded dropdown-toggle">Aksi</button>
                            <ul class="d-menu place-right" data-role="dropdown">
                                <li><a href="<?= base_url('editsekretariat/' . $a->id); ?>"><span class="mif-copy"></span> Ubah</a></li>
                                <li><a href="javascript:void(0);" onclick="openDemoDialog(<?php echo $a->id; ?>)"><i class="fas fa-fw fa-trash"></i> Hapus</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    var url = "<?php echo base_url(); ?>";
    var baseUrl = "<?php echo base_url('sekretariat'); ?>";

    function openDemoDialog(id) {
        Metro.dialog.create({
            title: "HAPUS DATA SEKRETARIAT",
            content: "<div>Apakah Anda Yakin?</div>",
            actions: [{
                    caption: "Hapus",
                    cls: "js-dialog-close alert",
                    onclick: function() {
                        window.location = url + '/deletesekretariat/' + id;
                    }
                },
                {
                    caption: "Batal",
                    cls: "js-dialog-close",
                    onclick: function() {
                        window.location = baseUrl;
                    }
                }
            ]
        });
    }
</script>
<!-- end content here -->
<?php
$this->endSection();
