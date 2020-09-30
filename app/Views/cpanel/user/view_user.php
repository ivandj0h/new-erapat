<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>


<!-- start content here -->
<?= userTabMenu(); ?>
<!-- end content here -->


<?php
$this->endSection();
?>