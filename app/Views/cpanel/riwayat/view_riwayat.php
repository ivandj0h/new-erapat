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
    <div class="row">
        <div class="col-md-12">
            <?= form_open('riwayats'); ?>
            <!-- cek validasi -->
            <?php
            $inputs = session()->getFlashdata('inputs');
            $errors = session()->getFlashdata('errors');
            $success = session()->getFlashdata('success');
            if (!empty($errors)) { ?>
                <div id='hideMe'>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <div class="red">ff</div>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php
            }
            ?>
            <div class="toolbar my-2">
                <strong> Tabel Riwayat Rapat</strong>
            </div>
            <div class="d-flex flex-nowrap my-2">
                <div class="order-1"><input type="text" name="from_date" data-role="calendarpicker" data-dialog-mode="true"></div>
                <div class="order-2 ml-2"><input type="text" name="to_date" data-role="calendarpicker" data-dialog-mode="true"></div>
                <div class="order-3 ml-2"><button type="submit" class="button primary"><span class="mif-search"></span> Cari Data Rapat</button></div>
            </div>
            <?= form_close(); ?>
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
                    <?php foreach ($riwayat as $r) : ?>
                        <tr>
                            <td><?= date("d-m-Y", strtotime($r['end_date'])); ?></td>
                            <td><?= date("H:i", strtotime($r['start_time'])); ?></td>
                            <td><?= date("H:i", strtotime($r['end_time'])); ?></td>
                            <td><?= $r['sub_department_name']; ?></td>
                            <td><?= $r['meeting_subtype']; ?></td>
                            <td>
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
                            <td>
                                <div class="dropdown-button">
                                    <a href="<?= base_url('detail/' . $r['unique_code']); ?>" class="button"><span class="mif-eye"></span> Detail</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- end content here -->
<?php
// foreach ($rapat as $r) :
// echo empty_upload_alert($r['files_upload']);
// endforeach;
$this->endSection();
?>

<script>
    $(".red").css("color", "red");
</script>