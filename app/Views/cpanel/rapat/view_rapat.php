<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>


<!-- start content here -->
<?= userTabMenu($tabs); ?>

<div class="container">

    <table class="table table-striped table-condensed" id="meeting" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-20">Tanggal</th>
                <th class="text-center w-20">Mulai</th>
                <th class="text-center w-20">Akhir</th>
                <th class="text-center w-20">Nama Bidang</th>
                <th class="text-center w-20">Media</th>
                <th class="text-center w-20">ID Media</th>
                <th class="text-center w-20">File Upload</th>
                <th class="text-center w-20">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rapat as $r) : ?>
                <tr>
                    <td><?= date("d-m-Y", strtotime($r['end_date'])); ?></td>
                    <td><?= date("H:i", strtotime($r['start_time'])); ?></td>
                    <td><?= date("H:i", strtotime($r['end_time'])); ?></td>
                    <td><?= $r['sub_department_name']; ?></td>
                    <td><?= $r['meeting_subtype']; ?></td>
                    <td>
                        <?php
                        if ($r['type_id'] == 1) {
                            if ($r['sub_type_id'] == 1) {
                                echo "<strong><span class='text-success'>" . $r['zoomid'] . "</span></strong>";
                            } else {
                                echo "<strong><span class='text-primary'>" . $r['other_online_id'] . "</span></strong>";
                            }
                        } else {
                            echo "<span class='text-danger'>Offline</span>";
                        }
                        ?>
                    </td>
                    <td>no</td>
                    <td>no</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- end content here -->


<?php
$this->endSection();
