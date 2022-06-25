<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 3px 8px;
        }

        a {
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        @page Section2 {
            size: 841.7pt 595.45pt;
            mso-page-orientation: landscape;
            margin: 1.25in 1.0in 1.25in 1.0in;
            mso-header-margin: .5in;
            mso-footer-margin: .5in;
            mso-paper-source: 0;
        }

        div.Section2 {
            @page: Section2;
        }
    </style>
    <?php
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Absen.doc");
    ?>

    <div class="Section2">
        <table border="0" align="center">
            <tr>
                <td><img src="<?php echo base_url(); ?>assets/img/logo/kab_madiun.png" width="90" height="90"></td>
                <td>
                    <center>
                        <font size="4"><b>DINAS PARIWISATA PEMUDA DAN OLAHRAGA</b></font><br>
                        <font size="2"></font><br>
                        <font size="2"><i>Jl. Raya Tiron No.87, Tiron, Kec. Madiun, Madiun, Jawa Timur 63151, Indonesia</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
        </table>
        <br>
        <table border="1" align="center">

            <tr>
                <th>No</th>
                <th>Nama Penginapan</th>
                <th>Nama Tempat Makan</th>
                <th>Nama Tic</th>
                <th>Nama Paket Wisata</th>
                <th>Deskripsi Paket Wisata</th>
                <th>Harga Paket Wisata</th>
                <th>Rating Paket Wisata</th>
                <th>Durasi Paket Wisata</th>
                <th>Foto Paket Wisata</th>
            </tr>
            <?php
            $no = 1;
            foreach ($paket_wisata as $p) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p['nama_penginapan']; ?></td>
                    <td><?= $p['nama_tempat_makan']; ?></td>
                    <td><?= $p['nama_tic']; ?></td>
                    <td><?= $p['nama_paket_wisata']; ?></td>
                    <td><?= $p['deskripsi_paket_wisata']; ?></td>
                    <td><?= $p['harga_paket_wisata']; ?></td>
                    <td><?= $p['rating_paket_wisata']; ?></td>
                    <td><?= $p['durasi_paket_wisata']; ?> Hari</td>
                    <td><img src="<?php echo base_url(); ?>assets/img/paket_wisata/<?= $p['foto_paket_wisata']; ?>" width="100" height="100"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>