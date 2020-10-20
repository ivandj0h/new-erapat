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
        <div class="toolbar my-4" style="left: 20px !important;">
            <strong>Ubah Data Zoom ID</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= tanggal("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex h-500">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <form data-role="validator" action="<?= base_url('updatezoom') ?>" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <input type="hidden" name="id" value="<?= $zoom['id'] ?>" />
                            <input type="hidden" name="token" value="<?= $zoom['token'] ?>" />
                            <table class="table cell-border table-border cell-media-table" style="width: 630px;left: -260px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Pemilik Zoom ID</td>
                                        <td>
                                            <select data-role="select" name="userid" data-validate="required not=-1">
                                                <option value="<?= $zoom['user_id'] ?>" selected><?= $zoom['pemilik_zoom'] ?></option>
                                                <?php foreach ($user->getResult() as $s) : ?>
                                                    <option value="<?= $s->id; ?>"><?= $s->name; ?></option>>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Zoom ID</td>
                                        <td>
                                            <input data-role="input" data-validate="required" type="text" name="zoomname" value="<?= $zoom['idzoom'] ?>" placeholder="isikan Nama Zoom ID">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Aktif</td>
                                        <td>
                                            <input type="radio" data-role="radio" data-style="2" name="isactive" value="1" <?php
                                                                                                                            echo set_value('is_active', $zoom['is_active']) == 1 ? "checked" : "";
                                                                                                                            ?> /> YA
                                            <input type="radio" data-role="radio" data-style="2" name="isactive" value="0" <?php
                                                                                                                            echo set_value('is_active', $zoom['is_active']) == 0 ? "checked" : "";
                                                                                                                            ?> /> TIDAK
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">&nbsp;</td>
                                        <td>
                                            <button type="submit" id="btnSave" class="button success"><span class="mif-checkmark"></span> Update Data</button>
                                            <a href="<?= base_url('zoom'); ?>" class="button secondary"><span class="mif-not"></span> Batal</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Main Content -->

<!-- end content here -->
<?php
$this->endSection();
