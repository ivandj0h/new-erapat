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
        <div class="red-div-alert" id="hideMe">
            <?php if (session()->get('id') == true) : ?>
                <?= red_div_alert(); ?>
            <?php else : ?>
                <?= ''; ?>
            <?php endif; ?>
        </div>
        <div class="navview-pane">
            <button class="pull-button">
                <span class="default-icon-menu"></span>
            </button>
            <ul class="navview-menu">
                <li>
                    <a href="<?= base_url('pembaharuan'); ?>">
                        <span class="icon"><span class="mif-loop2"></span></span>
                        <span class="caption">Cek Pembaharuan Rapat</span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= base_url('cekzoom'); ?>">
                        <span class="icon"><span class="mif-video-camera"></span></span>
                        <span class="caption">Cek Ketersediaan ZoomID</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('cekoffline'); ?>">
                        <span class="icon"><span class="mif-organization"></span></span>
                        <span class="caption">Cek Rapat Offline</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="toolbar my-4" style="margin-left: 65px;">
            <strong> Ketersediaan ZoomID</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tabel Data Zoom Hari ini Tanggal : &nbsp;<strong><?= date("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex flex-align-center flex-justify-center h-500">
            <table class="table table-condensed hover display" id="rapat" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center w-40">ZoomID</th>
                        <th class="text-center w-20">Nama Pemilik Zoom</th>
                        <th class="text-center w-20">Zoom ID dipakai Oleh</th>
                        <th class="text-center w-20">Mulai Pukul</th>
                        <th class="text-center w-20">Berakhir Pukul</th>
                        <th class="text-center w-20">Durasi</th>
                        <th class="text-center w-20">Status Rapat</th>
                        <th class="text-center w-20">Status Zoom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($zoom as $a) : ?>
                        <tr>
                            <td class="text-center">
                                <strong><?= $a['zoomid']; ?></strong>
                            </td>
                            <td class="text-center">
                                <span><?= $a['pemilik_zoom']; ?></span>
                            </td>
                            <td class="text-center">
                                <strong><?= $a['pemakai_zoom']; ?></strong>
                            </td>
                            <td class="text-center">
                                <?= date("H:i", strtotime($a['start_time'])); ?>
                            </td>
                            <td class="text-center">
                                <?= date("H:i", strtotime($a['end_time'])); ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $time1 = strtotime($a['start_time']);
                                $time2 = strtotime($a['end_time']);
                                $difference = round(abs($time2 - $time1) / 3600, 2);
                                echo $difference . ' Jam';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $currenttime = date("H:i:s");
                                $starttime = date($a['start_time']);
                                $endtime = date($a['end_time']);

                                $endtime = $endtime <= $starttime ? $endtime + 2400 : $endtime;
                                if (($currenttime >= $starttime) && ($currenttime <= $endtime)) {
                                    echo '<span class="fg-crimson"><i class="fas fa-times"></i> Sedang Berlangsung</span>';
                                } else if (($currenttime < $starttime) && ($currenttime < $endtime)) {
                                    echo '<span class="fg-cobalt"><i class="fas fa-check"></i> Belum Mulai</span>';
                                } else {
                                    echo '<span class="fg-emerald"><i class="fas fa-check"></i> Telah Selesai</span>';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $currenttime = date("H:i:s");
                                $starttime = date($a['start_time']);
                                $endtime = date($a['end_time']);

                                $endtime = $endtime <= $starttime ? $endtime + 2400 : $endtime;
                                if (($currenttime >= $starttime) && ($currenttime <= $endtime)) {
                                    if ($a['user_id'] == 20 || $a['user_id'] == 21 || $a['user_id'] == 14) { ?>
                                        <span class="text-secondary"><i class="fas fa-times"></i> Terbatas</span>
                                    <?php
                                    } else {
                                        echo '<span class="fg-crimson"><i class="fas fa-times"></i> Dipakai</span>';
                                    }
                                } else {
                                    if ($a['user_id'] == 20 || $a['user_id'] == 21 || $a['user_id'] == 14) { ?>
                                        <span class="text-secondary"><i class="fas fa-times"></i> Terbatas</span>
                                <?php
                                    } else {
                                        echo '<span class="fg-emerald"><i class="fas fa-check"></i> Tersedia</span>';
                                    }
                                }
                                ?>
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
// foreach ($rapat as $r) :
// echo empty_upload_alert($r['files_upload']);
// endforeach;
$this->endSection();
