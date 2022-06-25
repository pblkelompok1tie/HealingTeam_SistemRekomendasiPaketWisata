<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Paket Wisata</title>
</head>

<body>
    <table align="center" width="800">
        <tr>
            <td> <img src="<?php echo base_url(); ?>assets/img/logo/kab_madiun.png" width="90" height="90"></td>
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
        <table width="800" cellspacing="3" border="1" align="center">
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
            <?php $i = 1; ?>
            <?php foreach ($paket_wisata as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
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
    </table>
</body>

</html>