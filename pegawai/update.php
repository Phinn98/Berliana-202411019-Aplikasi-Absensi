<?php
include "../config/koneksi.php";

$id       = $_POST['id'];
$nama     = $_POST['nama'];
$jabatan  = $_POST['jabatan'];

mysqli_query($conn, "UPDATE pegawai
SET
nama='$nama',
jabatan='$jabatan'
WHERE id_pegawai='$id'");

header("Location:index.php?pesan=diubah");
exit;