<?php
session_start();
$_SESSION['current_page'] = "Detail Penjualan";
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
                    <h1 class="h2">Hapus Data Detail Penjualan</h1>
                </div>
                <?php
                if (isset($_GET["id_penjualan"])) {
                    $id_penjualan = $mysqli->escape_string($_GET["id_penjualan"]);
                    if ($row = getDataDPenjualan($id_penjualan)) {
                ?>
                        <form method="POST" name="form-hapus-detailpenjualan" action="detailpenjualan-hapus.php">
                            <input type="hidden" name="id_penjualan" value="<?php echo $row["id_penjualan"]; ?>">
                            <div class="row mb-3">
                                <label for="id_penjualan" class="col-sm-2 col-form-label">Id Penjualan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_penjualan" name="id_penjualan" readonly value="<?php echo $row["id_penjualan"]; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="namamenu" class="col-sm-2 col-form-label">Nama Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namamenu" readonly name="namamenu" value="<?php 
                                                                                                                          $data = getListMenu();
                                                                                                                          foreach ($data as $rowDataMenu) {
                                                                                                                              if ($rowDataMenu["id_menu"] == $row["id_menu"]) {
                                                                                                                                  echo $rowDataMenu["nama_menu"];
                                                                                                                              }
                                                                                                                          }
                                                                                                                          ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="hargasatuan" class="col-sm-2 col-form-label">Harga Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hargahatuan" readonly name="hargahatuan" value="<?php echo $row["harga_satuan"]; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblHapus">Hapus</button>
                            <a href="javascript:history.back()"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data Stok Bahan tidak ditemukan</div>";
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