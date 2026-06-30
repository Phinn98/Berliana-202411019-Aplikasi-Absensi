<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai='$id'");
$row = mysqli_fetch_assoc($data);

include "../template/header.php";
include "../template/sidebar.php";
?>

<div class="card">

    <h2>Edit Pegawai</h2>

    <form action="update.php" method="POST">

        <input type="hidden" name="id" value="<?= $row['id_pegawai']; ?>">

        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text"
                   name="nama"
                   class="form-control"
                   value="<?= $row['nama']; ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text"
                   name="jabatan"
                   class="form-control"
                   value="<?= $row['jabatan']; ?>"
                   required>
        </div>

        <button class="btn btn-warning">
            Update
        </button>

        <a href="index.php" class="btn btn-danger">
            Batal
        </a>

    </form>

</div>

<?php
include "../template/footer.php";
?>