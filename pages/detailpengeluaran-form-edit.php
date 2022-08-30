<?php
session_start();
$_SESSION['current_page'] = "Detail Pengeluaran";
?>
<?php include_once("../functions/functions.php"); ?>
<?php
//checkLogin();
if (!isset($_SESSION["id_pegawai"])) {
    header("Location: ../index.php?error=4");
}
?>
<!-- ini ada check login -->

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
                    <h1 class="h2">Edit Data Detail Pengeluaran</h1>
                </div>
                <?php
                if (isset($_GET["id"])) {
                    $id = $mysqli->escape_string($_GET["id"]);
                    if ($dataDPengeluaran = getDataDPengeluaran($id)) {
                    ?>
                        <form method="POST" name="form-edit-stok" action="detailpengeluaran-edit.php">
                            <input type="hidden" name="id" value="<?php echo $dataDPengeluaran["id"]; ?>">
                            <div class="row mb-3">
                                <label for="inputIdPengeluaran" class="col-sm-2 col-form-label">Id Pengeluaran</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputIdPengeluaran" name="inputIdPengeluaran">
                                        <!-- <option value="defaultIdPengeluaran">Pilih Id Pengeluaran</option> -->
                                        <?php
                                            $data = getListPengeluaran();
                                            foreach ($data as $row) {
                                                echo "<option value=\"" . $row["id_pengeluaran"] . "\"";
                                                if ($row["id_pengeluaran"] == $dataDPengeluaran["id_pengeluaran"]) {
                                                    echo " selected";
                                                }
                                                echo ">" . $row["id_pengeluaran"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label for="inputStokBahan" class="col-sm-2 col-form-label">Stok Bahan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="inputStokBahan" name="inputStokBahan">
                                        <option value=""><?php echo $dataDPengeluaran["id"]; ?></option>
                                        <?php
                                            $data = getListStok();
                                            foreach ($data as $row) {
                                                echo "<option value=\"" . $row["id_stok"] . "\"";
                                                if ($row["id_stok"] == $dataDPengeluaran["id_stok"]) {
                                                    echo " selected";
                                                }
                                                echo ">" . $row["nama_bahan"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputHargaSatuan" class="col-sm-2 col-form-label">Biaya Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputHargaSatuan" name="inputHargaSatuan" value="<?= $dataDPengeluaran["harga_satuan"] ?>" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="tblEdit">Edit</button>
                            <a href="DetailPengeluaran.php"><button type="button" class="btn btn-danger">Kembali</button></a>
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


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="../dashboard/dashboard.js"></script> -->
</body>

</html>