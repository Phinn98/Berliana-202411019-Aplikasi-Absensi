<?php
include "../config/koneksi.php";

date_default_timezone_set("Asia/Jakarta");

$id = $_GET['id'];

$jam_keluar = date("H:i:s");

mysqli_query($conn,"
UPDATE absensi
SET jam_keluar='$jam_keluar'
WHERE id_absensi='$id'
");

header("Location:index.php");
exit;