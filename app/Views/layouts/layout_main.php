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
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

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
    <script src="<?= base_url('assets/vendor/datatables/js/jquery.dataTables.js'); ?>"></script>

    <!-- Tinymce Scripts -->
    <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>

    <!-- Custom Metro JS -->
    <script src="<?= base_url('assets/locals/js/custom-metro.js'); ?>"></script>

    <script>
        $(document).ready(function() {

            $("#rapat").DataTable();

            // Red Alert
            $("#hideEl").on('click', function() {
                $("#redAlert").fadeOut()
            })

            setTimeout(function() {
                $('#hideMe').slideUp("slow");
            }, 3000);

            //    Media types Add
            $("#type_id").change(function() {
                var id_type = $("#type_id").val();
                var dataJson = {
                    id_type: id_type,
                };
                $.ajax({
                    url: "<?php echo base_url(); ?>/rapat/getmm",
                    method: "POST",
                    data: dataJson,
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        var html = "";
                        var i;

                        for (i = 0; i < data.length; i++) {
                            html +=
                                "<option value=" +
                                data[i].id +
                                ">" +
                                data[i].meeting_subtype +
                                "</option>";
                        }
                        $("#meeting_subtype").html(html);
                    },
                });
            });

            //    Media types Edit
            $("#type_id2").change(function() {
                var id_type = $("#type_id2").val();
                var dataJson = {
                    id_type: id_type,
                };
                $.ajax({
                    url: "<?php echo base_url(); ?>/rapat/getmmm",
                    method: "POST",
                    data: dataJson,
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        var html = "";
                        var i;

                        for (i = 0; i < data.length; i++) {
                            html +=
                                "<option value=" +
                                data[i].id +
                                ">" +
                                data[i].meeting_subtype +
                                "</option>";
                        }
                        $("#meeting_subtype2").html(html);
                    },
                });
            });

            $('#type_id').on('change', function() {
                if (this.value === '1') {
                    $("#other_online_id").hide();
                    $("#zoom_id").show();
                } else {
                    $("#other_online_id").hide();
                    $("#zoom_id").hide();
                }
            });

            $('#meeting_subtype').on('change', function() {
                if (this.value !== '1') {
                    $("#other_online_id").show();
                    $("#zoom_id").hide();
                }
                if (this.value === '5' || this.value === '6' || this.value === '7' || this.value === '8') {
                    $("#other_online_id").hide();
                    $("#zoom_id").hide();
                }
                if (this.value === '1') {
                    $("#other_online_id").hide();
                    $("#zoom_id").show();
                }
            });

            $("#yourBox").click(function() {
                if ($(this).is(":checked")) {
                    $("#onlineId").removeAttr("disabled");
                    $("#onlineId").focus();
                } else {
                    $("#onlineId").attr("disabled", "disabled");
                }
            });

            $(".dissable").attr("disabled", "disabled");
            $("#type_id").on("change", function() {
                if ($(this).val() === "2") {
                    $(".dissable").attr("disabled", "disabled");
                } else {
                    $(".dissable").removeAttr("disabled");
                }
            });
        });

        // Tinymce Section
        tinymce.init({
            selector: "#default",
            height: 400,
            forced_root_block: "",
            force_br_newlines: true,
            force_p_newlines: false,
            theme: "modern",
            plugins: [
                "autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools codesample toc",
            ],
            toolbar1: "undo redo | insert | styleselect table | bold italic | hr alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media ",
            toolbar2: "print preview | forecolor backcolor emoticons | fontselect | fontsizeselect | codesample code fullscreen",
            templates: [{
                    title: "Test template 1",
                    content: "",
                },
                {
                    title: "Test template 2",
                    content: "",
                },
            ],
            content_css: [
                "//fonts.googleapis.com/css?family=Lato:300,300i,400,400i",
                "//www.tinymce.com/css/codepen.min.css",
            ],
            setup: function(ed) {
                ed.on("change", function(e) {
                    console.log("the content " + ed.getContent());
                    $("textarea").text(ed.getContent());
                });
            },
        });
    </script>
</body>

</html>