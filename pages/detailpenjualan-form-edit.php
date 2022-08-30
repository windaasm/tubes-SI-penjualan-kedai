<?php
session_start();
$_SESSION['current_page'] = "Detail Penjualan";
?>
<?php include_once("../functions/functions.php"); ?>
<?php
//checkLogin();
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
                    <h1 class="h2">Edit Data Detail Penjualan</h1>
                </div>
                <?php
                if (isset($_GET["id"])) {
                    $id = $mysqli->escape_string($_GET["id"]);
                    // $data = getMahasiswa($nim);
                    if ($dataDPenjualan = getDataDPenjualan($id)) {
                    ?>
                        <form method="POST" name="form-edit-stok" action="detailpenjualan-edit.php">
                            <input type="hidden" name="id" value="<?php echo $dataDPenjualan["id"]; ?>">
                            <div class="row mb-3">
                                <label for="inputIdPenjualan" class="col-sm-2 col-form-label">Id Penjualan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputIdPenjualan" name="inputIdPenjualan">
                                        <!-- <option value="defaultIdPenjualan">Pilih Id Penjualan</option> -->
                                        <?php
                                            $data = getListPenjualan();
                                            foreach ($data as $row) {
                                                echo "<option value=\"" . $row["id_penjualan"] . "\"";
                                                if ($row["id_penjualan"] == $dataDPenjualan["id_penjualan"]) {
                                                    echo " selected";
                                                }
                                                echo ">" . $row["id_penjualan"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="inputMenu" class="col-sm-2 col-form-label">Menu</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputMenu" name="inputMenu">
                                        <?php
                                            $data = getListMenu();
                                            foreach ($data as $row) {
                                                echo "<option value=\"" . $row["id_menu"] . "\"";
                                                if ($row["id_menu"] == $dataDPenjualan["id_menu"]) {
                                                    echo " selected";
                                                }
                                                echo ">" . $row["nama_menu"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputHargaSatuan" class="col-sm-2 col-form-label">Harga Menu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputHargaSatuan" name="inputHargaSatuan" value="<?= $dataDPenjualan["harga_satuan"] ?>" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Edit</button>
                            <a href="DetailPenjualan.php"><button type="button" class="btn btn-danger">Kembali</button></a>
                        </form>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Data menu tidak ditemukan</div>";
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