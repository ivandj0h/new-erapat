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
                <h1><small><span class="icon mif-not"></span> Error 405: Not Allowed</small></h1>
                <hr class="thin" />
                <p class="remark alert text-center">
                    Maaf, Data Rapat ini sudah di batalkan, tidak bisa di Edit.
                </p>
                <small style="color: #ddd;">Kontak <strong>Administrator</strong> untuk info selanjutnya</small>
                <?php
                header("refresh:3;url=" . base_url('rapat')); ?>
            </div>
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
