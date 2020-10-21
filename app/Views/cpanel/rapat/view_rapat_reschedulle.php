<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>


<!-- Start of Content -->
<?= userTabMenu($tabs); ?>

<!-- Start of Form -->
<div class="container">
    <div class="toolbar my-5">
        <strong> Reschedulle Data Rapat</strong>
    </div>
    <div class="toolbar my-5 place-right">
        <a href="<?php echo base_url('rapat') ?>" class="button primary outline"><span class="mif-undo"></span> Kembali</a>
    </div>
    <div class="row">
        <div class="cell-12 my-5">
            <form data-role="validator" action="<?= base_url('updatestatus/' . $rapat->unique_code) ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <input type="hidden" name="id" value="<?= $rapat->id ?>" />
                <input type="hidden" name="zoomid" value="<?= $rapat->zoomid ?>" />
                <input type="hidden" name="sub_type_id" value="<?= $rapat->sub_type_id ?>" />
                <div class="row mb-4">
                    <label class="cell-sm-2">Status Rapat</label>
                    <div class="cell-sm-4">
                        <select name="request_status" id="request_status" data-role="select" data-validate="required not=0">
                            <?php
                            $date_now = strtotime(date('Y-m-d'));
                            $date_db = strtotime($rapat->start_date);

                            if ($date_now <= $date_db) :
                                if ($rapat->request_status == 1) :
                                    form_cancel_status($rapat);
                                else :
                                    if ($rapat->type_id == 1) :
                                        form_change_status_online($rapat);
                                    else :
                                        form_change_status_offline($rapat);
                                    endif;
                                endif;
                            else :
                                form_change_status_online($rapat);
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Tanggal Rapat</label>
                    <div class="cell-sm-2 calendarpicker required">
                        <input type="text" data-validate="required" value="<?= $rapat->end_date; ?>" name="end_date" data-role="calendarpicker" data-dialog-mode="true">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Jam Awal Rapat</label>
                    <div class="cell-sm-2">
                        <input type="time" data-validate="required" id="start_time" value="<?= $rapat->start_time; ?>" name="start_time">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Jam Akhir Rapat</label>
                    <div class="cell-sm-2">
                        <input type="time" data-validate="required" id="end_time" value="<?= $rapat->end_time; ?>" name="end_time">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="cell-sm-2">Keterangan Status</label>
                    <div class="cell-sm-10">
                        <textarea name="remark_status" id="context-form" placeholder="Tuliskan Keterangan Statusnya disini..."><?= $rapat->remark_status; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="cell">
                        <button type="submit" class="button success"><span class="mif-done"></span> Update Status</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Form -->

<!-- End of Content -->
<?php $this->endSection(); ?>


<!-- Tutorial -->
<!-- https://ilmucoding.com/middleware-filters-codeigniter-4/ -->