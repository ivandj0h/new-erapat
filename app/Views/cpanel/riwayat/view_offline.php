<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<!-- start content here -->
<?= userTabMenu($tabs); ?>

<!-- Start Main Content -->
<div class="container">
    <div data-role="navview" class="navview navview-compact-md navview-expand-lg compacted js-compact">
        <div class="navview-pane">
            <button class="pull-button">
                <span class="default-icon-menu"></span>
            </button>
            <ul class="navview-menu">
                <li>
                    <a href="<?= base_url('riwayat'); ?>">
                        <span class="icon"><span class="mif-clipboard"></span></span>
                        <span class="caption">Riwayat Rapat</span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= base_url('riwayatoffline'); ?>">
                        <span class="icon"><span class="mif-wifi-off"></span></span>
                        <span class="caption">Riwayat Rapat Offline</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('riwayatonline'); ?>">
                        <span class="icon"><span class="mif-wifi-full"></span></span>
                        <span class="caption">Riwayat Rapat Online</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="toolbar my-4" style="margin-left: 61px;">
            <strong> Tabel Data Rapat Offline</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= date("d-m-Y"); ?></strong>
        </div>
        <?= form_open('getriwayatoffline'); ?>
        <div class="d-flex flex-nowrap" style="margin-left: 62px;margin-top: -8px;margin-bottom: 25px;">
            <div class="order-1">
                <select name="id" id="getSubTypeId" data-role="select" data-validate="required not=0">
                    <option value='0'>-- Pilih Media Rapat --</option>
                    <?php $i = 1; ?>
                    <?php foreach ($tipe as $p) : ?>
                        <option value="<?= $p['id']; ?>"><?= $i++; ?>. <?= $p['meeting_subtype']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="order-2 ml-2">
                <button type="submit" class="button primary"><span class="mif-search"></span> Cari Data Rapat</button>
            </div>
        </div>
        <?= form_close(); ?>
        <div class="navview-content d-flex flex-align-center flex-justify-center h-500">
            <table class="table table-condensed hover display" id="rapat" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center w-20">Tanggal</th>
                        <th class="text-center w-20">Mulai</th>
                        <th class="text-center w-20">Akhir</th>
                        <th class="text-center w-20">Nama Bidang</th>
                        <th class="text-center w-20">Media</th>
                        <th class="text-center w-20">ID Media</th>
                        <th class="text-center w-20">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rapat as $r) : ?>
                        <tr>
                            <td class="text-center"><strong><?= date("d-m-Y", strtotime($r['end_date'])); ?></strong></td>
                            <td class="text-center"><?= date("H:i", strtotime($r['start_time'])); ?></td>
                            <td class="text-center"><?= date("H:i", strtotime($r['end_time'])); ?></td>
                            <td class="text-center"><?= $r['sub_department_name']; ?></td>
                            <td class="text-center"><?= $r['meeting_subtype']; ?></td>
                            <td class="text-center">
                                <?php
                                if ($r['type_id'] == 1) {
                                    if ($r['sub_type_id'] == 1) {
                                        echo "<strong><span class='fg-emerald'>" . $r['zoomid'] . "</span></strong>";
                                    } else {
                                        echo "<strong><span class='fg-cobalt'>" . $r['other_online_id'] . "</span></strong>";
                                    }
                                } else {
                                    echo "<strong><span class='fg-crimson'>Offline</span></strong>";
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <div class="dropdown-button">
                                    <a href="<?= base_url('detail/' . $r['unique_code']); ?>" class="button secondary outline rounded"><span class="mif-eye"></span> Detail</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php
foreach ($rapat as $r) :
// echo empty_upload_alert($r['files_upload']);
endforeach;
$this->endSection();
