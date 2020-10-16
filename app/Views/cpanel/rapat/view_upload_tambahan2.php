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
    <div class="toolbar my-5" style="margin-left: 2px;">
        <strong> Form Upload File Tambahan 2</strong>&nbsp; - &nbsp;<i><?= $rapat->sub_department_name ?></i>
    </div>
    <div class="toolbar my-3 place-right">
        Data Rapat Tanggal : &nbsp;<strong><?= date("d-m-Y", strtotime($rapat->end_date)); ?></strong>
    </div>
    <div class="row">
        <div class="cell-12 my-5">
            <form data-role="validator" action="<?= base_url('tambahanaction2') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <input type="hidden" name="id" value="<?= $rapat->id ?>" />
                <input type="hidden" name="code" value="<?= $rapat->unique_code ?>" />
                <div class="row mb-2">
                    <label class="cell-sm-2 text-right">Rapat Pukul</label>
                    <div class="cell-sm-6">
                        <span class="remark alert" style="margin: 0;padding: 5px;color: black;">
                            <strong><?= date("H:i", strtotime($rapat->start_time)); ?></strong> s/d <strong><?= date("H:i", strtotime($rapat->end_time)); ?></strong>.
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="cell-sm-2 text-right">Agenda Rapat</label>
                    <div class="cell-sm-10">
                        <span class="remark alert" style="margin: 0;padding: 5px;color: black;">
                            <strong><?= $rapat->agenda ?></strong>.
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="cell-sm-2">&nbsp;</label>
                    <div class="cell-sm-10">
                        <input type="file" name="file" data-validate="required" data-role="file">
                        <span class="invalid_feedback">
                            File Upload tidak boleh kosong!
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="cell-sm-2">&nbsp;</label>
                    <div class="cell-sm-10">
                        <button type="submit" class="button secondary"><span class="mif-cloud-upload"></span> Upload Undangan</button>
                        <a href="<?= base_url('detail/' . $rapat->unique_code) ?>" class="button dark"><span class="mif-undo"></span> Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php $this->endSection(); ?>