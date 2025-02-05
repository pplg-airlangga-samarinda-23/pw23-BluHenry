<?php

require "Koneksi.php";

$sql = "SELECT * FROM checkup";



$rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkup</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Halaman Ckeckup</h2>
    <a href="checkup-Tambah.php"> Tambah data </a>
    <table>
        <thead>
            <tr>
                <th> Nomor id </th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Bulan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=0; foreach($rows as $row ):  ?>
            <tr>
                <td> <?= ++$no ?> </td>
                <td> <?= $row['Nama'] ?> </td>
                <td> <?= $row['umur'] ?></td>
                <td> <?= $row['bulan'] ?></td>
                <td> <a href="checkup-edit.php?id=<?= $row['id'] ?>"> edit </a> <a href="checkup-hapus.php?id=<?= $row['id'] ?>"> hapus </a>  </td>
            </tr>


            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
