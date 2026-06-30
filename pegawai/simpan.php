<?php
include "../config/koneksi.php";

$nama     = $_POST['nama'];
$jabatan  = $_POST['jabatan'];

mysqli_query($conn, "INSERT INTO pegawai(nama, jabatan)
VALUES('$nama','$jabatan')");

header("Location:index.php?pesan=ditambahkan");
exit;