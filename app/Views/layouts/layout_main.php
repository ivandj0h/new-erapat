<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ivandi Djoh Gah">
    <meta name="generator" content="e-rapat v0.0.1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=0.0)" />
    <meta http-equiv="Page-Exit" content="blendTrans(Duration=0.0)" />
    <title><?= $page_title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/locals/img/transport.svg'); ?>">

    <!-- Metro 4 Base CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/metro/css/metro-all.min.css'); ?>">

    <!-- Vendors CSS -->
    <link href="<?= base_url('assets/vendor/datatables/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/buttons.dataTables.min.css'); ?>" rel="stylesheet">

    <!-- Custom Metro CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/locals/css/custom-metro.css'); ?>">
</head>

<body>

    <?= $this->renderSection("contents"); ?>


    <!-- JQuey -->
    <script src="<?= base_url('assets/locals/js/jquery-3.5.1.min.js'); ?>"></script>

    <!-- Metro 4 Base JS-->
    <script src="<?= base_url('assets/vendor/metro/js/metro.min.js'); ?>"></script>

    <!-- Vendors JS -->
    <script src="<?= base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>

    <!-- Custom Metro JS -->
    <script src="<?= base_url('assets/locals/js/custom-metro.js'); ?>"></script>
</body>

</html>