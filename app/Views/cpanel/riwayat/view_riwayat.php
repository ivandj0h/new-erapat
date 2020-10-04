<?php

$this->extend("layouts/layout_main");
$this->section("contents");

navbar_($nav_title);
?>


<!-- start content here -->
<?= userTabMenu($tabs); ?>
<!-- Content -->
<div class="container">
    <div class="toolbar my-5">
        <strong> Tabel Riwayat Rapat</strong>
    </div>

    <table class="table table-condensed hover display" id="rapat" cellspacing="0">
        <thead>
            <tr>
                <th class="text-center w-20">Tanggal</th>
                <th class="text-center w-20">Mulai</th>
                <th class="text-center w-20">Akhir</th>
                <th class="text-center w-20">Nama Bidang</th>
                <th class="text-center w-20">Media</th>
                <th class="text-center w-20">ID Media</th>
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
                                echo "<strong><span class='fg-emerald'>" . $r['zoomid'] . "</span></strong>";
                            } else {
                                echo "<strong><span class='fg-cobalt'>" . $r['other_online_id'] . "</span></strong>";
                            }
                        } else {
                            echo "<strong><span class='fg-crimson'>Offline</span></strong>";
                        }
                        ?>
                    </td>
                    <td>
                        <div class="dropdown-button">
                            <button class="button"><span class="mif-eye"></span> Details</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- end content here -->


<?php
$this->endSection();
