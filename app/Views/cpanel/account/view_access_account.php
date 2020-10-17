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
                <li>
                    <a href="<?= base_url('detailaccount/' . $account->token); ?>">
                        <span class="icon"><span class="mif-user-secret"></span></span>
                        <span class="caption">Base Profile</span>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= base_url('accountaccess/' . $account->token); ?>">
                        <span class="icon"><span class="mif-cog"></span></span>
                        <span class="caption">Manage Access</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="toolbar my-4" style="margin-left: 293px;">
            <strong> Manage Access</strong> &nbsp;-&nbsp; <i><?= $account->name ?></i>
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
                        <table class="table cell-border table-border cell-media-table" style="width: 630px;z-index:999">
                            <tbody>
                                <tr>
                                    <td style="width: 160px;padding: 16px 16px 16px 0;">Level User</td>
                                    <td>
                                        <div class="dropdown-button">
                                            <button class="button dropdown-toggle secondary outline rounded"><span class="mif-checkmark"></span> Level <?= $account->role ?></button>
                                            <ul class="d-menu" data-role="dropdown" style="z-index: 100;">
                                                <?php foreach ($roles as $rl) : ?>
                                                    <li><a href="<?php echo base_url('leveluser/' . $account->id . '/' . $rl['id']); ?>" class="fg-emerald"><span class="mif-checkmark"> Level <?= $rl['role']; ?></span></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 160px;padding: 16px 16px 16px 0;">Status Akun</td>
                                    <td>
                                        <div class="dropdown-button">
                                            <?php if ($account->is_active != 1) : ?>
                                                <button class="button dropdown-toggle outline alert rounded"><span class="mif-not"></span> Blokir</button>
                                            <?php else : ?>
                                                <button class="button dropdown-toggle success rounded"><span class="mif-checkmark"></span> Aktif</button>
                                            <?php endif; ?>
                                            <ul class="d-menu" data-role="dropdown">
                                                <?php if ($account->is_active != 1) : ?>
                                                    <li><a href="<?php echo base_url('aktifkan/' . $account->id); ?>" class="fg-emerald"><span class="mif-checkmark"> Aktif</span></a></li>
                                                <?php else : ?>
                                                    <li><a href="<?php echo base_url('blokir/' . $account->id); ?>" class="fg-crimson"><span class="mif-not"> Blokir</span></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 160px;padding: 16px 16px 16px 0;">Reset Password</td>
                                    <td>
                                        <a href="<?= base_url('resetaccountpassword/' . $account->id) ?>" class="button outline info rounded"><span class="mif-redo"></span> Reset Password <strong><?= $account->name ?></strong></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 160px;padding: 16px 16px 16px 0;">&nbsp;</td>
                                    <td>
                                        <a href="<?= base_url('account') ?>" class="button secondary"><span class="mif-not"></span> Batal</a>
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
<!-- Start Main Content -->

<!-- end content here -->
<?php
$this->endSection();
