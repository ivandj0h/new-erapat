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
        <strong> Tabel Master Data Rapat</strong>
    </div>
    <div class="toolbar my-3 place-right">
        <a href="<?php echo base_url('baru') ?>" class="button success"><span class="mif-file-text"></span> Tambah Rapat Baru</a>
    </div>
    <table class="table table-condensed hover display" id="rapat" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-20">Tanggal</th>
                <th class="text-center w-20">Mulai</th>
                <th class="text-center w-20">Akhir</th>
                <th class="text-center w-20">Nama Bidang</th>
                <th class="text-center w-20">Tipe Rapat</th>
                <th class="text-center w-20">File Upload</th>
                <th class="text-center w-20">Status</th>
                <th class="text-center w-20">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rapat as $r) : ?>
                <tr>
                    <td class="text-center"><strong><?= tanggal("d-m-Y", strtotime($r['end_date'])); ?></strong></td>
                    <td class="text-center"><?= date("H:i", strtotime($r['start_time'])); ?></td>
                    <td class="text-center"><?= date("H:i", strtotime($r['end_time'])); ?></td>
                    <td><?= $r['sub_department_name']; ?></td>
                    <td class="text-center">
                        <?php
                        if ($r['meeting_type'] == 'Online') : ?>
                            <strong><span class="fg-emerald"> Rapat Online</span></strong>
                        <?php else : ?>
                            <strong><span class="fg-red"> Rapat Offline</span></strong>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if ($r['request_status'] == '1') : ?>
                            <strong><span class="fg-black"> Rapat Dibatalkan</span></strong>
                        <?php else : ?>
                            <?php if (!empty($r['files_upload']) && !empty($r['files_upload1']) && !empty($r['files_upload2'])) : ?>
                                <a href="<?= base_url('detail/' . $r['unique_code']) ?>"><strong><span class="fg-emerald"> File Upload Komplit</span></strong></a>
                            <?php elseif (!empty($r['files_upload']) && empty($r['files_upload1']) && empty($r['files_upload2'])) : ?>
                                <a href="<?= base_url('uploadnotulen/' . $r['unique_code']) ?>"><strong><span class="fg-red"> File Notulen belum ada</span></strong></a>
                            <?php elseif (!empty($r['files_upload']) && !empty($r['files_upload1']) && empty($r['files_upload2'])) : ?>
                                <a href="<?= base_url('uploadabsensi/' . $r['unique_code']) ?>"><strong><span class="fg-red"> File Absensi belum ada</span></strong></a>
                            <?php else : ?>
                                <a href="<?= base_url('uploadundangan/' . $r['unique_code']) ?>"><strong><span class="fg-red"> Belum ada file yang diunggah</span></strong></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <div class="split-button">
                            <?= change_status_button($r); ?>
                            <ul class="d-menu" data-role="dropdown">
                                <?php
                                $currenttime = date("H:i:s");
                                $starttime = date($r['start_time']);
                                $endtime = date($r['end_time']);
                                $endtime = $endtime <= $starttime ? $endtime + 2400 : $endtime;
                                ?>
                                <?php if (($currenttime >= $starttime) && ($currenttime <= $endtime)) : ?>
                                    <?php if ($r['request_status'] == 1) : ?>
                                        <li><a href="<?= base_url('/rapatcancel'); ?>"> Reschedule</a></li>
                                    <?php else : ?>
                                        <li><a href="<?= base_url('reschedulle/' . $r['unique_code']); ?>"> Reschedule</a></li>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <li><a href="<?= base_url('reschedulle/' . $r['unique_code']); ?>"> Reschedule</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="dropdown-button">
                            <button class="button secondary outline rounded dropdown-toggle"><span class="mif-cog"> Aksi</button>
                            <ul class="d-menu place-right" data-role="dropdown">
                                <li><a href="<?= base_url('detail/' . $r['unique_code']); ?>"><span class="mif-eye"></span> Detail</a></li>
                                <li><a href="<?= base_url('editrapat/' . $r['unique_code']); ?>"><span class="mif-copy"></span> Ubah</a></li>
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
