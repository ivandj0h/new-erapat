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
            <strong>Tambah Data Account</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= tanggal("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex h-500">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <form data-role="validator" action="<?= base_url('storeaccount') ?>" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <table class="table cell-border table-border cell-media-table" style="width: 630px;left: -260px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Bagian</td>
                                        <td>
                                            <select data-role="select" name="sub_department_id" data-validate="required not=-1">
                                                <?php foreach ($subdepartment as $s) : ?>
                                                    <option value="<?= $s['id']; ?>"><?= $s['sub_department_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Lengkap</td>
                                        <td>
                                            <input data-role="input" data-validate="required" type="text" name="name" placeholder="isikan Nama">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Email</td>
                                        <td>
                                            <input data-role="input" data-validate="required email" type="email" name="email" placeholder="isikan Email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Zoom ID</td>
                                        <td>
                                            <input data-role="input" data-validate="required" type="text" name="zoomid" placeholder="Zoom ID">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">&nbsp;</td>
                                        <td>
                                            <button type="submit" id="btnSave" class="button success"><span class="mif-checkmark"></span> Simpan</button>
                                            <a href="<?= base_url('account'); ?>" class="button secondary"><span class="mif-not"></span> Batal</a>
                                        </td>
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
