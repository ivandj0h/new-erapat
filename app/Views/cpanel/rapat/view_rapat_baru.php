<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>


<!-- start content here -->
<?= userTabMenu($tabs); ?>
<!-- Content -->
<div class="container">
    <div class="toolbar my-5">
        <strong> Tambah Data Rapat</strong>
    </div>
    <div class="toolbar my-5 place-right">
        <a href="<?php echo base_url('rapat') ?>" class="button primary outline"><span class="mif-undo"></span> Kembali</a>
    </div>

    <div class="row">
        <div class="cell-8 offset-2 my-5">
            <form action="<?php echo base_url('rapat/tambah') ?>" method="POST">
                <div class="row mb-4">
                    <label class="cell-sm-3">Tanggal Rapat</label>
                    <div class="cell-sm-8">
                        <input type="text" id="start_date" name="start_date" data-role="calendarpicker" data-dialog-mode="true" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Jam Awal Rapat</label>
                    <div class="cell-sm-8">
                        <input type="text" id="start_date" name="start_time" data-role="timepicker" data-dialog-mode="true" data-seconds="false" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Jam Akhir Rapat</label>
                    <div class="cell-sm-8">
                        <input type="text" id="start_date" name="end_time" data-role="timepicker" data-dialog-mode="true" data-seconds="false" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Tipe Rapat</label>
                    <div class="cell-sm-8">
                        <select name="type_id" id="type_id" data-role="select">
                            <option value='0'>-- Pilih Tipe Rapat --</option>
                            <?php $i = 1; ?>
                            <?php foreach ($alltype as $p) : ?>
                                <option value="<?= $p['id']; ?>"><?= $i++; ?>. <?= $p['meeting_type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Media Rapat</label>
                    <div class="cell-sm-8">
                        <select name="meeting_subtype" id="meeting_subtype">
                            <option value='0'>-- Pilih Media Rapat --</option>
                            <!-- SubMedia Rapat akan diload menggunakan ajax, dan ditampilkan disini -->
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">ZOOM ID</label>
                    <div class="cell-sm-8">
                        <ul class="chec-radio">
                            <!-- Radio Button Here -->

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="cell">
                        <button type="submit" class="button success"><span class="mif-file-text"></span> Tambah Rapat Baru</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- end content here -->


<?php $this->endSection(); ?>