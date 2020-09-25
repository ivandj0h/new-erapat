<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_before_login($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <h3>DOCUMENTATION</h3>
    <!-- end content here -->
</div>

<?php
$this->endSection();
