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
                    <?php if ($account->role_id == 1) : ?>
                        <a href="<?= base_url('changeadminpassword/' . $account->token); ?>">
                            <span class="icon"><span class="mif-key"></span></span>
                            <span class="caption">Ganti Password</span>
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <div class="toolbar my-4" style="margin-left: 293px;">
            <strong> Base Profile</strong> &nbsp;-&nbsp; <i><?= $account->name; ?></i>
        </div>
        <div class="toolbar my-3 place-right">
            Tanggal : &nbsp;<strong><?= date("d-m-Y"); ?></strong>
        </div>
        <div class="navview-content d-flex h-500">
            <div class="grid">
                <div class="row">
                    <div class="cell">
                        <form data-role="validator" action="<?= base_url('updateaccount') ?>" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <input type="hidden" name="token" value="<?= $account->token ?>" />
                            <input type="hidden" name="id" value="<?= $account->id ?>" />
                            <input type="hidden" name="role_id" value="<?= $account->role_id ?>" />
                            <table class="table cell-border table-border cell-media-table" style="width: 630px;left: 20px;">
                                <tbody>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Sekretariat</td>
                                        <td><strong><?= $account->department_name ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Bagian</td>
                                        <td>
                                            <select data-role="select" name="sub_department_id" data-validate="required not=-1">
                                                <option value="<?= $account->sub_department_id; ?>"><?= $account->sub_department_name ?></option>
                                                <?php foreach ($subdepartment as $s) : ?>
                                                    <option value="<?= $s['id']; ?>"><?= $s['sub_department_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Nama Lengkap</td>
                                        <td>
                                            <input data-role="input" data-validate="required" type="text" name="name" value="<?= $account->name ?>" placeholder="isikan Nama">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Email</td>
                                        <td>
                                            <input data-role="input" data-validate="required email" type="email" name="email" value="<?= $account->email ?>" placeholder="isikan Email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">Zoom ID</td>
                                        <td>
                                            <input data-role="input" data-validate="required" type="text" name="zoomid" value="<?= $account->zoomid ?>" placeholder="Zoom ID">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 160px;padding: 16px 16px 16px 0;">&nbsp;</td>
                                        <td>
                                            <button type="submit" id="btnSave" class="button success"><span class="mif-checkmark"></span> Update Data <?= $account->name ?></button>
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
