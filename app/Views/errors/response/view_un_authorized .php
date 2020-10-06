<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="grid animate__animated animate__fadeIn animate__delay-1s">
        <div class="row d-flex flex-column flex-justify-center h-vh-50 mt-10">
            <div class="cell-5 mx-auto block-shadow">
                <h1><small><span class="icon mif-blocked"></span> Error 401: Unauthorized</small></h1>
                <hr class="thin" />
                <p class="remark alert text-center">
                    Maaf, Anda tidak memiliki Akses ke Layanan(Services) ini! <br />
                    Kontak <strong>Administrator</strong>
                </p>
            </div>
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
