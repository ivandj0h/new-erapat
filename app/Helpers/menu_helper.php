<?php

function userTabMenu()
{ ?>
    <div class="bg-light" id="hero" style="padding-top: 125px!important;">
        <div class="container">
            <div class="row">
                <div class="cell-md-4 text-center-fs text-left-md pt-2">
                    <div>
                        <span id="github-owner">Selamat Datang <strong><?= session()->get('fullName') ?></strong> </span>
                    </div>
                </div>

                <div class="cell-md-8 text-center-fs text-right-md pt-2"></div>
            </div>
        </div>

        <div class="container-fluid pt-4 pl-0 pr-0 pl-3-md pr-3-md">
            <div class="container">
                <ul data-role="tabs" class="bg-light w-100 pl-0 pr-0" data-expand-point="md">
                    <li><a href="#"><span class="mif-user"></span> Profil</a></li>
                    <li><a href="#"><span class="mif-info"></span> Master Data Rapat</a></li>
                    <li><a href="#"><span class="mif-loop2"></span> Pembaharuan Data</a></li>
                    <li><a href="#"><span class="mif-books"></span> Riwayat Rapat</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
}
