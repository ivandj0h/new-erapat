<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12" style="float:none;margin:auto;">
        <iframe src="http://localhost/github/" style="position: fixed; padding-top:55px; left:0;bottom:0; right: 0; width: 100%; height: 100%; border: none; margin:0; overflow-x: hidden; z-index:1;">
            Your browser doesn't support iframes
        </iframe>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
