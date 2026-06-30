<?php
include "../config/koneksi.php";
include "../template/header.php";
include "../template/sidebar.php";

$query = mysqli_query($conn, "
SELECT
    absensi.*,
    pegawai.nama,
    pegawai.jabatan
FROM absensi
JOIN pegawai
ON absensi.id_pegawai = pegawai.id_pegawai
ORDER BY tanggal DESC, jam_masuk DESC
");
?>

<div class="card">

    <h2>Data Absensi</h2>

    <br>

    <a href="tambah.php" class="btn btn-success">
        + Tambah Absensi
    </a>

    <br><br>

    <table class="table">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($d = mysqli_fetch_assoc($query)) {
        ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $d['nama'] ?></td>

            <td><?= $d['jabatan'] ?></td>

            <td><?= $d['tanggal'] ?></td>

            <td><?= $d['jam_masuk'] ?></td>

            <td>
                <?= empty($d['jam_keluar']) ? "-" : $d['jam_keluar']; ?>
            </td>

            <td><?= $d['status'] ?></td>

            <td>

                <?php if ($d['status'] == "Hadir") { ?>

                    <?php if (empty($d['jam_keluar'])) { ?>

                        <a href="pulang.php?id=<?= $d['id_absensi']; ?>"
                           class="btn btn-warning"
                           onclick="return confirm('Konfirmasi pegawai pulang?')">
                            Pulang
                        </a>

                    <?php } else { ?>

                        <span>Selesai</span>

                    <?php } ?>

                <?php } else { ?>

                    <span>-</span>

                <?php } ?>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

<?php
include "../template/footer.php";
?>
