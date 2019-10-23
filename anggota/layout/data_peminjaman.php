<?php
error_reporting(0);
session_start();
if ($_SESSION['level'] == "Anggota") {
    include "header.php";
    include "../../config/koneksi.php";
    ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="x_panel">
            <div class="box-title">
                <legend style="text-align: center;">Data Peminjaman Anggota</legend>
            </div>
            <div class="box-header">
                <a href="add_peminjaman.php" title="Tambah Data" class="btn btn-primary">
                    <i class="fa fa-plus"></i></a>
            </div>
            <br>
            <table id="datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Nominal Peminjaman</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $sql = "select * from v_peminjaman";
                            $query = mysqli_query($koneksi, $sql);
                            $jml = mysqli_num_rows($query);
                            $no = 1;
                            while ($a = mysqli_fetch_array($query)) {
                                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $a['nik']; ?></td>
                        <td><?php echo $a['nama_anggota']; ?></td>
                        <td><?php echo $a['tanggal_peminjaman']; ?></td>
                        <td><?php echo "Rp " . number_format($a['nominal_peminjaman']); ?></td>
                        <td><?php echo $a['keterangan']; ?></td>
                        <td><?php echo $a['status']; ?></td>
                        <td>
                            <a href="view_tabungan.php?id_anggota=<?php echo $a['nik']; ?>" class="btn btn-info"
                                title="Lihat Detail Tabungan"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php $no++;
                            } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    include "footer.php";
} else {
    echo "<script>
		alert('Anda Tidak Memiliki Hak Akses!');
		document.location='../index.php';
		</script>";
}
?>