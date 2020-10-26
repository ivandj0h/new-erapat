<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/locals/img/transport.svg'); ?>">

</head>

<body>
    <img src="<?= base_url('assets/locals/img/header.png') ?>" alt="" srcset="">

    <table cellspacing="0" cellpadding="6">
        <thead>
            <tr style="background-color:#FFFF00;color:#0000FF;">
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Akhir</th>
                <th>Nama Bidang</th>
                <th>Media</th>
                <th>ID Media</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rapat as $r) : ?>
                <tr>
                    <td class="text-center"><?= date("d-m-Y", strtotime($r['end_date'])); ?></td>
                    <td class="text-center"><?= date("H:i", strtotime($r['start_time'])); ?></td>
                    <td class="text-center"><?= date("H:i", strtotime($r['end_time'])); ?></td>
                    <td class="text-center"><?= $r['sub_department_name']; ?></td>
                    <td class="text-center"><?= $r['meeting_subtype']; ?></td>
                    <td class="text-center">
                        <?php
                        if ($r['type_id'] == 1) {
                            if ($r['sub_type_id'] == 1) {
                                echo $r['zoomid'];
                            } else {
                                echo $r['other_online_id'];
                            }
                        } else {
                            echo "Offline";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>