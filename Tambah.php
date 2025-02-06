<?php
    var_dump($_POST);
    require "Koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $name = $_POST["name"];
        $umur = $_POST["umur"];
        $bulan = $_POST["bulan"];

        $sql = "INSERT INTO checkup (Nama, umur, bulan) VALUES (?, ?, ?)";
        $row = $koneksi->execute_query($sql, [$name, $umur, $bulan]);


        // $stmt = $koneksi->prepare($sql);
        // $stmt->bind_param("sis", $name, $umur, $bulan);
        // $stmt->execute();
        // header("Location:Checkup.php");
        if ($row) {
            header("Location:Checkup.php");
        }
}




?>






<DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="" method="post">
            <div>
                <label> Nama </label>
                <input type="text" name="name" id="user"> 
            </div>
            <div>
                <label> Umur </label>
                <input type="number" name="umur" id="user"> 
            </div>
            <div>
                <label> bulan </label>
               <select name="bulan">
                <option value="Anomaly">Anomaly</option>
                <option value="Zodiak">Zodiak</option>
                <option value="Waras">Waras</option>
               </select>
            </div>
            <button type="submit"> kirim </button>
            <p> fyi : Jan input umur dibawah 14 </p>
        </form>
    </body>
</html>