<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        table th, table td {
            padding: 3px 8px;
        }

        a {
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <?php
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Absen.doc");
    ?>
    <table border="0">
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
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Foto</th>
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