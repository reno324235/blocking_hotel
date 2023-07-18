<?php
/**
 * Created by PhpStorm.
 * User: alwizen
 * Date: 20/05/2017
 * Time: 7:48
 */
include 'koneksi.php';

$hapus = "DELETE FROM tamu WHERE id = ?";
$hapus1 = "DELETE FROM kamar WHERE id = ?";

$stmt = $koneksi->prepare($hapus);
$stmt1 = $koneksi->prepare($hapus1);

$stmt->bind_param("s", $_GET['id']);
$stmt1->bind_param("s", $_GET['id']);

if ($stmt->execute() && $stmt1->execute()) {
    echo "<script language=javascript>parent.location.href='rekap.php';</script>";
} else {
    echo "Gagal menghapus data";
}

$stmt->close();
$stmt1->close();
$koneksi->close();
?>
