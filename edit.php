<?php
require "Koneksi.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$sql = "SELECT * FROM checkup WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'];
    $umur = $_POST['umur'];
    $bulan = $_POST['bulan'];
    
    $sql = "UPDATE checkup SET Nama = ?, umur = ?, bulan = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sisi", $nama, $umur, $bulan, $id);
    
    if ($stmt->execute()) {
        header("Location: Checkup.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui data.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Checkup</title>
</head>
<body>
    <h2>Edit Data Checkup</h2>
    <form method="post" action="edit.php?id=<?= htmlspecialchars($id) ?>">
        <div>
            <label>Nama: </label>
            <input type="text" name="Nama" value="<?= htmlspecialchars($data['Nama']) ?>" required>
        </div>
        <div>    
            <label>Umur:</label>
            <input type="number" name="umur" value="<?= htmlspecialchars($data['umur']) ?>" required>
        </div>
        <div>
            <label>Bulan:</label>
            <select name="bulan" required>
                <option value="Anomaly" <?= $data['bulan'] == "Anomaly" ? 'selected' : '' ?>>Anomaly</option>
                <option value="Zodiak" <?= $data['bulan'] == "Zodiak" ? 'selected' : '' ?>>Zodiak</option>
                <option value="Waras" <?= $data['bulan'] == "Waras" ? 'selected' : '' ?>>Waras</option>
            </select>
        </div>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
