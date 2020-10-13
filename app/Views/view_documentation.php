<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12 animate__animated animate__fadeIn animate__delay-1s" style="float:none;">
        <iframe src="<?= base_url('../rapat'); ?>" style="position: fixed; padding-top:0px; left:0;bottom:0; right: 0; width: 100%; height: 100%; border: none; margin-top:0; overflow-x: hidden; z-index:1;">
            Your browser doesn't support iframes
        </iframe>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
