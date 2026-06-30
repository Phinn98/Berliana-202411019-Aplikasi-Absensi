<?php
include "../config/koneksi.php";

date_default_timezone_set("Asia/Jakarta");

$id_pegawai = $_POST['id_pegawai'];
$status     = $_POST['status'];

$tanggal    = date("Y-m-d");
$jam_masuk  = date("H:i:s");

mysqli_query($conn, "INSERT INTO absensi
(id_pegawai, tanggal, jam_masuk, status)
VALUES
('$id_pegawai','$tanggal','$jam_masuk','$status')");

header("Location:index.php");
exit;