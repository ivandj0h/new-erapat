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
            <strong>Ubah Data Bagian</strong>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= tanggal("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex h-500">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <form data-role="validator" action="<?= base_url('updatebagian') ?>" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <input type="text" name="id" value="<?= $bagian->id ?>" />
                            <table class="table cell-border table-border cell-media-table" style="width: 630px;left: -260px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Sekretariat</td>
                                        <td>
                                            <select data-role="select" name="depid" data-validate="required not=-1">
                                                <option value=""><?= $bagian->department_name; ?></option>
                                                <?php foreach ($sekretariat->getResult() as $s) : ?>
                                                    <option value="<?= $s->id; ?>"><?= $s->department_name; ?></option>>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Bagian</td>
                                        <td>
                                            <input data-role="input" data-validate="required" type="text" name="sekretariat" value="<?= $bagian->sub_department_name ?>" placeholder="isikan Nama Bagian">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">&nbsp;</td>
                                        <td>
                                            <button type="submit" id="btnSave" class="button success"><span class="mif-checkmark"></span> Update Data</button>
                                            <a href="<?= base_url('sekretariat'); ?>" class="button secondary"><span class="mif-not"></span> Batal</a>
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
