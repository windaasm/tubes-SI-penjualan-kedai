<?php
session_start();
$_SESSION['current_page'] = "Detail Pengeluaran";
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
                    <h1 class="h2">Hapus Data Detail Pengeluaran</h1>
                </div>
                <?php
                if (isset($_GET["id"])) {
                    $id = $mysqli->escape_string($_GET["id"]);
                    if ($row = getDataDPengeluaran($id)) {
                ?>
                        <form method="POST" name="form-hapus-mhs" action="detailpengeluaran-hapus.php">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <div class="row mb-3">
                                <label for="idPengeluaran" class="col-sm-2 col-form-label">Id Pengeluaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idPengeluaran" name="idPengeluaran" readonly value="<?php echo $row["id_pengeluaran"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stok" class="col-sm-2 col-form-label">Stok Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="stok" readonly name="stok" value="<?php 
                                                                                                                  $data = getListStok();
                                                                                                                  foreach ($data as $rowDataStok) {
                                                                                                                    if ($rowDataStok["id_stok"] == $row["id_stok"]) {
                                                                                                                        echo $rowDataStok["nama_bahan"];
                                                                                                                    }
                                                                                                                  }
                                                                                                                  ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="harga" class="col-sm-2 col-form-label">Biaya Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="harga" readonly name="harga" value="<?php echo $row["harga_satuan"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                            <a href="javascript:history.back()"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data kode mata kuliah tidak ditemukan</div>";
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