<?php
session_start();
$_SESSION['current_page'] = "Penjualan";
?>
<?php include_once '../db/dbConfig.php'; ?>
<?php require_once '../functions/functions.php'; ?>
<?php
// checkLogin();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../index.php?error=4");
}
?>

<!doctype html>
<html lang="en">

<?php include_once("../head.php"); ?>

<body>
    <?php headers() ?>;
    <div class="container-fluid">
        <div class="row">
            <?php navbar() ?>;
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Hapus Data Penjualan</h1>
                </div>
                <?php
                if (isset($_GET["id_penjualan"])) {
                    $id_penjualan = $mysqli->escape_string($_GET["id_penjualan"]);
                    // $data = getMahasiswa($kd_mk);
                    if ($data = getDataPenjualan($id_penjualan)) {
                ?>
                        <form method="POST" name="form-hapus-penjualan" action="penjualan-hapus.php">
                            <div class="row mb-3">
                                <label for="idPenjualan" class="col-sm-2 col-form-label">Id Penjualan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idPenjualan" name="idPenjualan" readonly value="<?php echo $data["id_penjualan"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal" readonly name="tanggal" value="<?php echo $data["tanggal"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="totalHarga" class="col-sm-2 col-form-label">Total Pendapatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="totalHarga" readonly name="totalHarga" value="<?php echo $data["total_harga"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="namaPegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namaPegawai" readonly name="namaPegawai" value="<?php 
                                                                                                                                    $pegawai = getListPegawai();
                                                                                                                                    foreach ($pegawai as $row) {
                                                                                                                                        if ($row["id_pegawai"] == $data["id_pegawai"]) {
                                                                                                                                            echo $row["nama_pegawai"];
                                                                                                                                        } 
                                                                                                                                    }
                                                                                                                                ?>">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                            <a href="javascript:history.back()"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data ID penjualan tidak ditemukan</div>";
                    }
                    ?>
                <?php
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Data tidak ditemukan</div>";
                }
                ?>

            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

    <script src="../dashboard/dashboard.js"></script>
</body>

</html>