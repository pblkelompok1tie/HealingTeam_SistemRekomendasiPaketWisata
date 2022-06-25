<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
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
				<td colspan="3"><hr></td>
			</tr>
    <table width="400" cellspacing="3" align="center" border="1">
        <tr bgcolor="#ffffff">
            <th align="center">No</th>
            <th align="center">Nama</th>
            <th align="center">Username</th>
            <th align="center">Password</th>
            <th align="center">Foto</th>
        </tr>
        <?php
        $no = 1;
        foreach ($admin as $a) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td> <br>
                <td><?php echo $a['nama_admin']; ?></td> <br>
                <td><?php echo $a['username']; ?></td><br>
                <td><?php echo $a['password']; ?></td><br>
                <td>
                    <img src="<?php echo base_url(); ?>assets/img/admin/<?= $a['foto_admin']; ?>" width="100" height="100">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>