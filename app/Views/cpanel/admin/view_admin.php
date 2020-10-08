<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12" style="float:none;margin:auto;">
        <br> <br> <br> <br><br> <br> <br> <br>
        <h1>&nbsp;</h1>
        <hr>
        <div class="row">
            <iframe src="http://localhost/rapat" style="position: fixed; left:0;bottom:0; right: 0; width: 101%; height: 101%; border: none; margin:0; overflow:hidden;z-index:1;">
                Your browser doesn't support iframes
            </iframe>
        </div>
    </div>
</div>
<!-- end content here -->
</div>

<?php
$this->endSection();
