<?php
include "../config/koneksi.php";

$pegawai = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pegawai"));
$absensi = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM absensi"));

include "../template/header.php";
include "../template/sidebar.php";
?>

<div class="card">

    <h2>Dashboard</h2>

    <div class="info">

        <div class="box">
            <h1><?= $pegawai ?></h1>
            <p>Total Pegawai</p>
        </div>

        <div class="box">
            <h1><?= $absensi ?></h1>
            <p>Total Absensi</p>
        </div>

    </div>

</div>

<?php
include "../template/footer.php";
?>