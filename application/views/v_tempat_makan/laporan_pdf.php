<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Tempat Makan</title>
</head>

<body>
    <table align="center">
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
        <table align="center" width="400" cellspacing="3" border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Menu Favorite</th>
                <th>Foto</th>
            </tr>
            <?php
            $no = 1;
            foreach ($tempat_makan as $a) :
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a['nama_tempat_makan']; ?></td>
                    <td><?php echo $a['alamat_tempat_makan']; ?></td>
                    <td><?php echo $a['menu_favorite']; ?></td>
                    <td>
                        <img src="<?php echo base_url(); ?>assets/img/tempat_makan/<?= $a['foto_tempat_makan']; ?>" width="100" height="100">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

</body>

</html>