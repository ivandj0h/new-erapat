<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
navbar_child($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12" style="float:none;margin:auto;">
        <div class="row" style="margin-top: 104px;">
            <div class="row" style="display: flex;flex-wrap: wrap;margin-left: -52px;margin-right: -6px;margin-top: -15px;">
                <div class="cell order-2" style="margin-top: 77px;">
                    <iframe src="https://forms.zoho.com/projectlitbang/home#myforms" style="position: fixed;left: 249px;bottom:0;right: 0px;width: 82%;height: 97%;border: none;margin:0;overflow:hidden;z-index:1;">
                        Your browser doesn't support iframes
                    </iframe>
                </div>
                <div class="cell order-1">
                    <ul class="sidenav-m3">
                        <li class="title">ZOHO FORM BUILDER</li>
                        <li><a href="<?= base_url('zohoconnect'); ?>"><span class="mif-lock icon"></span> Login</a></li>
                        <li><a href="<?= base_url('zohoforms'); ?>"><span class="mif-file-text icon"></span>All Forms</a></li>
                        <li><a href="<?= base_url('zohoreports'); ?>"><span class="mif-file-pdf icon"></span>All Reports</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content here -->
</div>

<?php
$this->endSection();
