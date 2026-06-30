<?php
include "../template/header.php";
include "../template/sidebar.php";
?>

<div class="card">

    <h2>Tambah Pegawai</h2>

    <form action="simpan.php" method="POST">

        <div class="form-group">
            <label>Nama Pegawai</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>

        <a href="index.php" class="btn btn-danger">
            Batal
        </a>

    </form>

</div>

<?php
include "../template/footer.php";
?>