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
    <div data-role="navview" class="navview navview-compact-md navview-expand-lg compacted js-compact">
        <div class="navview-pane">
            <button class="pull-button">
                <span class="default-icon-menu"></span>
            </button>
            <ul class="navview-menu">
                <li class="active">
                    <a href="<?= base_url('cetak'); ?>">
                        <span class="icon"><span class="mif-clipboard"></span></span>
                        <span class="caption">Cetak Rapat</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('cetakoffline'); ?>">
                        <span class="icon"><span class="mif-wifi-off"></span></span>
                        <span class="caption">Cetak Rapat Offline</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('cetakonline'); ?>">
                        <span class="icon"><span class="mif-wifi-full"></span></span>
                        <span class="caption">Cetak Rapat Online</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- <div class="row"> -->
        <!-- <div class="col-md-12"> -->
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
        <div class="toolbar my-4" style="margin-left: 65px;">
            <strong> Tabel Riwayat Rapat Berdasarkan Range Tanggal</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= date("d-m-Y"); ?></strong>
        </div>
        <div class="d-flex flex-nowrap" style="margin-left: 62px;margin-top: -8px;margin-bottom: 2px;">
            <div class="order-1"><input type="text" name="from_date" data-role="calendarpicker" data-dialog-mode="true"></div>
            <div class="order-2 ml-2"><input type="text" name="to_date" data-role="calendarpicker" data-dialog-mode="true"></div>
            <div class="order-3 ml-2">
                <button type="submit" class="button primary"><span class="mif-search"></span> Cari Data Rapat</button>
            </div>
            <button class="tool-button secondary" style="width: 36px;height: 36px;" onclick="printContents(id)"><span class="mif-printer"></span></button>
            <button class="tool-button alert" style="width: 36px;height: 36px;padding: 1px 1px 1px 4px;"><span class="mif-file-pdf"></span></button> &nbsp;
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
                    <?php foreach ($cetak as $r) : ?>
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
        <!-- </div> -->
        <!-- </div> -->
    </div>
</div>

<!-- end content here -->
<?php
$this->endSection();
?>

<script>
    $(".red").css("color", "red");

    // Print Div
    function printContents(id) {
        var contents = $("#" + id).html();

        if ($("#printDiv").length == 0) {
            var printDiv = null;
            printDiv = document.createElement('div');
            printDiv.setAttribute('id', 'printDiv');
            printDiv.setAttribute('class', 'printable');
            $(printDiv).appendTo('body');
        }

        $("#printDiv").html(contents);

        window.print();

        $("#printDiv").remove();
    }
</script>