<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>

<div class="container">
    <!-- start content here -->
    <div class="col-lg-12" style="float:none;margin:auto;">
        <!-- <iframe src="http://localhost/github/" style="position: fixed; padding-top:55px; left:0;bottom:0; right: 0; width: 100%; height: 100%; border: none; margin:0; overflow-x: hidden; z-index:1;">
            Your browser doesn't support iframes
        </iframe> -->
        <br> <br> <br> <br>
        <h1>Hello, <?= session()->get('fullName') ?></h1>
        <hr>
        <div class="row">
            <div class="cell flex-align-self-start"></div>
            <div class="cell flex-align-self-center" style="margin-top: 300px; ">
                <button class="button" data-role="popover" data-popover-hide="0" data-popover-text="
            <iframe width='560'
                height='315'
                src='https://www.zoho.com/forms/login.html'
                frameborder='0' allowfullscreen>
            </iframe>
        " data-popover-trigger="click">Click Me</button>
            </div>
            <div class="cell flex-align-self-end"></div>
        </div>
    </div>
</div>
<!-- end content here -->
</div>

<?php
$this->endSection();
