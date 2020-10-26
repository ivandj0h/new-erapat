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
        <tr>
            <td width="120">Sekretariat</td>
            <td width="380">:
                <?php if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->department_name ?></strong>.
                <?php else : ?>
                    <strong><?= $rapat->department_name ?></strong>.
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td width="120">Bagian</td>
            <td width="380">:
                <?php if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->sub_department_name ?></strong>.
                <?php else : ?>
                    <strong><?= $rapat->sub_department_name ?></strong>.
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td width="120">Pimpinan Rapat</td>
            <td width="380">:
                <?php if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->members_name ?></strong>.
                <?php else : ?>
                    <strong><?= $rapat->members_name ?></strong>.
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td width="120">Narasumber</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->speakers_name ?></strong>.
                    <?php
                else :
                    if (empty($rapat->speakers_name)) : ?>
                        -
                    <?php
                    else : ?>
                        <strong><?= $rapat->speakers_name ?></strong>.
                <?php
                    endif;
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">Diajukan Oleh</td>
            <td width="380">:
                <?php if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->name ?></strong>.
                <?php else : ?>
                    <strong><?= $rapat->name ?></strong>.
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td width="120">Tanggal Pengajuan</td>
            <td width="380">:
                <?php if ($rapat->request_status == '1') : ?>
                    <strong><?= date("d-m-Y", strtotime($rapat->date_requested)) ?></strong>.
                <?php else : ?>
                    <strong><?= date("d-m-Y", strtotime($rapat->date_requested)); ?></strong>.
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" width="500">&nbsp;</td>
        </tr>
        <tr>
            <td width="120">Tipe Media</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->meeting_type; ?></strong>.
                    <?php
                else :
                    if ($rapat->type_id == 1) : ?>
                        <strong><?= $rapat->meeting_type; ?></strong>
                    <?php
                    else : ?>
                        <strong><?= $rapat->meeting_type; ?></strong>.
                <?php
                    endif;
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">Media yang dipakai</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->meeting_subtype; ?></strong>.
                    <?php
                else :
                    if ($rapat->type_id == 1) : ?>
                        <strong><?= $rapat->meeting_subtype; ?></strong>
                    <?php
                    else : ?>
                        <strong><?= $rapat->meeting_subtype; ?></strong>.
                <?php
                    endif;
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">ID Media</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->meeting_subtype; ?></strong>.
                    <?php
                else :
                    if ($rapat->type_id == 1) :
                        if ($rapat->sub_type_id == 1) : ?>
                            <strong><?= $rapat->zoomid; ?> - Zoom ID</strong>
                        <?php
                        else : ?>
                            <strong><?= $rapat->other_online_id; ?></strong>.
                        <?php endif; ?>
                    <?php elseif ($rapat->type_id == 2) : ?>
                        <strong> - </strong>.
                    <?php else : ?>
                <?php
                    endif;
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">Tanggal Rapat</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->meeting_type; ?></strong>.
                    <?php
                else :
                    if ($rapat->type_id == 1) : ?>
                        <strong><?= date("d-m-Y", strtotime($rapat->end_date)); ?></strong>
                    <?php
                    else : ?>
                        <strong><?= date("d-m-Y", strtotime($rapat->end_date)); ?></strong>.
                <?php
                    endif;
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">Jam Mulai</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= date("H:i", strtotime($rapat->start_time)); ?></strong>.
                <?php
                else :
                ?>
                    <strong><?= date("H:i", strtotime($rapat->start_time)); ?></strong>.
                <?php
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">Jam Akhir</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= date("H:i", strtotime($rapat->end_time)); ?></strong>.
                <?php
                else :
                ?>
                    <strong><?= date("H:i", strtotime($rapat->end_time)); ?></strong>.
                <?php
                endif;
                ?>
            </td>
        </tr>
        <tr>
            <td width="120">Agenda Rapat</td>
            <td width="380">:
                <?php
                if ($rapat->request_status == '1') : ?>
                    <strong><?= $rapat->agenda ?></strong>.
                <?php
                else :
                ?>
                    <strong><?= $rapat->agenda ?></strong>.
                <?php
                endif;
                ?>
            </td>
        </tr>
    </table>
</body>

</html>