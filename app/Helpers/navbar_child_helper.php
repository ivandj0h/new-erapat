<?php

function navbar_child($nav)
{ ?>
    <div class="d-flex flex-row align-items-center p-3 px-md-4 shadow-sm fixed-top app-flatbar">
        <h5 class="my-0 mr-md-auto font-weight-normal font-h5">BADAN PENELITIAN DAN PENGEMBANGAN KEMENTRIAN PERHUBUNGAN</h5>
        <div class="app-bar-container ml-auto d-none d-flex-md">
            <?php
            $nav_title = $nav;
            switch ($nav_title) {
                case "calendar": ?>
                    <?php if (session('logged_in')) : ?>
                        <?php if (session()->get('role_id') == 1) : ?>
                            <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php endif; ?>
                        <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                    <?php else : ?>
                        <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                        <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                    <?php endif; ?>
                <?php break;
                case "dokumentasi": ?>
                    <?php if (session('logged_in')) : ?>
                        <?php if (session()->get('role_id') == 1) : ?>
                            <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php endif; ?>
                        <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                    <?php else : ?>
                        <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                        <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                    <?php endif; ?>
                <?php break;
                case "zohoconnect": ?>
                    <?php if (session('logged_in')) : ?>
                        <?php if (session()->get('role_id') == 1) : ?>
                            <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php endif; ?>
                        <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                    <?php else : ?>
                        <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                        <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                    <?php endif; ?>
                <?php break;
                case "erapatconnect": ?>
                    <?php if (session('logged_in')) : ?>
                        <?php if (session()->get('role_id') == 1) : ?>
                            <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php else : ?>
                            <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                        <?php endif; ?>
                        <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                    <?php else : ?>
                        <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                        <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                    <?php endif; ?>
                <?php break;
                case "login": ?>
                    <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                    <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                <?php break;
                case "register": ?>
                    <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper " style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                    <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper aktif" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
                <?php break;
                case "cek": ?>
                    <a href="#" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-lock"></span> UNLOCK PROCESS... <img src="<?= base_url('assets/locals/img/loading.gif'); ?>" style="width: 15px;"></a>
                <?php break;
                case "admin": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "user": ?>
                    <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "account": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "sekretariat": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "bagian": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "zoom": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "rapat": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "baru": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "detail": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "edit": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "pembaharuan": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "cekzoom": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "cekoffline": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "riwayat": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                case "cetak": ?>
                    <?php if (session()->get('role_id') == 1) : ?>
                        <a href="<?= base_url('admin') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php else : ?>
                        <a href="<?= base_url('user') ?>" class="button button-outline-transparent text-upper cpanel-aktif" style="margin-right: 5px;"><span class="icon mif-done"></span> CPANEL <?= session('fullName'); ?></a>
                    <?php endif; ?>
                    <a href="<?= base_url('logout') ?>" class="button alert outline text-upper" style="margin-right: 5px;"><span class="icon mif-switch"></span> LOGOUT</a>
                <?php break;
                default: ?>
                    <a href="<?= base_url('login') ?>" class="button button-outline-transparent text-upper" style="margin-right: 5px;"><span class="icon mif-lock"></span> MASUK</a>
                    <a href="<?= base_url('register') ?>" class="button button-outline-transparent text-upper" style="margin-right: 30px;"><span class="icon mif-unlock"></span> DAFTAR</a>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
?>