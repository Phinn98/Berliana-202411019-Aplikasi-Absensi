<?php
include "../config/koneksi.php";
include "../template/header.php";
include "../template/sidebar.php";

if (isset($_GET['tanggal']) && $_GET['tanggal'] != '') {

    $tanggal = $_GET['tanggal'];

    $query = mysqli_query($conn, "
        SELECT
            absensi.*,
            pegawai.nama,
            pegawai.jabatan
        FROM absensi
        JOIN pegawai
        ON absensi.id_pegawai = pegawai.id_pegawai
        WHERE absensi.tanggal = '$tanggal'
        ORDER BY absensi.jam_masuk ASC
    ");

} else {

    $query = mysqli_query($conn, "
        SELECT
            absensi.*,
            pegawai.nama,
            pegawai.jabatan
        FROM absensi
        JOIN pegawai
        ON absensi.id_pegawai = pegawai.id_pegawai
        ORDER BY absensi.tanggal DESC, absensi.jam_masuk DESC
    ");

}
?>

<div class="card">

    <h2>Laporan Absensi</h2>

    <br>

    <form method="GET">

        <div class="form-group">

            <label>Pilih Tanggal</label>

            <input
                type="date"
                name="tanggal"
                class="form-control"
                value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>">

        </div>

        <button type="submit" class="btn btn-primary">
            Tampilkan
        </button>

        <a href="index.php" class="btn btn-danger">
            Reset
        </a>

    </form>

    <br>

    <table class="table">

        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Status</th>
        </tr>

        <?php
        $no = 1;

        while ($d = mysqli_fetch_assoc($query)) {
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $d['nama']; ?></td>

            <td><?= $d['jabatan']; ?></td>

            <td><?= $d['tanggal']; ?></td>

            <td><?= $d['jam_masuk']; ?></td>

            <td><?= empty($d['jam_keluar']) ? '-' : $d['jam_keluar']; ?></td>

            <td><?= $d['status']; ?></td>

        </tr>

        <?php } ?>

    </table>

</div>

<?php
include "../template/footer.php";
?>
