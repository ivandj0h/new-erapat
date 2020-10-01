<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>


<!-- start content here -->
<?= userTabMenu($tabs); ?>
<!-- Content -->
<div class="container">

    <div class="skill-box">
        <div class="header bg-cobalt-dark fg-cobalt">
            <img src="<?= base_url('assets/data/profile/') . '/' . $user->image; ?>" class="avatar">
            <div class="title"><?= $user->name; ?></div>
            <div class="subtitle"><?= $user->role; ?></div>
        </div>
        <ul class="skills">
            <li></li>
            <li>
                <div class="row mb-2">
                    <label class="cell-sm-2">Email</label>
                    <div class="cell-sm-10">
                        <strong><?= $user->email; ?></strong>
                    </div>
                    <label class="cell-sm-2">Nama Sekretariat</label>
                    <div class="cell-sm-10">
                        <strong><?= $user->department_name; ?></strong>
                    </div>
                    <label class="cell-sm-2">Nama Bagian</label>
                    <div class="cell-sm-10">
                        <strong><?= $user->sub_department_name; ?></strong>
                    </div>
                    <label class="cell-sm-2">Zoom ID</label>
                    <div class="cell-sm-10">
                        <strong><?= $user->zoomid; ?></strong>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>


<!-- end content here -->


<?php
$this->endSection();
?>