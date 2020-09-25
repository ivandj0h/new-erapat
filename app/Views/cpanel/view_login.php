<?php

$this->extend("layouts/layout_main");
$this->section("contents");
?>
<div class="container">
    <!-- start content here -->
    <div class="grid ">
        <div class="row d-flex flex-column flex-justify-center h-vh-50">
            <div class="cell-5 offset-4">
                <form class="login-form bg-white p-6 mx-auto bd-default win-shadow">
                    <h2 class="text-light"><span class="mif-1x mif-calendar"></span> CPanel Login</h2>
                    <hr class="thin mt-4 mb-4 bg-white">
                    <div class="form-group">
                        <input type="email" placeholder="Enter email" data-role="input" />
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Enter email" data-role="input" />
                    </div>
                    <div class="form-group mt-10">
                        <button class="button primary" data-role="button">Submit data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end content here -->
</div>

<?php
$this->endSection();
