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
    <div data-role="navview" class="navview navview-compact-md navview-expand-lg">
        <div class="navview-pane mt-6">
            <button class="pull-button">
                <span class="default-icon-menu"></span>
            </button>
            <ul class="navview-menu">
                <li class="active">
                    <a href="<?= base_url('detailaccount/' . $account->token); ?>">
                        <span class="icon"><span class="mif-user-secret"></span></span>
                        <span class="caption">Base Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('changepassword/' . $account->token); ?>">
                        <span class="icon"><span class="mif-key"></span></span>
                        <span class="caption">Ganti Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="toolbar my-4" style="margin-left: 293px;">
            <strong> Base Profile</strong> &nbsp;-&nbsp; <i><?= $account->name; ?></i>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= tanggal("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex flex-align-center flex-justify-center h-500">
            <div class="row">
                <div class="cell order-1" style="margin-right: -365px;">
                    <img src="<?= base_url('assets/data/profile/') . '/' . $account->image; ?>" class="avatar" style="width: 280px;">
                </div>
                <div class="cell order-2" style="margin-left: 18px;">
                    <form data-role="validator" action="<?= base_url('updateaccount/' . $account->token) ?>" method="POST">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <input type="hidden" name="token" value="<?= $account->token ?>" />
                        <input type="hidden" name="id" value="<?= $account->id ?>" />
                        <ul class="skills">
                            <li>
                                <div class="row">
                                    <label class="cell-sm-4" style="margin-right: -80px;">Nama User</label>
                                    <div class="cell-sm-8">
                                        <strong><?= $account->name; ?></strong>
                                    </div>
                                    <label class="cell-sm-4" style="margin-right: -80px;">Email</label>
                                    <div class="cell-sm-8">
                                        <input data-role="input" data-validate="required email" type="email" name="email" value="<?= $account->email ?>" placeholder="isikan Email">
                                        <span class="invalid_feedback">
                                            Inputan Email tidak boleh Kosong!
                                        </span>
                                    </div>
                                    <label class="cell-sm-4" style="margin-right: -80px;">Zoom ID</label>
                                    <div class="cell-sm-8">
                                        <input data-role="input" data-validate="required" type="text" name="zoomid" value="<?= $account->zoomid ?>" placeholder="Zoom ID">
                                        <span class="invalid_feedback">
                                            Inputan Zoom ID tidak boleh Kosong dan Harus Angka!
                                        </span>
                                    </div>
                                    <label class="cell-sm-4" style="margin-right: -80px;">Nama Bagian</label>
                                    <div class="cell-sm-8">
                                        <strong><?= $account->sub_department_name; ?></strong>
                                    </div>
                                    <label class="cell-sm-4" style="margin-right: -80px;">&nbsp;</label>
                                    <div class="cell-sm-8">
                                        <button type="submit" id="btnSave" class="button success"><span class="mif-checkmark"></span> Ubah Account <?= $account->name ?></button>
                                        <a href="<?= base_url('detailaccount/' . $account->token); ?>" class="button secondary"><span class="mif-not"></span> Batal</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php
$this->endSection();
