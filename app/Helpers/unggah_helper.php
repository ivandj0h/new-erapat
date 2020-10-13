<?php

function upload_undangan($rapat)
{ ?>
    <li>
        <div class="row">
            <div class="cell-sm-12">
                <p class="remark alert">
                    File <strong>Undangan Rapat</strong> Belum di Unggah.
                    Klik <a href="<?= base_url('uploadundangan/' . $rapat) ?>"><strong>disini</strong></a> untuk mengunggah
                </p>
            </div>
        </div>
    </li>
<?php
}

function upload_notulen($rapat)
{ ?>
    <li>
        <div class="row">
            <div class="cell-sm-12">
                <p class="remark alert">
                    File <strong>Notulen Rapat</strong> Belum di Unggah.
                    Klik <a href="<?= base_url('uploadnotulen/' . $rapat) ?>"><strong>disini</strong></a> untuk mengunggah
                </p>
            </div>
        </div>
    </li>
<?php
}

function upload_absensi($rapat)
{ ?>
    <li>
        <div class="row">
            <div class="cell-sm-12">
                <p class="remark alert">
                    File <strong>Absensi Rapat</strong> Belum di Unggah.
                    Klik <a href="<?= base_url('uploadabsensi/' . $rapat) ?>"><strong>disini</strong></a> untuk mengunggah
                </p>
            </div>
        </div>
    </li>
<?php
}

function upload_empty($rapat)
{ ?>
    <li>
        <div class="row">
            <div class="cell-sm-12">
                <p class="remark alert">
                    Belum ada file yang diunggah.
                    Klik <a href="<?= base_url('uploadundangan/' . $rapat) ?>"><strong>disini</strong></a> untuk mengunggah
                </p>
            </div>
        </div>
    </li>
<?php
}

function upload_finish($rapat)
{
}
?>