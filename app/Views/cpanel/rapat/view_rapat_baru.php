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
    <hr>
    <div class="row">
        <div class="cell-12 my-5 box-shadow">
            <form id="addMeeting" method="POST" data-role="Validator" data-role-validator="true" novalidate="novalidate">
                <div class="row mb-4">
                    <label class="cell-sm-3">Tanggal Rapat</label>
                    <div class="cell-sm-8 calendarpicker required">
                        <input type="text" data-validate="required" id="start_date" name="start_date" data-role="calendarpicker" data-dialog-mode="true" autocomplete="off">
                        <span class="help-block"><?= esc($error) ?></span>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Jam Awal Rapat</label>
                    <div class="cell-sm-8">
                        <input type="text" data-validate="required" id="start_time" name="start_time" data-role="timepicker" data-dialog-mode="true" data-seconds="false" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Jam Akhir Rapat</label>
                    <div class="cell-sm-8">
                        <input type="text" data-validate="required" id="end_time" name="end_time" data-role="timepicker" data-dialog-mode="true" data-seconds="false" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Tipe Rapat</label>
                    <div class="cell-sm-8">
                        <select name="type_id" id="type_id" data-role="select" data-validate="required">
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
                        <select name="meeting_subtype" id="meeting_subtype" data-validate="required">
                            <option value='0'>-- Pilih Media Rapat --</option>
                            <!-- SubMedia Rapat akan diload menggunakan ajax, dan ditampilkan disini -->
                        </select>
                    </div>
                </div>
                <div class="row mb-4" id="zoom_id" style='display:none;'>
                    <label class="cell-sm-3">ZOOM ID</label>
                    <div class="cell-sm-8">
                        <ul class="chec-radio">
                            <!-- Radio Button Here -->
                            <?php get_available_zoomid(); ?>
                        </ul>
                    </div>
                </div>
                <div class="row mb-4" id="other_online_id" style='display:none;'>
                    <label class="cell-sm-3">ID Rapat lain</label>
                    <div class="cell-sm-8">
                        <input type="text" id="onlineId" name="other_online_id" class="border" placeholder="ID Rapat" autocomplete="off" disabled>
                        <!-- <br /> -->
                        <input type="checkbox" class="dissable" id="yourBox" />
                        <small class="text-danger"> Aktifkan CkeckBox Jika tidak menggunakan ZOOM Meeting</small>
                    </div>
                </div>
                <!-- https://ilmucoding.com/middleware-filters-codeigniter-4/ -->
                <div class="row mb-4">
                    <label class="cell-sm-3">Agenda Rapat</label>
                    <div class="cell-sm-8">
                        <textarea name="agenda" data-validate="required" id="default" placeholder="Tuliskan Agenda Rapatnya disini..."><?= set_value('agenda', ''); ?></textarea>
                        <span id="agenda_error" class="text-danger"></span>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Pimpinan Rapat</label>
                    <div class="cell-sm-8">
                        <input data-role="tagsinput" data-validate="required" type="text" name="participants_name" id="participants_name" value="<?= set_value('participants_name'); ?>" placeholder="Tambah Pimpinan Rapat">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-3">Narasumber</label>
                    <div class="cell-sm-8">
                        <input type="text" data-validate="required" data-role="taginput" data-tag-trigger="Space" name="speakers_name" id="speakers_name" value="<?= set_value('speakers_name'); ?>" placeholder="Tambah Narasumber">
                    </div>
                </div>
                <div class="row">
                    <div class="cell">
                        <button type="submit" id="btnSave" class="button success"><span class="mif-file-text"></span> Tambah Rapat Baru</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- end content here -->
<?php $this->endSection(); ?>