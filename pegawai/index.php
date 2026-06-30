<?php
include "../config/koneksi.php";
include "../template/header.php";
include "../template/sidebar.php";

if(isset($_GET['cari'])){

$cari=$_GET['cari'];

$data=mysqli_query($conn,
"SELECT * FROM pegawai
WHERE nama
LIKE '%$cari%'");

}else{

$data=mysqli_query($conn,
"SELECT * FROM pegawai");

}
?>

<div class="card">

    <h2>Data Pegawai</h2>

    <br>

    <form method="GET">

        <input
        type="text"
        name="cari"
        placeholder="Cari nama pegawai..."
        class="form-control">

    </form>

    <br>

    <a href="tambah.php" class="btn btn-success">
        + Tambah Pegawai
    </a>

    <?php

    if(isset($_GET['pesan'])){

    ?>

    <div class="alert">
        Data berhasil <?= $_GET['pesan']; ?>
    </div>

    <?php
    }
    ?>

    <table class="table">

        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th width="170">Aksi</th>
        </tr>

        <?php

        $no = 1;

        while($row = mysqli_fetch_assoc($data)){

        ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $row['nama'] ?></td>

            <td><?= $row['jabatan'] ?></td>

            <td>

                <a class="btn btn-warning"
                   href="edit.php?id=<?= $row['id_pegawai'] ?>">
                   Edit
                </a>

                <a class="btn btn-danger"
                   onclick="return confirm('Hapus data ini?')"
                   href="hapus.php?id=<?= $row['id_pegawai'] ?>">
                   Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

<?php
include "../template/footer.php";
?>