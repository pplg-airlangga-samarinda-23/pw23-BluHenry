<?php
    var_dump($_POST);
    require "koneksi.php";

    if ($_SERVER ["REQUEST_METHOD"] == "POST" ) {
        $Nama = htmlspecialchars($_POST["Nama"]);
        $Umur = $_POST["Umur"];
        $Tanggal = $_POST["Tanggal"];
        $Roles = htmlspecialchars($_POST["Roles"]);
        $Tag = $_POST["Tag"];
        $Status = $_POST["Status"];

        $sql = "INSERT INTO profile_member(Nama, Umur_akun, Tanggal_masuk_server, Roles, Tag_member, status) values (?, ?, ?, ?, ?, ?)";
        // 
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("sissis", $Nama, $Umur, $Tanggal, $Roles, $Tag, $Status);
        $stmt->execute();


        header("Location:Profile.php");
    }


?>







<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <h2> inputkan data untuk menambah Data profile member </h2>
        <form class="container" action="" method="post">
            <div class="Nama">
                <label for="Barang"> Nama : </label> <br>
                <input type="text" name="Nama">
            </div>
            <div class="umur">
                <label for="umur"> Umur akun :  </label> <br>
                <input type="number" name="Umur">
            </div>
            <div class="tanggal">
                <label for="tanggal"> Tanggal masuk server :  </label> <br>
                <input type="date" name="Tanggal">
            </div>
            <div class="Roles">
                <label for="stak"> Roles  </label> <br>
                <input type="text" name="Roles">
            </div>
            <div class="Stok">
                <label for="stak"> Tag Member :  </label> <br>
                <input type="number" name="Tag">
            </div>
            <div class="status">
                <label for="status"> status </label> <br>
                <select name="Status" id="Status">
                    <option value="Waras"> Waras </option>
                    <option value="Ga waras"> Ga waras </option>
                </select> 
            </div>
            <div class="submit">
                <button type="submit"> submit </button>
            </div>
        </form>
    </body>
</html>