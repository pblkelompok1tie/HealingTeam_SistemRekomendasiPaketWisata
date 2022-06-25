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
                    <font size="4"></font><b>DINAS PARIWISATA PEMUDA DAN OLAHRAGA</b></font><br>
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
            <tr align="center">
                <th width="10">ID Artikel Destinasi Wisata</th>
                <th width="10">Nama Destinasi Wisata</th>
                <th width="10">Alamat Destinasi Wisata</th>
                <th width="10">Deskripsi Destinasi Wisata</th>
                <th width="10">Harga Tiket Masuk</th>
                <th width="10">Jam Operasional</th>
                <th width="10">Foto</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($artikel_destinasi_wisata as $adw) : ?>
                <tr align="center">
                    <td><?= $i++; ?></td>
                    <td><?= $adw['nama_destinasi_wisata']; ?></td>
                    <td><?= $adw['alamat_destinasi_wisata']; ?></td>
                    <td><?= $adw['deskripsi_destinasi_wisata']; ?></td>
                    <td><?= $adw['tiket_masuk']; ?></td>
                    <td><?= $adw['jam_operational']; ?></td>
                    <td>
                        <img src="<?php echo base_url(); ?>assets/img/artikel_destinasi_wisata/<?= $adw['foto_destinasi_wisata']; ?>" width="100" height="100">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</body>

</html>