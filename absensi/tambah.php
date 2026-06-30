<?php
include "../config/koneksi.php";
include "../template/header.php";
include "../template/sidebar.php";

$pegawai = mysqli_query($conn, "SELECT * FROM pegawai ORDER BY nama ASC");
?>

<div class="card">

    <h2>Tambah Data Absensi</h2>

    <form action="simpan.php" method="POST">

    <div class="form-group">
        <label>Pegawai</label>

        <select name="id_pegawai" class="form-control" required>

            <option value="">-- Pilih Pegawai --</option>

            <?php while($p=mysqli_fetch_assoc($pegawai)){ ?>

            <option value="<?= $p['id_pegawai']; ?>">
                <?= $p['nama']; ?>
            </option>

            <?php } ?>

        </select>

    </div>

    <div class="form-group">

        <label>Status</label>

        <select name="status" class="form-control" required>

            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alpha">Alpha</option>

        </select>

    </div>

    <button class="btn btn-success">
        Simpan
    </button>

</form>

</div>

<?php
include "../template/footer.php";
?>