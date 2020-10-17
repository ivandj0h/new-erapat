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
                    <a href="<?= base_url('changeadminpassword/' . $account->token); ?>">
                        <span class="icon"><span class="mif-key"></span></span>
                        <span class="caption">Ganti Password</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="toolbar my-4" style="margin-left: 293px;">
            <strong> Base Profile</strong> &nbsp;-&nbsp; <i><?= $account->name ?></i>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= tanggal("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex h-500">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <img src="<?= base_url('assets/data/profile/') . '/' . $account->image; ?>" class="avatar" style="width: 280px;">
                    </div>
                    <div class="cell">
                        <table class="table cell-border table-border cell-media-table" style="width: 630px;">
                            <tbody>
                                <tr>
                                    <td style="width: 160px;">Nama Lengkap</td>
                                    <td>
                                        <input data-role="input" value="<?= $account->name ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input data-role="input" value="<?= $account->email ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zoom ID</td>
                                    <td>
                                        <input data-role="input" value="<?= $account->zoomid ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sekretariat</td>
                                    <td>
                                        <input data-role="input" value="<?= $account->department_name ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Bagian</td>
                                    <td>
                                        <input data-role="input" value="<?= $account->sub_department_name ?>" disabled>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
