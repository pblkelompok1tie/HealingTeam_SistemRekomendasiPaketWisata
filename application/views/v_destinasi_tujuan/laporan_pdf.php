<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Destinasi Tujuan</title>
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
        <table width="400" cellspacing="3"  border="1" align="center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Durasi Berkunjung</th>
                <th>Foto</th>

            </tr>
            <?php
            $no = 1;
            foreach ($destinasi_tujuan as $a) :
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a['nama_destinasi_tujuan']; ?></td>
                    <td><?php echo $a['durasi_jam']; ?> Jam</td>
                    <td>
                        <img src="<?php echo base_url(); ?>assets/img/destinasi_tujuan/<?= $a['foto_destinasi_tujuan']; ?>" width="100" height="100">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

</body>

</html>