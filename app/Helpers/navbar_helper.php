<?php

function navbar_($nav_title)
{ ?>
    <div data-role="appbar" data-expand-point="md">
        <a href="<?= base_url(); ?>" class="brand no-hover">
            <span style="width: 100px;">
                <img src="<?= get_perhub_svg(); ?>" alt="Logo" class="image_svg_thumb"><strong> E-RAPAT</strong>
            </span>
        </a>
        <ul class="app-bar-menu">
            <?php if ($nav_title == 'calendar') : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper active text-bolds"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php elseif ($nav_title == 'login' || $nav_title == 'register' || $nav_title == 'zohoconnect') : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php
            elseif (session('logged_in')) :
                if ($nav_title == 'admin') : ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php else : ?>
                    <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                    <li><a href="<?= base_url('documentation'); ?>" class=" text-upper"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
                <?php endif; ?>
            <?php else : ?>
                <li><a href="<?= base_url(); ?>" class="text-upper"><span class="icon mif-calendar"></span> kalender</a></li>
                <li><a href="<?= base_url('documentation'); ?>" class="text-upper active text-bolds"><span class="icon mif-file-empty"></span> dokumentasi</a></li>
            <?php endif; ?>
        </ul>

        <div class="app-bar-container ml-auto d-none d-flex-md">
            <?php if ($nav_title == 'zohoconnect') : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub; color: yellow; font-weight: bold;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb_2" style="width: 20px;vertical-align: sub;"> Connecting....</a>
            <?php else : ?>
                <a href="<?= base_url('zohoconnect'); ?>" class="text-upper text-bolds" style="margin-right: 56px; vertical-align: sub;"><img src="<?= get_zoho_svg(); ?>" alt="Logo" class="image_svg_thumb" style="width: 20px;vertical-align: sub;"> ZOHO Connect</a>
            <?php endif; ?>
        </div>
    </div>
    <?php
    if (session('logged_in')) { ?>
        <div class="d-flex flex-row align-items-center p-3 px-md-4 shadow-sm fixed-top app-flatbar">
            <h5 class="my-0 mr-md-auto font-weight-normal font-h5">BADAN PENELITIAN DAN PENGEMBANGAN KEMENTRIAN PERHUBUNGAN</h5>

            <div class="app-bar-container ml-auto d-none d-flex-md">

                <?php if (session('role_id') == 1) : ?>
                    <?php if ($nav_title == 'admin') : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper" style="margin-right: 5px;"><span class="icon mif-notification"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if ($nav_title == 'user') : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper" style="margin-right: 5px;"><span class="icon mif-notification"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                <a href="<?= base_url('auth/logout') ?>" class="button button-outline-transparent text-upper" style="margin-right: 5px;"><span class="icon mif-settings-power"></span> LOGOUT</a>

            </div>
        </div>
    <?php } else { ?>
        <div class="d-flex flex-row align-items-center p-3 px-md-4 shadow-sm fixed-top app-flatbar">
            <h5 class="my-0 mr-md-auto font-weight-normal font-h5">BADAN PENELITIAN DAN PENGEMBANGAN KEMENTRIAN PERHUBUNGAN</h5>

            <div class="app-bar-container ml-auto d-none d-flex-md">
                <?php if ($nav_title == 'login') : ?>
                    <a href="<?= base_url('auth/login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                    <a href="<?= base_url('auth/register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                <?php elseif ($nav_title == 'register') : ?>
                    <a href="<?= base_url('auth/login') ?>" class="button button-outline-transparent text-upper " style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                    <a href="<?= base_url('auth/register') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                <?php else : ?>
                    <a href="<?= base_url('auth/login') ?>" class="button button-outline-transparent text-upper" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                    <a href="<?= base_url('auth/register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                <?php endif; ?>
            </div>
        </div>
    <?php
    }
    ?>


<?php
}

function get_perhub_svg()
{ ?>
    <?= base_url('assets/locals/img/transport.svg'); ?>
<?php
}

function get_zoho_svg()
{ ?>
    <?= base_url('assets/locals/img/zoho.svg'); ?>
<?php
}
?>