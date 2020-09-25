<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ivandi Djoh Gah">
    <meta name="generator" content="e-rapat v0.0.1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title><?= $page_title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/locals/img/transport.svg'); ?>">

    <!-- Metro 4 Base CSS -->
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css">

    <!-- Custom Metro CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/locals/css/custom-metro.css'); ?>">
</head>

<body>
    <div data-role="appbar" data-expand-point="md">
        <a href="<?= base_url(); ?>" class="brand no-hover">
            <span style="width: 75px;">
                <strong><span class="icon mif-calendar"></span> E-RAPAT</strong>
            </span>
        </a>
        <ul class="app-bar-menu">
            <li>
                <a href="#" class="dropdown-toggle text-upper"><span class="icon mif-cabinet"></span> Master Data</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#"> Data Akun</a></li>
                    <li class="divider bg-lightGray"></li>
                    <li><a href="#"> Data Sekretariat</a></li>
                    <li><a href="#"> Data Bagian</a></li>
                    <li><a href="#"> Skype</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle text-upper"><span class="icon mif-file-empty"></span> Management</a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="#"> Data Akun</a></li>
                    <li class="divider bg-lightGray"></li>
                    <li><a href="#"> Data Sekretariat</a></li>
                    <li><a href="#"> Data Bagian</a></li>
                    <li><a href="#"> Skype</a></li>
                </ul>
            </li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contacts</a></li>
        </ul>
        <div class="app-bar-container ml-auto d-none d-flex-md">
            <a href="#" class="dropdown-toggle text-upper" style="margin-right: 30px;"><span class="icon mif-user-check"></span> Ivandi Djoh Gah</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="#"> Profil</a></li>
                <li class="divider bg-lightGray"></li>
                <li><a href="#"> Ganti Password</a></li>
                <li><a href="#"> Logout</a></li>
            </ul>
        </div>
    </div>
    <?= $this->renderSection("contents"); ?>

    <!-- Metro 4 Base JS-->
    <script src="https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js"></script>
</body>

</html>