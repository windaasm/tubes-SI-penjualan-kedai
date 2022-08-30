<?php
session_start();
$_SESSION['current_page'] = "Stok Bahan";
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
                    <h1 class="h2">Hapus Data Pegawai</h1>
                </div>
                <?php
                if (isset($_GET["id_stok"])) {
                    $id_stok = $mysqli->escape_string($_GET["id_stok"]);
                    if ($data = getDataStok($id_stok)) {
                ?>
                        <form method="POST" name="form-hapus-stok" action="stok-hapus.php">
                            <input type="hidden" name="id_stok" value="<?php echo $data["id_stok"]; ?>">
                            <div class="row mb-3">
                                <label for="inputIdStok" class="col-sm-2 col-form-label">ID Pegawai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputIdStok" readonly value="<?php echo $data["id_stok"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNamaBahan" class="col-sm-2 col-form-label">Nama Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNamaBahan" readonly name="inputNamaBahan" value="<?php echo $data["nama_bahan"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputQty" class="col-sm-2 col-form-label">Qty</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputQty" readonly name="inputQty" value="<?php echo $data["qty"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputSatuan" class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSatuan" readonly name="inputSatuan" value="<?php echo $data["satuan"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                            <a href="StokBahan.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data ID Stok tidak ditemukan</div>";
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