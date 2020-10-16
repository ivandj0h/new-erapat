<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="grid animate__animated animate__fadeIn animate__delay-0s">
        <div class="row d-flex flex-column flex-justify-center h-vh-50 mt-10">
            <div class="cell-5 mx-auto block-shadow" style="text-align: center;">
                <h1><small><span class="icon mif-not"></span> Error 403: Server Forbidden</small></h1>
                <hr class="thin" />
                <p class="remark alert text-center">
                    Maaf, Layanan(Services) yang anda cari tidak di ijinkan! <br />
                    Kontak <strong>Administrator</strong>
                </p>
            </div>
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
