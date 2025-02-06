<?php
require "Koneksi.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$sql = "DELETE FROM checkup WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: Checkup.php");
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}

$stmt->close();
?>
