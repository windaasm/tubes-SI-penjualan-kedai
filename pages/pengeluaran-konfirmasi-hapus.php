<?php
session_start();
$_SESSION['current_page'] = "Pengeluaran";
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
                    <h1 class="h2">Hapus Data Pengeluaran</h1>
                </div>
                <?php
                if (isset($_GET["id_pengeluaran"])) {
                    $id_pengeluaran = $mysqli->escape_string($_GET["id_pengeluaran"]);
                    if ($row = getDataPengeluaran($id_pengeluaran)) {
                ?>
                        <form method="POST" name="form-hapus-mhs" action="pengeluaran-hapus.php">
                        <input type="hidden" name="id_pengeluaran" readonly value="<?php echo $row["id_pengeluaran"]; ?>">
                            <div class="row mb-3">
                                <label for="idPengeluaran" class="col-sm-2 col-form-label">ID Pengeluaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idPengeluaran" readonly name="idPengeluaran" readonly value="<?php echo $row["id_pengeluaran"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal" readonly name="tanggal" value="<?php echo $row["tanggal"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="totalharga" class="col-sm-2 col-form-label">Total Biaya</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="totalharga" readonly name="totalharga" value="<?php echo $row["total_harga"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="namapegawai" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namapegawai" readonly name="nama_pegawai" value="<?php 
                                                                                                                                 $data = getListPegawai();
                                                                                                                                 foreach ($data as $rowDataPegawai) {
                                                                                                                                     if ($rowDataPegawai["id_pegawai"] == $row["id_pegawai"]) {
                                                                                                                                         echo $rowDataPegawai["nama_pegawai"];
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
                        echo "<div class='alert alert-danger' role='alert'>Data Id pengeluaran tidak ditemukan</div>";
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